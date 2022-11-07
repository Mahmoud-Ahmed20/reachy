<?php

namespace App\Http\Controllers\Admin\products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Admin\Brand;



class brandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::all();
        return view('admin/brand/index',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin/brand/create');
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
        $this->validate($request,
        [
            'name_ar'=>'required|max:50',
            'name_en'=>'required|max:50',
            'slug_ar'=>'required|max:50',
            'slug_en'=>'required|max:50',
            'logo' => ['image', 'mimes:jpeg,jpg,png', 'max:700'],

        ]);

        //insert img

            $file_extension = request()->logo->getClientOriginalExtension();
            $file_name = $request->input('name_en') . time() . '.' . $file_extension;
            $path = 'img/brands';
            $request->logo->move($path, $file_name);


        $Brand = Brand::create([
            'logo' => $file_name,
            'name_ar' => $request->input('name_ar'),
            'name_en' => $request->input('name_en'),
            'slug_ar' => $request->input('slug_ar'),
            'slug_en' => $request->input('slug_en'),
        ]);
        session()->flash('success', 'The brand has been created');
        return redirect()->route('sett.brand.index');
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
        $brand = Brand::find($id);
        return view('admin/brand/edit',compact('brand'));
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
        $Brand = Brand::find($id);
        $Brand->name_ar = $request->input('name_ar');
        $Brand->name_en = $request->input('name_en');
        $Brand->slug_ar = $request->input('slug_ar');
        $Brand->slug_en = $request->input('slug_en');

         //insert img
        if($request->hasFile('logo')){

            if($Brand->logo){
                //to remove the old avatar and also keep the default img
                $imagePath = public_path('img/brandس/'.$Brand->logo);
                if(File::exists($imagePath)){
                    File::delete($imagePath);
                }
            }

            $file_extension = request()->logo->getClientOriginalExtension();
            $file_name = $request->input('name_en') . time() . '.' . $file_extension;
            $path = 'img/brands';
            $request->logo->move($path, $file_name);
            $Brand->logo = $file_name; //new img file name
        }
        else{
            $file_name = request()->logo;
        }
        $Brand->save();
        session()->flash('success', 'The brand has been updated');
        return redirect()->route('sett.brand.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id =  $request->input('brand_id');
        $brand = Brand::find($id);
        $brand->delete();
        session()->flash('success', 'The user has been deleted');
        return redirect()->route('sett.brand.index');
    }
}