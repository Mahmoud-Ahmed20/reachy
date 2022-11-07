<?php

namespace App\Http\Controllers\Admin\location;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\location\Country;

class CountriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Countries = Country::all();
        return view('admin/location/Countries/index', compact('Countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/location/Countries/create');
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
        // dd($request->all());
        $this->validate($request, ['name_ar' => 'required|max:50', 'name_en' => 'required|max:50']);
        // create Countries in db
        $Countries = Country::create([
            'name_ar' => $request->input('name_ar'),
            'name_en' => $request->input('name_en'),
        ]);
        session()->flash('success', 'The brand has been created');
        return redirect()->route('sett.countries.index');
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
        $Countrie = Country::find($id);
        return view('admin/location/countries/edit', compact('Countrie'));
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
        $Countrie = Country::find($id);
        $Countrie->name_ar = $request->input('name_ar');
        $Countrie->name_en = $request->input('name_en');
        $Countrie->save();
        session()->flash('success', 'The brand has been updated');
        return redirect()->route('sett.countries.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id =  $request->input('countrie_id');
        $Countrie = Country::find($id);
        $Countrie->delete();
        session()->flash('success', 'The user has been deleted');
        return redirect()->route('sett.countries.index');
    }
}