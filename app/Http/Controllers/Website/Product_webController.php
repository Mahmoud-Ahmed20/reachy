<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Admin\Address;
use App\Models\Admin\products\Price;
use App\Models\Admin\products\Product;
use App\Models\Admin\Seller_stock;
use Illuminate\Http\Request;
use App\Models\Location\City;
use App\Models\Location\Country;
use App\Models\Location\Region;
use App\Models\Website\Order;
use App\Models\Website\Order_item;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;
use App\Models\Admin\Subscription;
use Illuminate\Support\Facades\Cookie;


class Product_webController extends Controller
{
    public function index(Request $request)
    {
        $subscurpition = Subscription::all();

        $products = Product::select('products.id', 'products.name_ar', 'products.name_en', 'products.main_categorys_id','products.slug_ar', 'products.slug_en', 'products.orginal_price', 'products.cover_image', 'sub_prices.price',
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
            $products = $products->where('sub_prices.subscription_id', Cookie::get('sub_chosen'));
        }
        //if it has not a cookie
        else {
            //if the user chose a subscration from the button
            if ($request->input('slug_ar')) {
                $slug_ar =  $request->input('slug_ar');
                $subscrs = Subscription::where('slug_ar', $slug_ar)->first();
                $product = $products->where('sub_prices.subscription_id', $subscrs->id);

                Cookie::queue(Cookie::make('sub_chosen', $subscrs->id));
            }
            //if the user does not chose a subscation
            else {
                $products = $products->where('sub_prices.subscription_id', 1);
            }
        }
         $products = $products->get();


         $address = Address::where('client_id', Auth::guard('client')->user()->id)->get();
        $favorite_address = Address::where('client_id', Auth::guard('client')->user()->id)->where('favorite_address', 1)->first();
        $country = Country::all();
        $city = City::all();
        $region = Region::all();
        $product = Product::select('id', 'name_ar', 'cover_image', 'orginal_price', 'tax')->with(['sub_prices' => function ($q) {
            $q->select('id', 'price', 'product_id', 'subscription_id');
        }])->with(['seller_stocks' => function ($q) {
            $q->select('id', 'quantity', 'product_id');
        }])->where('inactive', 0)->paginate(1);

        return view('website.orders.order', compact('address', 'product', 'country', 'favorite_address', 'city', 'region','products','subscurpition'));
    }
    public function order(Request $request)
    {
        $client_id = Auth::guard('client')->user()->id;
        $order = Order::create([
            'code' =>  "IN" . $this->generateRandomString(6),
            'client_id' => $client_id,
            'status' => 1,
            'address_id' => $request->input('adderss_id'),
            'final_price' => $request->input('total_price'),
        ]);
        foreach ($request->input('product_id') as $key => $value) {
            $price = $request->input('price')[$key];
            $qunt = $request->input('qunt')[$key];
            $final_price = $price * $qunt;
            $product  = Product::select('id', 'tax')->where('id', $request->input('product_id')[$key])->get();
            $stock_seller  = Seller_stock::select('id', 'product_id', 'seller_id')->where('product_id', $request->input('product_id')[$key])->get();
            foreach ($product as $item) {
                $product_tax =   $item->tax;
                $product_id = $item->id;
            }
            foreach ($stock_seller as $seller) {
                $stock_id =  $seller->id;
                $seller = $seller->seller_id;
            }
            $orderitem = Order_item::create([
                'order_id' => $order->id,
                'product_id' => $product_id,
                'quantity' => $qunt,
                'tax' => $product_tax,
                'price' => $price,
                'final_price' => $final_price,
                'seller_stock_id' =>  $stock_id,
                'seller_id' => $seller,
            ]);
        }
        return redirect()->route('client.current_requests');
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
}
