<?php

namespace App\Http\Controllers\Admin\location;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\location\City;
use App\Models\location\Region;


class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $regions = Region::select(['id', 'city_id', 'name_ar', 'name_en'])->with(['city' => function ($q) {
            $q->select('id', 'name_ar', 'name_en');
        }])->get();
        return view('admin/location/Region/index', compact('regions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ctiys = City::all();
        return view('admin/location/Region/create', compact('ctiys'));
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
        $this->validate($request, ['name_ar' => 'required|max:40', 'name_en' => 'required|max:40', 'city_id' => 'required|exists:cities,id']);
        // dd($request->all());
        // create Countries in db
        $Region = Region::create([
            'name_ar' => $request->input('name_ar'),
            'name_en' => $request->input('name_en'),
            'city_id' => $request->input('city_id'),
        ]);
        session()->flash('success', 'The brand has been created');
        return redirect()->route('sett.region.index');
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
        $Region = Region::find($id);
        $ctiys = City::all();

        return view('admin/location/region/edit', compact('Region', 'ctiys'));
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
        $Region = Region::find($id);
        $Region->name_ar = $request->input('name_ar');
        $Region->name_en = $request->input('name_en');
        $Region->city_id = $request->input('city_id');
        $Region->save();
        session()->flash('success', 'The brand has been updated');
        return redirect()->route('sett.region.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id =  $request->input('city_id');
        $region = Region::find($id);
        $region->delete();
        session()->flash('success', 'The user has been deleted');
        return redirect()->route('sett.region.index');
    }
}