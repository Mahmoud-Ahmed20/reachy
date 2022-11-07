<?php

namespace App\Http\Controllers\Admin\Categorys;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Categorys\MainCategorys;

class MainCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $mainCategory = MainCategorys::paginate(10);
        return view('admin/categorys/maincategory/index', compact('mainCategory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/categorys/maincategory/create');
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
        $this->validate(
            $request,
            [
                'name_ar' => 'required|max:50',
                'name_en' => 'required|max:50',
                'slug_ar' => 'required|unique:main_categorys,slug_ar',
                'slug_en' => 'required|unique:main_categorys,slug_en'
            ]
        );
        // create mainCategorys in db
        $mainCategorys = MainCategorys::create([
            'name_ar' => $request->input('name_ar'),
            'name_en' => $request->input('name_en'),
            'slug_ar' => $request->input('slug_ar'),
            'slug_en' => $request->input('slug_en'),
        ]);
        session()->flash('success', 'The brand has been created');
        return redirect()->route('sett.mainCategory.index');
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
        $mainCategory = MainCategorys::find($id);
        return view('admin/categorys/maincategory/edit', compact('mainCategory'));
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
        $mainCategory = MainCategorys::find($id);
        $mainCategory->name_ar = $request->input('name_ar');
        $mainCategory->name_en = $request->input('name_en');
        $mainCategory->slug_ar =  $request->input('slug_ar');
        $mainCategory->slug_en =  $request->input('slug_en');
        $mainCategory->save();
        session()->flash('success', 'The brand has been updated');
        return redirect()->route('sett.mainCategory.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id =  $request->input('maincategory_id');
        $mainCategory = MainCategorys::find($id);
        $mainCategory->delete();
        session()->flash('success', 'The user has been deleted');
        return redirect()->route('sett.mainCategory.index');
    }
}