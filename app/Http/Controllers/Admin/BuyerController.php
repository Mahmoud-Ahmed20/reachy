<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Partners\Buyer;
use Illuminate\Support\Facades\File;
use App\Http\Requests\BuyreRequest;
use App\Models\Admin\Address;
use App\Models\Location\Country;
use App\Models\Website\Client;
use App\Models\Website\Order;
use Illuminate\Support\Facades\DB;

class BuyerController extends Controller
{
    public function index()
    {
        $buyre = Client::select(['id', 'email', 'password', 'phone', 'first_name', 'second_name', 'inactive', 'avatar', 'gendar', 'fov_poyment', 'note', 'country_id'])
            ->with(['country' => function ($q) {
                $q->select('id', 'name_en', 'name_ar');
            }])->paginate(10);
        return view('admin.buyre.index', compact('buyre'));
    }

    public function show($id)
    {
        $buyre = Client::select(['id', 'email', 'password', 'phone', 'first_name', 'second_name', 'inactive', 'avatar', 'gendar', 'fov_poyment', 'note', 'country_id'])
            ->with(['country' => function ($q) {
                $q->select('id', 'name_en', 'name_ar');
            }])->find($id);
        return view('admin.buyre.show', compact('buyre'));
    }

    public function store(BuyreRequest $request)
    {
        // Validate the form data
        if ($request->hasFile('avatar')) {
            $file_extension = request()->avatar->getClientOriginalExtension();
            $file_name = $request->input('first_name') . time() . '.' . $file_extension;
            $path = 'img/useravatar';
            $request->avatar->move($path, $file_name);
        } else {
            $file_name = 'default-pp.png';
        }



        $buyre = Buyer::create([
            // 'fov_Addres' => $file_name,
            'avatar' => $file_name,
            'note' => $request->input('note'),
            'gendar' => $request->input('gendar'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'first_name' => $request->input('first_name'),
            'second_name' => $request->input('second_name'),
            'favorite_payment' => $request->input('favorite_payment'),
            'inactive' => $request->input('inactive'),
            'phone_number' => $request->input('phone_number'),
        ]);

        session()->flash('success', 'The user has been created');
        return redirect()->route('sett.buyre.index');
    }

    public function edit($id)
    {
        $buyre = Client::find($id);
        $Country = Country::all();
        return view('admin.buyre.edit', compact('buyre', 'Country'));
    }

    public function update(Request $request, $id)
    {


        $client = Client::find($id);

        $client->first_name = $request->input('first_name');
        $client->second_name = $request->input('second_name');
        $client->email = $request->input('email');
        $client->phone = $request->input('phone');
        $client->note = $request->input('note');
        $client->country_id = $request->input('country_id');

        $client->gendar = $request->input('gendar');

        $client->inactive = $request->input('inactive');
        if (!empty($request->input('password'))) {
            $client->password = bcrypt($request->input('password'));
        }

        //insert img
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
        session()->flash('success', 'The buyre has been updated');
        return redirect()->route('sett.buyre.index');
    }

    public function destroy(Request $request)
    {
        $id =  $request->input('role_id');
        $buyre = Buyer::find($id);
        $buyre->delete();
        session()->flash('success', 'The buyre has been deleted');
        return redirect()->route('sett.buyre.index');
    }
    public function Show_orders($id)
    {
        $orders = Order::where('client_id', $id)->paginate(10);
        return view('admin.buyre.orders', compact('orders'));
    }
    public function ordrer_item($id)
    {
        $order =  Order::where('id', $id)->with(['client' => function ($q) {
            $q->select('id');
        }])->with(['order_item' => function ($q) {
            $q->select('order_id', 'final_price', 'product_id');
        }])->first();
        $address = Address::find($order->address_id);

        // $address = Address::find($order->address_id);
        return view('admin.buyre.order_item', compact('order', 'address'));
    }
    public function show_all_client(Request $request)
    {
        $Country = Country::all();
        $client = Client::orderBy('id', 'DESC');
        if ($request->input('country_id')) {
            $client = $client->where('country_id', $request->input('country_id'));
        }
        $client = $client->paginate(10);
        return view('admin.buyre.smart_search', compact('Country', 'client'));
    }
    public function search()
    {
        return view('admin.buyre.search');
    }
    public function search_query($search_query)
    {
         $client = Client::select('id','first_name', 'second_name')
        ->where(function ($query) use ($search_query) {
            $query->where('first_name', 'like', "%{$search_query}%")
            ->Orwhere('second_name', 'like', "%{$search_query}%")
            ->Orwhere('phone', 'like', "%{$search_query}%");
        })
        ->limit(10)
        ->get();
        return $client;
    }
}
