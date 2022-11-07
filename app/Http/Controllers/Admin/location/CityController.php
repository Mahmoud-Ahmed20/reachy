<?php

namespace App\Http\Controllers\Admin\location;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\location\City;
use App\Models\location\Country;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $city = City::select(['id', 'country_id', 'name_ar', 'name_en'])->with(['Country' => function ($q) {
            $q->select('id', 'name_ar', 'name_en');
        }])->get();

        return view('admin/location/city/index', compact('city'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Countrys = Country::all();
        return view('admin/location/City/create', compact('Countrys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the form data
        $this->validate($request, ['name_ar' => 'required|max:50', 'name_en' => 'required|max:50', 'country_id' => 'required|exists:countries,id']);
        // create Countries in db
        $citys = city::create([
            'name_ar' => $request->input('name_ar'),
            'name_en' => $request->input('name_en'),
            'country_id' => $request->input('country_id'),
        ]);
        session()->flash('success', 'The brand has been created');
        return redirect()->route('sett.city.index');
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
        $Countrys = Country::all();
        $city = city::with(['Country' => function ($q) {
            $q->select('id', 'name_ar');
        }])->find($id);
        return view('admin/location/City/edit', compact('city', 'Countrys'));
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
        $city = city::find($id);
        $city->name_ar = $request->input('name_ar');
        $city->name_en = $request->input('name_en');
        $city->country_id = $request->input('country_id');
        $city->save();
        session()->flash('success', 'The brand has been updated');
        return redirect()->route('sett.city.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id =  $request->input('ctiy_id');
        $city = city::find($id);
        $city->delete();
        session()->flash('success', 'The user has been deleted');
        return redirect()->route('sett.city.index');
    }
}