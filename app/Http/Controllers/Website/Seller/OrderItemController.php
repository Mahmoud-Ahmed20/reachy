<?php

namespace App\Http\Controllers\Website\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Website\Order_item;
use App\Models\Website\Order;
use App\Models\Partners\Seller;
use App\Models\Admin\products\product;

use Illuminate\Support\Facades\Auth;

class OrderItemController extends Controller
{
    //
    public function show_all_order_item($id)
    {

        $buyer_id = Auth::guard('seller')->id();
        $orders = Order_item::where('seller_id', $buyer_id)->paginate(10);
        $order_address = Order::where('address_id',$id)->get();
        //  return $order_address[0]->address;
        return view('website/seller/order/show_all_order_item_seller', compact('orders','order_address'));

    }


}
