<?php

namespace App\Http\Controllers\Admin\Categorys;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Categorys\SubCategory;
use App\Models\Admin\Categorys\MainCategorys;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $subcategorys = SubCategory::select(['id', 'main_category_id', 'name_ar', 'name_en', 'slug_ar', 'slug_en'])->with(['mainCategory' => function ($q) {
            $q->select('id', 'name_ar', 'name_en');
        }])->paginate(15);
        return view('admin/categorys/subcategorys/index', compact('subcategorys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mainCategorys = MainCategorys::all();
        return view('admin/categorys/subcategorys/create', compact('mainCategorys'));
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
                'main_category_id' => 'required|exists:main_categorys,id'
            ]
        );
        // create mainCategorys in db
        $subCategory = SubCategory::create([
            'name_ar' => $request->input('name_ar'),
            'name_en' => $request->input('name_en'),
            'slug_ar' => $request->input('slug_ar'),
            'slug_en' => $request->input('slug_en'),
            'main_category_id' => $request->input('main_category_id'),
        ]);
        session()->flash('success', 'The brand has been created');
        return redirect()->route('sett.subCategory.index');
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
        $subCategory = SubCategory::with(['mainCategory' => function ($q) {
            $q->select('id', 'name_ar', 'name_en');
        }])->find($id);
        $mainCategorys = MainCategorys::all();
        return view('admin.categorys.subcategorys.edit', compact('subCategory', 'mainCategorys'));
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
        $subCategory = SubCategory::find($id);
        $subCategory->name_ar = $request->input('name_ar');
        $subCategory->name_en = $request->input('name_en');
        $subCategory->slug_ar =  $request->input('slug_ar');
        $subCategory->slug_en =  $request->input('slug_en');
        $subCategory->main_category_id =  $request->input('main_category_id');
        $subCategory->save();
        session()->flash('success', 'The brand has been updated');
        return redirect()->route('sett.subCategory.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id =  $request->input('subcategory_id');
        $subCategory = SubCategory::find($id);
        $subCategory->delete();
        session()->flash('success', 'The user has been deleted');
        return redirect()->route('sett.subCategory.index');
    }
}
