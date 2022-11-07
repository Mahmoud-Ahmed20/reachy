<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Services\smsGateways\Whysms;
use App\Models\Invoice\Coupon;
use App\Models\Invoice\Invoice;
use App\Models\location\City;
use App\Models\location\Country;
use App\Models\Website\Client;
use App\Rules\CouponRule;
use App\Rules\Recaptcha;
use Illuminate\Http\Request;
use App\Models\Admin\products\Product;
use App\Models\Admin\Subscription;
use App\Models\Website\Wishlist;
use Illuminate\Support\Facades\Auth;
use App\Models\Website\Order;
use Carbon\Carbon;
use App\Models\Admin\Address;
use App\Models\Admin\Categorys\mainCategorys;
use App\Models\Admin\products\SubPrices;
use App\Models\Admin\Slider;
use App\Models\Website\Verification_code;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\File;



class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $subscurpition = Subscription::all();

        $product = Product::select('products.id', 'products.name_ar', 'products.name_en', 'products.main_categorys_id','products.slug_ar', 'products.slug_en', 'products.orginal_price', 'products.cover_image', 'sub_prices.price',
       'products.today_offer','products.supermarket_offer','products.baby_Offers','products.Health_beauty_offers'
       )->where('inactive', 0)
           ->join('sub_prices', 'products.id', '=', 'sub_prices.product_id')
           ->with(['Productimg' => function ($q) {
               $q->select('id', 'name_img', 'product_id');
          
           }])->with(['main_category' => function ($q) {
               $q->select('id', 'name_ar');
            }]);
       //if it has a cookie
       if (Cookie::get('sub_chosen')) {

           if ($request->input('slug_ar')) {
               $slug_ar =  $request->input('slug_ar');
               $subscrs = Subscription::where('slug_ar', $slug_ar)->first();
               $product = $product->where('sub_prices.subscription_id', $subscrs->id);

               Cookie::queue(Cookie::make('sub_chosen', $subscrs->id));
           }
           //if the user does not chose a subscation
           else {
               $product = $product->where('sub_prices.subscription_id', 1);
           }
       }
       //if it has not a cookie
        else {
           //if the user chose a subscration from the button

           $product = $product->where('sub_prices.subscription_id', Cookie::get('sub_chosen'));


       }
        $product = $product->get();
        $sliders = Slider::all();

        return view('website.index', compact('subscurpition', 'product', 'sliders'));
    }





    public function login_sub(Request $request)
    {

        // Validate the form data
        $this->validate($request, [
            'phone'   => 'required|numeric',
            'password' => 'required',
            // 'g-recaptcha-response' => ['required', new Recaptcha()],
        ]);
        // dd($request->all());
        // Attempt to log the user in
        if (Auth::guard('client')->attempt(['phone' => $request->phone, 'password' => $request->password], $request->remember)) {
            $request->session()->regenerate();

            // if successful, then redirect to their intended location
            // return redirect()->intended(route('patient_auth.profile'));
            return  redirect()->route('client.edit_profile');
        }

        // if unsuccessful, then redirect back to the login with the form data
        return back()->withErrors([
            'phone' => 'Your Phone number or Password is not correct!',
        ]);
    }


    function logout(){

        Auth::guard('client')->logout();
        return redirect()->route('landing');
    }


    public function profile()
    {
        $WashList = WashList::select('id', 'client_id', 'product_id')->with(['Product' => function ($q) {
            $q->select('id', 'slug_en', 'slug_ar', 'name_en', 'name_ar', 'cover_image', 'orginal_price');
        }])->with(['Client' => function ($q) {
            $q->select('id');
        }])->get();
        // return $WashList->client_id;
        return view('website.profile.profile', compact('WashList'));
    }

    public function edit_profile(Request $request)
    {
        $subscurpition = Subscription::all();

        $product = Product::select('products.id', 'products.name_ar', 'products.name_en', 'products.main_categorys_id','products.slug_ar', 'products.slug_en', 'products.orginal_price', 'products.cover_image', 'sub_prices.price',
       'products.today_offer','products.supermarket_offer','products.baby_Offers','products.Health_beauty_offers'
       )->where('inactive', 0)
           ->join('sub_prices', 'products.id', '=', 'sub_prices.product_id')
           ->with(['Productimg' => function ($q) {
               $q->select('id', 'name_img', 'product_id');
          
           }])->with(['main_category' => function ($q) {
               $q->select('id', 'name_ar');
            }]);
       //if it has a cookie
       if (Cookie::get('sub_chosen')) {

           if ($request->input('slug_ar')) {
               $slug_ar =  $request->input('slug_ar');
               $subscrs = Subscription::where('slug_ar', $slug_ar)->first();
               $product = $product->where('sub_prices.subscription_id', $subscrs->id);

               Cookie::queue(Cookie::make('sub_chosen', $subscrs->id));
           }
           //if the user does not chose a subscation
           else {
               $product = $product->where('sub_prices.subscription_id', 1);
           }
       }
       //if it has not a cookie
        else {
           //if the user chose a subscration from the button

           $product = $product->where('sub_prices.subscription_id', Cookie::get('sub_chosen'));


       }
        $product = $product->get();
        $Country = Country::all();
        return view('website.profile.profileEdit', compact('Country','product','subscurpition'));
    }

    //for select input ajax to send the cities beasd on the given country
    public function createcityajax($id)
    {
        return City::where('country_id', $id)->get();
    }

    public function store(Request $request)
    {

        // dd($request->all());
        $this->validate($request, [
            'password' => 'required|confirmed|max:30|min:7',
            'first_name' => 'required|max:20',
            'second_name' => 'required|max:20',
            'phone' => 'required|numeric|digits_between:11,11|regex:/(01)[0-9]{9}/|unique:clients,phone',
            'gendar' => 'required',
        ]);

        //insert img
        if ($request->hasFile('avatar')) {
            $file_extension = request()->avatar->getClientOriginalExtension();
            $file_name = $request->input('first_name') . time() . '.' . $file_extension;
            $path = 'img/useravatar';
            $request->avatar->move($path, $file_name);
        } else {
            $file_name = 'default-pp.png';
        };

        $user = Client::create([
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'first_name' => $request->input('first_name'),
            'second_name' => $request->input('second_name'),
            'avatar' => $file_name,
            'phone' => $request->input('phone'),
            'gendar' => $request->input('gendar'),
        ]);

        Auth::guard('client')->login($user);


        //------- for OTP -------
        //-- Generate An OTP
        $verificationCode = $this->generateOtp($user->phone);
        $message = " ريتشي مارت بترحب بيك يا " . $user->first_name . " كود التفعيل الخاص بك: RM-". $verificationCode->otp;
        
        //-- send sms to client with OTP
        $sms_send = app(Whysms::class)->sendSms($user->phone, $message);

        if($sms_send['status'] === "success"){

            return response()->json([
                "status" => true, 
            ]);

        }else{
            return response()->json([
                "status" => false, 
            ]);
        }
        
        session()->flash('success', 'The patient has been created successfully');
        return redirect()->route('client.edit_profile');
    }


    public function register_with_otp(Request $request){

        #Validation
        $request->validate([
            'otp' => 'required|digits_between:4,4'
        ]);

        $client_id = Auth::guard('client')->id();
        $digits =  $request->input('digits');

        #Validation Logic
        $verification_code   = Verification_code::where('client_id', $client_id)->where('otp', $digits)->first();

        $now = Carbon::now();

        if (!$verification_code) {
            return response()->json([
                "status" => false, 
                "msg" => "Your OTP is not correct", 
            ]);
        }
        elseif($verification_code && $now->isAfter($verification_code->expire_at)){
            return response()->json([
                "status" => false, 
                "msg" => "Your OTP has been expired", 
            ]);
        }
        else{
            $client = Client::find($client_id);

            if($client){
                // Expire The OTP
                $verification_code->update([
                    'expire_at' => Carbon::now()
                ]);
                return response()->json([
                    "status" => true, 
                    "msg" => "Your OTP has been confirmed", 
                    "url" => route("client.index"), 
                ]);
            }

        }
    }


    //for otp generation
    public function generateOtp($mobile_no){

        $client = Client::where('phone', $mobile_no)->first();

        # User Does not Have Any Existing OTP
        $verificationCode = Verification_code::where('client_id', $client->id)->latest()->first();

        $now = Carbon::now();

        if($verificationCode && $now->isBefore($verificationCode->expire_at)){
            return $verificationCode;
        }

        // Create a New OTP
        return Verification_code::create([
            'client_id' => $client->id,
            'otp' => rand(1234, 9999),
            'expire_at' => Carbon::now()->addMinutes(10)
        ]);

    }
    
    public function client_current_requests()
    {
        $client_id = Auth::guard('client')->user()->id;
        $orders = Order::where('client_id', $client_id)->paginate(10);
        return view('website.orders.current_requests', compact('orders'));
    }
    public function my_previous_orders()
    {
        $client_id = Auth::guard('client')->user()->id;
        $orders = Order::where('client_id', $client_id)->where('status', 3)->paginate(10);
        return view('website.orders.my_previous_orders', compact('orders'));
    }
    public function details_order($code)
    {
        $order =  Order::where('code', $code)->with(['client' => function ($q) {
            $q->select('id');
        }])->with(['order_item' => function ($q) {
            $q->select('order_id', 'final_price', 'product_id');
        }])->where('client_id', Auth::guard('client')->user()->id)->first();
        $address = Address::find($order->address_id);
        return view('website.orders.details_order', compact('order', 'address'));
    }
    public function delete_order(Request $request)
    {
        $today = Carbon::now();
        $order_id = $request->input('order_id');
        $order = Order::find($order_id);
        $order->client_note = $request->input('client_note');
        $order->cancel_date = $today;
        $order->status = 4;
        $order->save();
        return redirect()->route('client.current_requests');
    }
    public function update(Request $request)
    {

        $id = Auth::guard('client')->user()->id;

        $client = Client::find($id);
        $client->first_name = $request->input('first_name');
        $client->second_name = $request->input('second_name');
        $client->email  = $request->input('email');
        $client->phone  = $request->input('phone');

        if ($request->input('country_id')) {
            $client->country_id   = $request->input('country_id');
        }

        if (!empty($request->input('password'))) {
            $client->password = bcrypt($request->input('password'));
        }
        if ($request->hasFile('avatar')) {

            if ($client->avatar !== "default-pp.png") {
                //to remove the old avatar and also keep the default img
                $imagePath = public_path('img/useravatar/' . $client->avatar);
                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }
            }

            $file_extension = request()->avatar->getClientOriginalExtension();
            $file_name = $request->input('first_name') . time() . '.' . $file_extension;
            $path = 'img/useravatar';
            $request->avatar->move($path, $file_name);

            $client->avatar = $file_name; //new img file name
        } else {
            $file_name = request()->avatar;
        }
        $client->save();

        session()->flash('success', 'The user has been updated');
        return redirect()->back();
    }


    public function ShowProducts($slug)
    {

          $product = Product::where('slug_en', '=', $slug)->with(['Productimg' => function ($q) {
            $q->select('id', 'name_img', 'product_id');
        }])->with(['sub_prices' => function ($q) {
            $q->select('id', 'price', 'product_id', 'subscription_id');
        }])->with(['seller_stocks' => function ($q) {
            $q->select('id', 'quantity', 'product_id');
        }])->with(['brand' => function ($q) {
            $q->select('id', 'name_ar','cover_img','slug_en');
        }])->first();

        // return  ;

       $product_barand = Product::select('id','slug_en','name_ar','cover_image')->where('brand_id',$product->brand->id)->paginate(5);
       $products = Product::select('id','slug_en','name_ar','cover_image','main_categorys_id')->with(['main_category' => function ($q) {
        $q->select('id', 'name_ar');
     }])->paginate(20);

         $count =  $product->seller_stocks->sum('quantity');
        return view('website.product.show', compact('product', 'count','product_barand','products'));
    }
    public function search($search_query)
    {
        $product = Product::select('name_ar', 'slug_en', 'cover_image')
            ->where(function ($query) use ($search_query) {
                $query->where('name_ar', 'like', "%{$search_query}%")->where('inactive', 0);
            })
            ->limit(10)
            ->get();
        return $product;
    }
    public function ResultSearch(Request $request)
    {
        $search_query = $request->input('search');
        $product = Product::select('name_ar', 'slug_en', 'cover_image')
            ->where(function ($query) use ($search_query) {
                $query->where('name_ar', 'like', "%{$search_query}%")->where('inactive', 0);
            })
            ->limit(10)
            ->get();
        return view('website.product.resultsearch', compact('product', 'search_query'));
    }

    public function generateRandomString($length = 20)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }


    // Show all Packages
    public function show_all_subscription(request $request)
    {
        $subscription = Subscription::orderBy('id', 'DESC');
        if ($request->input('subscription_id')) {
            $subscription = $subscription->where('subscription_id', $request->input('subscription_id'));
        }

        return view('website/layouts/includes/topbar_2', compact('subscription'));
    }

    // public function packages($id)
    // {

    //     $subscription = Subscription::find($id);
    //     return view('website/index',  compact('subscription'));
    // }
    public function active_client()
    {
        return view('website.auth.not_active_client');
    }
}