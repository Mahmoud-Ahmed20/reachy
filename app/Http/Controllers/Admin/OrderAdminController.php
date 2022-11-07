<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Website\Order;
use App\Models\Website\Order_item;

class OrderAdminController extends Controller
{
    public function search()
    {
        return view('admin.order.search');
    }
    public function search_query($search_query)
    {
        $Order = Order::select('id','code')
        ->where(function ($query) use ($search_query) {
            $query->where('code', 'like', "%{$search_query}%");
        })
        ->limit(10)
        ->get();
        return $Order;
    }


    public function inprogress(){
        $order_item = Order::select('id', 'status','code')->where('status' , 1)
           ->with(['order_item' => function ($q) {

               $q->select('id','order_id','product_id')->with(['product' => function($q){
               $q->select('id','name_ar','cover_image');
               }]);

           }])->get();
      return view('admin.order.inprogress', compact('order_item'));
  }


    public function inprogress_item($id){

       $order_item = Order_item::find($id);
       return view('admin.order.order_progress_item',  compact('order_item'));
   }


   public function out_for_delivery(request $request)
   {

       $order_item = Order::select('id', 'status','code')->where('status' , 4)
           ->with(['order_item' => function ($q) {

               $q->select('id','order_id','product_id')->with(['product' => function($q){
               $q->select('id','name_ar','cover_image');
               }]);

           }])->get();


       return view('admin.order.out_for_delivery', compact( 'order_item'));

   }

   public function out_for_delivery_item($id){

       $order_item = Order_item::find($id);
       return view('admin.order.out_for_delivery_item',  compact('order_item'));
   }


   public function deliverd(request $request)
   {
       $order_item = Order::select('id', 'status','code')->where('status' , 5)
       ->with(['order_item' => function ($q) {

           $q->select('id','order_id','product_id')->with(['product' => function($q){
           $q->select('id','name_ar','cover_image');
           }]);

       }])->get();

       return view('admin.order.delivered', compact('order_item'));

   }
   public function deliverd_item($id){

       $order_item = Order_item::find($id);
       return view('admin.order.out_for_delivery_item',  compact('order_item'));
   }

}
