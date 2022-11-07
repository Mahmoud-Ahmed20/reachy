<?php

namespace App\Http\Controllers\Admin\Categorys;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Categorys\SubSubCategory;
use App\Models\Admin\Categorys\SubCategory;

class SubSubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subsubcategory = SubSubCategory::select(['id', 'sub_category_id', 'name_ar', 'name_en', 'slug_ar', 'slug_en'])->with(['subCategory' => function ($q) {
            $q->select('id', 'name_ar', 'name_en');
        }])->paginate(15);
        return view('admin/categorys/subsubcategory/index', compact('subsubcategory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subcategory = SubCategory::all();
        return view('admin/categorys/subsubcategory/create', compact('subcategory'));
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
                'slug_en' => 'required|unique:main_categorys,slug_en',
                'sub_category_id' => 'required|exists:sub_categories,id'
            ]
        );
        // create mainCategorys in db
        $subCategory = SubSubCategory::create([
            'name_ar' => $request->input('name_ar'),
            'name_en' => $request->input('name_en'),
            'slug_ar' => $request->input('slug_ar'),
            'slug_en' => $request->input('slug_en'),
            'sub_category_id' => $request->input('sub_category_id'),
        ]);
        session()->flash('success', 'The brand has been created');
        return redirect()->route('sett.subsubCategory.index');
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
        $subsubcategory = SubSubCategory::with(['subCategory' => function ($q) {
            $q->select('id', 'name_ar', 'name_en');
        }])->find($id);
        $subcategory = SubCategory::all();
        return view('admin.categorys.subsubcategory.edit', compact('subsubcategory', 'subcategory'));
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
        $subsubcategory = SubSubCategory::find($id);
        $subsubcategory->name_ar = $request->input('name_ar');
        $subsubcategory->name_en = $request->input('name_en');
        $subsubcategory->slug_ar =  $request->input('slug_ar');
        $subsubcategory->slug_en =  $request->input('slug_en');
        $subsubcategory->sub_category_id =  $request->input('sub_category_id');
        $subsubcategory->save();
        session()->flash('success', 'The brand has been updated');
        return redirect()->route('sett.subsubCategory.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id =  $request->input('subsubcategory_id');
        $subsubcategory = SubSubCategory::find($id);
        $subsubcategory->delete();
        session()->flash('success', 'The user has been deleted');
        return redirect()->route('sett.subsubCategory.index');
    }
}
