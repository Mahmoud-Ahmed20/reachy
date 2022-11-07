<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Admin\Address;
use App\Models\Location\City;
use App\Models\Location\Country;
use App\Models\Location\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdderssController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $address = Address::select('id', 'name_street', 'address_details', 'building_number', 'phone', 'apartment_number','favorite_address', 'country_id', 'city_id', 'region_id', 'client_id')
            ->with(['country' => function ($q) {
                $q->select('id', 'name_en', 'name_ar');
            }])->with(['city' => function ($q) {
                $q->select('id', 'name_en', 'name_ar');
            }])->with(['region' => function ($q) {
                $q->select('id', 'name_en', 'name_ar');
            }])->with(['client' => function ($q) {
                $q->select('id');
            }])->get();
        return view('website.address.index', compact('address'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $country = Country::all();
        $city = City::all();
        $region = Region::all();
        return view('website/address/create', compact('country', 'city', 'region'));
    }
    public function city_get_ajax($id)
    {
        return City::where('country_id', $id)->get();
    }
    public function region_get_ajax($id)
    {
        return Region::where('city_id', $id)->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'name_street' => 'required',
            'building_number' => 'required',
            'address_details' => 'required',
            'apartment_number' => 'required',
            'country_id' => 'required|exists:countries,id',
            'city_id' => 'required|exists:cities,id',
            'region_id' => 'required|exists:regions,id',
        ]);

        $client_id = Auth::guard('client')->id();

        //remove the fav address first
        if ($request->input('favorite')) {
            $favorite_address = Address::where('favorite_address', 1)
                ->where('client_id', $client_id)
                ->first();
            if ($favorite_address) {
                $favorite_address->favorite_address = 0;
                $favorite_address->save();
            }
        }



        $id = Auth::guard('client')->user()->id;
        $addres = Address::create([
            'name_street' => $request->input('name_street'),
            'address_details' => $request->input('address_details'),
            'building_number' => $request->input('building_number'),
            'apartment_number' => $request->input('apartment_number'),
            'phone' => $request->input('phone'),
            'country_id' => $request->input('country_id'),
            'city_id' => $request->input('city_id'),
            'region_id' => $request->input('region_id'),
            'client_id' => $id,
            'favorite_address' => $request->input('favorite'),
        ]);
        session()->flash('success', 'تم تسجيل العنوان بنجاح');
        return redirect()->route('client.address.index');
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
        $addres  = Address::with(['country' => function ($q) {
            $q->select('id', 'name_en', 'name_ar');
        }])->with(['city' => function ($q) {
            $q->select('id', 'name_en', 'name_ar');
        }])->with(['region' => function ($q) {
            $q->select('id', 'name_en', 'name_ar');
        }])->with(['client' => function ($q) {
            $q->select('id');
        }])->find($id);
        $country = Country::all();
        $city = City::all();
        $region = Region::all();
        if (Auth::guard('client')->user()->id == $addres->client_id) {
            return view('website.address.edit', compact('addres', 'country', 'city', 'region'));
        } else {
            return view('errors.404');
        }
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
        $addres  = Address::with(['client' => function ($q) {
            $q->select('id');
        }])->find($id);

        if (Auth::guard('client')->user()->id == $addres->client->id) {
            $addres->name_street = $request->input('name_street');
            $addres->address_details = $request->input('address_details');
            $addres->building_number = $request->input('building_number');
            $addres->phone = $request->input('phone');
            $addres->country_id = $request->input('country_id');
            $addres->city_id = $request->input('city_id');
            $addres->save();
            session()->flash('success', 'تم تسجيل العنوان بنجاح');
            return redirect()->route('client.address.index');
        } else {
            return view('errors.404');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id =  $request->input('addres_id');
        $addres =
            Address::with(['client' => function ($q) {
                $q->select('id');
            }])->find($id);
        if (Auth::guard('client')->user()->id == $addres->client->id) {
            $addres->delete();
            session()->flash('success', 'The user has been deleted');
            return redirect()->route('client.address.index');
        } else {
            return view('errors.404');
        }
    }
    public function update_favorite($id)
    {
        $client_id = Auth::guard('client')->id();
        //remove the fav address first
        $favorite_address = Address::where('favorite_address', 1)
            ->where('client_id', $client_id)
            ->first();
        if ($favorite_address) {
            $favorite_address->favorite_address = 0;
            $favorite_address->save();
        }

        $address = Address::find($id);
        $address->favorite_address = 1;
        $address->save();

        session()->flash('success', 'The addres has been updated');
        return redirect()->back();
    }
    public function favorite_ajax($id)
    {

        $client_id = Auth::guard('client')->id();
        //remove the fav address first
        $favorite_address = Address::where('favorite_address', 1)
            ->where('client_id', $client_id)
            ->first();
        if ($favorite_address) {
            $favorite_address->favorite_address = 0;
            $favorite_address->save();
        }

        $address = Address::find($id);
        $address->favorite_address = 1;
        $address->save();
        return response()->json(['action' => 'delete', 'message' => 'تم الحذف بنحاج']);
    }
    public function store_ajax()
    {
        $id = Auth::guard('client')->user()->id;
        $addres = Address::create([
            'name_street' => $request->input('name_street'),
            'address_details' => $request->input('address_details'),
            'building_number' => $request->input('building_number'),
            'apartment_number' => $request->input('apartment_number'),
            'phone' => $request->input('phone'),
            'country_id' => $request->input('country_id'),
            'city_id' => $request->input('city_id'),
            'region_id' => $request->input('region_id'),
            'client_id' => $id,
            'favorite_address' => $request->input('favorite'),
        ]);
         return response()->json(['action' => 'delete', 'message' => 'تم الحذف بنحاج']);
    }



}
