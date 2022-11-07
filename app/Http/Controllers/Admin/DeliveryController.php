<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Website\Order;
use Illuminate\Support\Facades\Auth;



class DeliveryController extends Controller
{

    public function delivery()
    {

        $delivery = Order::select('id','code','final_price','solid_price','sub_total','arrived_date')->where('status',3);
        if(!Auth::user()->hasRole('Super-admin')){
            $delivery= $delivery->where('delivery_id',Auth::user()->id);
        }
        $delivery = $delivery->get();
        return view('admin.dleivery.index',compact('delivery'));
    }
    public function ordrer_item($id)
    {

         $order =  Order::with(['client' => function ($q) {
            $q->select('id');
        }])->with(['order_item' => function ($q) {
            $q->select('order_id', 'final_price', 'product_id','quantity');
        }])->with(['address' => function ($q) {
            $q->select('id','name_street', 'address_details', 'building_number','phone','apartment_number','client_id','region_id','city_id');
        }]);
        if(!Auth::user()->hasRole('Super-admin')){
            $order= $order->where('id', $id)->where('delivery_id',Auth::user()->id);
        }
        $order = $order->first();
        return view('admin.dleivery.order_item', compact('order'));
    }
    public function dlevery_update_status(Request $request)
    {
        $id = $request->id;
        $order = Order::find($id);
        $order->status = 4;
        $order->save();
        return redirect()->route('sett.delivery.index');
    }
    public function dlevery_recive_refund()
    {
        $delivery = Order::select('id','code','final_price','solid_price','sub_total','arrived_date')->where('status',4);
        if(!Auth::user()->hasRole('Super-admin')){
            $delivery= $delivery->where('delivery_id',Auth::user()->id);
        }
        $delivery = $delivery->get();
        return view('admin.dleivery.dlevery_recive_refund',compact('delivery'));
    }
    public function done_order()
    {
        $delivery = Order::select('id','code','final_price','solid_price','sub_total','arrived_date')->where('status',6);
        if(!Auth::user()->hasRole('Super-admin')){
            $delivery= $delivery->where('delivery_id',Auth::user()->id);
        }
        $delivery = $delivery->get();
        return view('admin.dleivery.done_order',compact('delivery'));
    }




}
