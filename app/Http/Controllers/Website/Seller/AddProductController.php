<?php

namespace App\Http\Controllers\Website\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\products\product;
use App\Models\Admin\Categorys\mainCategorys;
use App\Models\Admin\Categorys\subCategory;
use App\Models\Admin\Subscription;
use App\Models\Admin\Categorys\subSubCategory;
use App\Models\Admin\Brand;
use App\Models\Partners\Seller;
use App\Models\Admin\Seller_stock;
use App\Http\Requests\ProdutRequest;
use App\Models\Admin\products\ImagesProduct;
use App\Models\Admin\products\SubPrices;
use App\Models\Admin\Supply;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\Website\Order_item;

class AddProductController extends Controller
{
    //

    public function add_product()
    {
        // return view('website/seller/product/add_product');
        $Brands = Brand::all();
        $mainCategorys = mainCategorys::all();
        $subCategorys = subCategory::all();
        $subSubCategorys = subSubCategory::all();
        $subscription = Subscription::all();
        // return $subscription ;
        return view('website/seller/product/add_product', compact('subscription','Brands', 'mainCategorys', 'subCategorys', 'subSubCategorys'));

    }

    public function store_add_product(Request $request)
    {
        // the valdiation is in (app/requests/ProdutRequest)
        $this->validate($request, [
            'name_ar' => 'required|max:20',
            'name_en' => 'required|max:20',
            'slug_ar' => 'required|max:20',
            'slug_en' => 'required|max:20',
            'description_ar' => 'required',
            'description_en' => 'required',
            'orginal_price' => 'required',
            'cover_image' => 'required|image|mimes:jpeg,jpg,png|max:700',
            'main_categorys_id' => 'required|exists:main_categorys,id',
            'sub_categories_id' => 'required|exists:sub_categories,id',
            'sub_sub_category_id' => 'required|exists:sub_sub_categories,id',
            'brand_id' => 'required|exists:brands,id',
        ]);

        //insert img cover prodect
        if($request->hasFile('cover_image')){
            $file_extension = request()->cover_image->getClientOriginalExtension();
            $file_name = $request->input('name_en') . time() . '.' . $file_extension;
            $path = 'img/products';
            $request->cover_image->move($path, $file_name);
        }

        $seller_id = Auth::guard('seller')->user()->id;
        // insert table products
        $product = Product::create([
            'cover_image' => $file_name,
            'name_ar' => $request->input('name_ar'),
            'name_en' => $request->input('name_en'),
            'slug_ar' => $request->input('slug_ar'),
            'slug_en' => $request->input('slug_en'),
            'code' => "IN" . $this->generateRandomString(6),
            'description_ar' => $request->input('description_ar'),
            'description_en' => $request->input('description_en'),
            'orginal_price' => $request->input('orginal_price'),
            'main_categorys_id' => $request->input('main_categorys_id'),
            'sub_categories_id' => $request->input('sub_categories_id'),
            'sub_sub_category_id' => $request->input('sub_sub_category_id'),
            'brand_id' => $request->input('brand_id'),
            'inactive' => 1,
            'seller_id' => $seller_id,
        ]);

        // SubPrices::create([
        //     'price' => $request->input('price'),
        //     'subscription_id' => $request->input('subscription_id'),
        //     'product_id' => $product->id
        // ]);

        foreach ($request->input('sub_id') as $key => $value) {
            //  dd($request->input('sub_id')[$key]);
            SubPrices::create([
                'price' => $request->input('price')[$key],
                'subscription_id' => $request->input('sub_id')[$key],
                'product_id' => $product->id,

            ]);
        }
        session()->flash('success', 'The brand has been created');
         return redirect()->route('seller.mangement_approval');
    }
    public function generateRandomString($length = 20)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function search_product()
    {
        $search_product = Seller_stock::
        with(['product' => function ($q) {$q->select('id', 'name_en');}])
        ->get();

        // $search_product = product ::all();
        $mainCategory = mainCategorys::all();
        $subCategory = subCategory::all();
        $subSubCategory = subSubCategory::all();
        return view('website/seller/product/search_product', compact('search_product','mainCategory', 'subCategory', 'subSubCategory'));

    }

    public function show_all_request_product(){

        $all_product = product::select('id','inactive' , 'name_ar' , 'description_ar','orginal_price','cover_image')->where('inactive', 1)->where('seller_id', Auth::guard('seller')->user()->id)->get();

        return view('website/seller/product/all_request_product_approval' , compact('all_product'));
    }

    public function show_all_product(){

        $all_product = Seller_stock::select('id' , 'seller_id', 'product_id')->with(['product' => function ($q) {
            $q->select('id', 'name_ar' , 'description_ar','orginal_price','cover_image','slug_en');}])
       ->where('seller_id', Auth::guard('seller')->user()->id)->paginate(8);

        return view('website/seller/product/all_product' , compact('all_product'));
    }


    public function mangement_approval(){
        return view('website/seller/product/mangement_approval');
    }

    public function ShowProducts($id)
    {
        
         $supply = Supply::select('id','quantity' , 'seller_id', 'seller_stock_id','created_at')->where('seller_stock_id' , $id)->get();
         $seller_stock = Seller_stock::select('id','quantity' , 'seller_id', 'product_id')->with(['product' => function ($q) {
            $q->select('id', 'name_ar' , 'description_ar','orginal_price','cover_image','slug_en');}])
       ->where('seller_id', Auth::guard('seller')->user()->id)->find($id);

        // show order to this product
        $seller_id = Auth::guard('seller')->id();
         $orders = Order_item::select( 'created_at', 'final_price' ,'seller_stock_id','product_id','order_id')->where('seller_stock_id' , $id)
         
        ->with(['order' => function($q){
            $q->select('id' , 'final_price','created_at');}])
        ->with(['product' => function($q){
            $q->select('id' , 'name_ar');}])
        ->where('seller_id', $seller_id)->paginate(10);
        // return $orders[0]->product;
        return view('website.seller.product.show_product_seller', compact('seller_stock','supply','orders'));
    }

    public function search($search_query)
    {
        // $seller_id = Auth::guard('seller')->user()->id;
        $product = product::select('name_ar', 'slug_en', 'cover_image')
            ->where(function ($query) use ($search_query) {
                $query->where('name_ar', 'like', "%{$search_query}%")->where('inactive', 0);
            })
            ->limit(10)
            ->get();
        return $product;
        
    }
    public function resultSearch(Request $request)
    {
        $search_query = $request->input('search');
        $product = product::select('name_ar', 'slug_en', 'cover_image')
            ->where(function ($query) use ($search_query) {
                $query->where('name_ar', 'like', "%{$search_query}%")->where('inactive', 0);
            })
            ->limit(10)
            ->get();
        return view('website.product.resultsearch', compact('product', 'search_query'));
    }

    public function edit_prodct($id)
    {
        $product = Product::with(['main_category' => function ($q) {
            $q->select('id', 'name_en');
        }])
            ->with(['sub_category' => function ($q) {
                $q->select('id', 'name_en');
            }])
            ->with(['sub_sub_category' => function ($q) {
                $q->select('id', 'name_en');
            }])
            ->with(['brand' => function ($q) {
                $q->select('id', 'name_en');
            }])
            ->with(['sub_prices' => function ($q) {
                $q->select('id', 'price', 'product_id', 'subscription_id');
            }])
            ->with(['Productimg' => function ($q) {
                $q->select('id', 'name_img', 'product_id');
            }])
            ->find($id);

        $subscription = SubPrices::with(['subscription' => function ($q) {
            $q->select('id', 'name_en');
        }])->where('product_id', $id)->get();

        // return $product->main_category;
        // return $subscription;
        return view('website.seller.product.edit_product', compact('product','subscription'));
    }

    public function update_product(Request $request, $id)
    {
        $product = Product::find($id);
        // $seller_id = Auth::guard('seller')->user()->id;
        $product->name_ar = $request->input('name_ar');
        $product->name_en = $request->input('name_en');
        $product->slug_ar = $request->input('slug_ar');
        $product->slug_en = $request->input('slug_en');
        $product->description_ar = $request->input('description_ar');
        $product->description_en = $request->input('description_en');
        $product->orginal_price = $request->input('orginal_price');
        $product->main_categorys_id = $request->input('main_categorys_id');
        $product->sub_categories_id = $request->input('sub_categories_id');
        $product->sub_sub_category_id = $request->input('sub_sub_category_id');
        $product->brand_id = $request->input('brand_id');
        // $product-> $seller_id;
        // $product->inactive = $request->input('inactive' , 1);
        // $product->code = $request->input('code');
        // $product->tax = $request->input('tax');
        // $product->sku = $request->input('sku');
        // $product->today_offer = $request->input('today_offer', 0);
        // $product->supermarket_offer = $request->input('supermarket_offer', 0);
        // $product->discount = $request->input('discount', 0);


        foreach ($request->input('sub_id') as $key => $value) {
            $sup_id = $request->input('sub_id')[$key];
            $sup  = SubPrices::find($sup_id);
            $sup->price = $request->input('price')[$key];
            $sup->save();
        }
        //insert img
        if ($request->hasFile('cover_image')) {
            if ($product->cover_image) {
                //to remove the old avatar and also keep the default img
                $imagePath = public_path('img/products' . $product->cover_image);
                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }
            }
            $file_extension = request()->cover_image->getClientOriginalExtension();
            $file_name = $request->input('name_en') . time() . '.' . $file_extension;
            $path = 'img/products';
            $request->cover_image->move($path, $file_name);
            $product->cover_image = $file_name; //new img file name
        } else {
            $file_name = request()->cover_image;
        }



        $product->save();
        // insert img in update
        // $code = "IM" . $this->generateRandomString(6);
        // if ($request->hasFile('all_imgs')) {
        //     $images = $request->file('all_imgs');
        //     foreach ($images as $key => $image) {
        //         $imageName = time() . $code . $key . '.' . $image->getClientOriginalExtension();
        //         $request['product_id'] = $product->id;
        //         $request['name_img'] = $imageName;
        //         $image->move(public_path('img/products'), $imageName);
        //         ImagesProduct::create($request->all());
        //     }
        // }
        session()->flash('success', 'The brand has been updated');
        return redirect()->route('seller.mangement_approval');
    }

    public function destroy_request(Request $request)
    {
         $id =  $request->input('product_id');
        $seller = Product::find($id);
        $seller->delete();
        session()->flash('success', 'The user has been deleted');
        return redirect()->back();
    }



    

}
