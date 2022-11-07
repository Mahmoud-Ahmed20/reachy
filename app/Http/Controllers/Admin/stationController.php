<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Models\Admin\Station;
use App\Models\Website\Order;
use App\Models\Website\Order_item;
use Illuminate\Support\Facades\Auth;

class stationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $station = Station::all();
        return view('admin/station/index', compact('station'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/station/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required|max:40', 'address' => 'required',]);
        $Station = Station::create([
            'name' => $request->input('name'),
            'address' => $request->input('address'),
        ]);
        session()->flash('success', 'The Station has been created');
        return redirect()->route('sett.stations.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $station = Station::find($id);
        return view('admin/station/edit', compact('station'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Station = Station::find($id);
        $Station->name = $request->input('name');
        $Station->address = $request->input('address');
        $Station->save();
        session()->flash('success', 'The brand has been updated');
        return redirect()->route('sett.stations.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id =  $request->input('station_id');
        $Station = Station::find($id);
        $Station->delete();
        session()->flash('success', 'The image has been deleted ');
        return redirect()->route('sett.stations.index');
    }


    //search all patients depends on filters
    public function show_all_orders(request $request){

        $orders = Order_item::orderBy('id', 'DESC');
        if($request->input('status')){
            $orders = $orders->where('status', $request->input('status'));
        }

        if($request->input('reco_srch')){
            $orders = $orders->where('recommendation', $request->input('reco_srch'));
        }

        $orders = $orders->paginate(10);

        return view('admin/station.show_all', compact('orders'));
    }

    public function show_all_orders_details($id){

        $order_item = Order_item::find($id);
        return view('admin/station.show_all_order_details',  compact('order_item'));
    }

    public function update_status_order(Request $request, $id)
    {
        $this->validate($request, [
            'status' => 'required',
        ]);

        $order = Order::find($id);
        $order->status = $request->input('status');
        $order->save();

        session()->flash('success', 'The buyre has been updated');
        return back()->withInput();
    }

    public function update_status(Request $request, $id)
    {
        $this->validate($request, [
            'status' => 'required',
        ]);

        $order = Order_item::find($id);
        $order->status = $request->input('status');
        $order->save();

        session()->flash('success', 'The buyre has been updated');
        return back()->withInput();
    }


}
