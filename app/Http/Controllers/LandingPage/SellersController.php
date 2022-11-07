<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Partners\Seller;
use App\Http\Requests\SellerRequest;
use App\Models\Admin\Address;
use App\Models\Website\Order;
use App\Models\Website\Order_item;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;
use App\Models\Admin\Subscription;  
use App\Models\Admin\products\Product;
use Illuminate\Support\Facades\Cookie;
class SellersController extends Controller
{



    public function index()
    {
        return view('website/index');
    }
    public function activeSeller()
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
        return view('website/auth_seller/not_active_seller', compact('product','subscurpition'));
    }

    public function dashboard()
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
        return view('website/seller/seller_dashboard', compact('product','subscurpition'));
    }


    public function login()
    {
        return view('website/auth_seller/login');
    }

    public function login_sub(Request $request){

        // Validate the form data
        $this->validate($request, [
            'phone'   => 'required',
            'password' => 'required',
        ]);
        //return $request->password;
        // Attempt to log the seller in
        if (Auth::guard('seller')->attempt(['phone' => $request->phone, 'password' => $request->password], $request->remember)) {
            $request->session()->regenerate();

            // if successful, then redirect to their intended location
            // return  route('sleller.dashboard');
            return redirect()->route('seller.index');

        }


        // if unsuccessful, then redirect back to the login with the form data
        return back()->withErrors([
            'phone' => 'Your Phone number or Password is not correct!',
        ]);

  }

    public function logout(){
        Auth::guard('seller')->logout();
        return redirect()->route('landing');
    }

    public function register(){

        return view('website/auth_seller/register');
    }

    public function sms_active(){
        return view('website/auth_seller/sms_active');
    }

    public function congratulation(){
        return view('website/auth_seller/congratulation');
    }

  public function store(SellerRequest $request){

    //insert img
    if($request->hasFile('avatar')){
        $file_extension = request()->avatar->getClientOriginalExtension();
        $file_name = $request->input('first_name') . time() . '.' . $file_extension;
        $path = 'img/useravatar';
        $request->avatar->move($path, $file_name);
    }
    else{
        $file_name = 'default-pp.png';
    };

    if ($request->hasFile('commercial_register')) {
        $file_extension = request()->commercial_register->getClientOriginalExtension();
        $file_name_commercial = $request->input('first_name') . time() . '.' . $file_extension;
        $path = 'img/useravatar';
        $request->commercial_register->move($path, $file_name_commercial);
    }

    if ($request->hasFile('tax_register')) {
        $file_extension = request()->tax_register->getClientOriginalExtension();
        $file_name_tax_register = $request->input('first_name') . time() . '.' . $file_extension;
        $path = 'img/useravatar';
        $request->tax_register->move($path, $file_name_commercial);
    }

    $seller = Seller::create([
        'email' => $request->input('email'),
        'password' => bcrypt($request->input('password')),
        'first_name' => $request->input('first_name'),
        'second_name' => $request->input('second_name'),
        'user' => $request->input('user'),
        'avatar' => $file_name,
        'tax_register' => $file_name,
        'commercial_register' => $file_name,
        'phone' => $request->input('phone'),
     ]);

     Auth::guard('seller')->login($seller);

    session()->flash('success', 'The seller has been created successfully');
    return redirect()->route('seller.sms_active');
}


        public function seller_dashboard(Request $request)
    {

        $seller_id = Auth::guard('seller')->user()->id;

        $seller = Seller::find($seller_id);


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

        return view('website.seller.seller_dashboard',compact('seller','product','subscurpition'));
    }


    public function edit_profile_seller_dashboard(Request $request)
    {

        $seller_id = Auth::guard('seller')->user()->id;

        $seller = Seller::find($seller_id);
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
        return view('website.seller.edit_profile',compact('seller','product','subscurpition'));
    }

    public function edit_profile_seller(request $request)
    {


        $seller_id = Auth::guard('seller')->user()->id;


        $seller = Seller::find($seller_id);

        $seller->first_name = $request->input('first_name');
        $seller->second_name = $request->input('second_name');
        $seller->email = $request->input('email');
        $seller->phone = $request->input('phone');
        $seller->user = $request->input('user');
        if (!empty($request->input('password'))) {
            $seller->password = bcrypt($request->input('password'));
        }
        //insert img
        if ($request->hasFile('avatar')) {

            if ($seller->avatar !== "default-pp.png") {
                //to remove the old avatar and also keep the default img
                $imagePath = public_path('img/useravatar/' . $seller->avatar);
                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }
            }

            $file_extension = request()->avatar->getClientOriginalExtension();
            $file_name = $request->input('first_name') . time() . '.' . $file_extension;
            $path = 'img/useravatar';
            $request->avatar->move($path, $file_name);

            $seller->avatar = $file_name; //new img file name
        } else {
            $file_name = request()->avatar;
        }


        $seller->save();

        session()->flash('success', 'The user has been updated');
        // return redirect()->route('seller.dashboard');
        return back()->withInput();
    }


    // $product = Product::select('id', 'name_ar', 'cover_image', 'orginal_price', 'tax')->with(['sub_prices' => function ($q) {
    //     $q->select('id', 'price', 'product_id', 'subscription_id');
    // }])->with(['seller_stocks' => function ($q) {
    //     $q->select('id', 'quantity', 'product_id');
    // }])->where('inactive', 0)->get();

    public function order()
    {
        $seller_id = Auth::guard('seller')->id();
         $orders = Order_item::select('id','status','order_id')
         ->where('status', '!=', 3)
         ->with(['order' => function($q){
            $q->select('id','status', 'code' , 'created_at' , 'final_price' ,'arrived_date');
        }])
        ->where('seller_id', $seller_id)
        ->paginate(10);
        
        // return $orders[0]->order;

        return view('website/seller/order/index', compact('orders'));
    }

    public function order_details($id)
    {

        $order_items = Order_item::with(['order' => function ($q) {
                $q->select('id', 'final_price', 'total_tax'); }])->find($id);
        $order = Order::with(['address' => function ($q) {
            $q->select('id', 'address_details', 'name_street','building_number','apartment_number'); }])->find($id);
        // $address = Address::find($id);
        return view('website/seller/order/order_items', compact('order_items','order'));
    }

    public function order_done()
    {
        $seller_id = Auth::guard('seller')->id();
        $orders = Order_item::where('status', 3)->where('seller_id', $seller_id)->get();
        return view('website/seller/order/order_done', compact('orders'));
    }

    public function order_item_update(Request $request)
    {

        $this->validate($request, [
            'order_item_id' => ['required', 'exists:order_items,id'],
            'status' => ['required', Rule::in([2])],
        ]);

        $status = $request->input('status');
        $seller_id = Auth::guard('seller')->id();

        $check_seller_id = Order_item::select('id','status','order_id')->where('id', $request->input('order_item_id'))
        ->where('seller_id', $seller_id)
        ->first();

        if(!$check_seller_id){
            session()->flash('error', 'No data available');
            return redirect()->back();
        }

        $check_seller_id->status = $status;

        if($status == 3){
            $check_seller_id->delivered_date = Carbon::now();
        }

        $check_seller_id->save();

        session()->flash('success', 'The item has been canceled');
        return redirect()->back();
    }

    public function wallet_seller(){
        $seller_id = Auth::guard('seller')->id();
        $wallet = Order_item::with(['order' => function ($q) {
            $q->select('id', 'code');
        }])->where('seller_id', $seller_id)->get();
        // return $wallet;

        return view('website/seller/wallet_seller/wallet', compact('wallet'));
        // return view('website/seller/wallet_seller/wallet');
    }

}