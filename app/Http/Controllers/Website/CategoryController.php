<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Categorys\MainCategorys;
use App\Models\Admin\Categorys\SubCategory;

use App\Models\Admin\products\Product;
use App\Models\Admin\Categorys\SubSubCategory;
use App\Models\Admin\Brand;

class CategoryController extends Controller
{

    public function main_category($slug)
    {
         $main_categorys= MainCategorys::where('slug_en',$slug)->with(['subCategory' => function ($q) {
            $q->select('id', 'name_ar','main_category_id');
        }])->with(['product' => function ($q) {
            $q->select('id', 'name_ar','slug_en','cover_image','main_categorys_id')->where('inactive',0)->paginate(1);
        }])->first();

        $products = Product::select('id','slug_en','name_ar','cover_image','main_categorys_id')->with(['main_category' => function ($q) {
            $q->select('id', 'name_ar');
         }])->paginate(20);
        $brands = Brand::all();
        return view('website.categories.main_category',compact('main_categorys','brands','products'));
    }



    public function sub_category($slug)
    {
          $sub_categorys = SubCategory::where('slug_en',$slug)->with(['subsubCategory' => function ($q) {
            $q->select('id', 'name_ar','sub_category_id');
        }])->with(['product' => function ($q) {
            $q->select('id', 'name_ar','slug_en','cover_image','sub_categories_id','main_categorys_id')->where('inactive',0);
        }])->first();
        $products = Product::select('id','slug_en','name_ar','cover_image','main_categorys_id')->with(['main_category' => function ($q) {
            $q->select('id', 'name_ar');
         }])->paginate(20);
        $brands = Brand::all();
        return view('website.categories.sub_category',compact('sub_categorys','brands','products'));
    }
    public function sub_sub_category($slug)
    {
            $sub_sub_category = SubSubCategory::select('id','name_ar')->where('slug_en',$slug)
            ->with(['product' => function ($q) {
                $q->select('id', 'name_ar','slug_en','cover_image','sub_categories_id','main_categorys_id','sub_sub_category_id')->where('inactive',0);
            }])->first();
            $products = Product::select('id','slug_en','name_ar','cover_image','main_categorys_id')->with(['main_category' => function ($q) {
                $q->select('id', 'name_ar');
             }])->paginate(20);
            $brands = Brand::all();
        return view('website.categories.sub_sub_category',compact('sub_sub_category','brands','products'));
    }
    public function other_category()
    {
        $main_category =  MainCategorys::select('name_ar','slug_en')->get();
        return view('website.categories.other_category',compact('main_category'));
    }
    public function brands($slug)
    {
           $brands = Brand::select('id','name_ar','logo')->where('slug_en',$slug)->with(['product' => function ($q) {
                $q->select('id', 'name_ar','name_en','slug_en','cover_image','sub_sub_category_id','brand_id');
            }])->first();
            $products = Product::select('id','slug_en','name_ar','cover_image','main_categorys_id')->with(['main_category' => function ($q) {
                $q->select('id', 'name_ar');
             }])->paginate(20);

        return view('website.product.brand',compact('brands','products'));
    }



}
