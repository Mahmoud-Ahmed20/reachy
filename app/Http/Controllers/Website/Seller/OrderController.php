<?php

namespace App\Http\Controllers\Website\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Website\Order;
use App\Models\Website\Order_item;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    //
    public function show_all_order()
    {
        $buyer_id = Auth::guard('seller')->id();
        $orders = Order_item::where('seller_id', $buyer_id)->paginate(10);
        // return view('website/seller/product/add_product');
        $orders = Order_item::with(['order' => function ($q) {
            $q->select('id','code','arrived_date','status','total_price');
        }])->with(['product' => function ($q) {
            $q->select('id','code','name_en');
        }])->with(['seller' => function ($q) {
            $q->select('id','first_name' ,'second_name');
        }])->with(['seller_stock' => function ($q) {
            $q->select('id','quantity');
        }])->get();

        // return $orders[0]->product;

        // return $orders ;
        return view('website/seller/order/show_all_order_seller', compact('orders'));

    }
}

