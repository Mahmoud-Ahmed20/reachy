<?php

namespace App\Http\Controllers\Admin\products;

use App\Http\Controllers\Admin\subscriptionController;
use App\Http\Controllers\Controller;
use App\Models\Admin\products\product;
use App\Models\Admin\Categorys\MainCategorys;
use App\Models\Admin\Categorys\SubCategory;
use App\Models\Admin\Categorys\SubSubCategory;
use App\Models\Admin\Brand;
use App\Models\Admin\products\SubPrices;
use App\Models\Admin\products\ImagesProduct;
use App\Http\Requests\ProdutRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Admin\Subscription;
use App\Models\location\Country;



class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = product::all();
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Brands = Brand::all();
        $mainCategorys = MainCategorys::all();
        $subscription = Subscription::all();
        $countrys = Country::all();
        return view('admin.product.create', compact('Brands', 'mainCategorys','subscription','countrys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProdutRequest $request)
    {
        // dd($request->all());
        // the valdiation is in (app/requests/ProdutRequest)
        //insert img cover prodect
        // dd($request->all());
        $file_extension = request()->cover_image->getClientOriginalExtension();
        $file_name = $request->input('name_en') . time() . '.' . $file_extension;
        $path = 'img/products';
        $request->cover_image->move($path, $file_name);

        // insert table products
        $product = Product::create([
            'cover_image' => $file_name,
            'name_ar' => $request->input('name_ar'),
            'name_en' => $request->input('name_en'),
            'slug_ar' => $request->input('slug_ar'),
            'slug_en' => $request->input('slug_en'),
            'description_ar' => $request->input('description_ar'),
            'description_en' => $request->input('description_en'),
            'code' => "IN" . $this->generateRandomString(6),
            'sku' => $request->input('sku'),
            'orginal_price' => $request->input('orginal_price'),
            'tax' => $request->input('tax'),
            'admin_id' => Auth::user()->id,
            'main_categorys_id' => $request->input('main_categorys_id'),
            'sub_categories_id' => $request->input('sub_categories_id'),
            'sub_sub_category_id' => $request->input('sub_sub_category_id'),
            'brand_id' => $request->input('brand_id'),
            'today_offer' => $request->input('today_offer', 0),
            'supermarket_offer' => $request->input('supermarket_offer', 0),
            'baby_Offers' => $request->input('baby_Offers',0),
            'Health_beauty_offers' => $request->input('Health_beauty_offers', 0),
            'short_description_en' => $request->input('short_description_en'),
            'short_description_ar' => $request->input('short_description_ar'),
            'country_id' => $request->input('country_id'),
        ]);

        // insert in table sup prices
        foreach ($request->input('sub_id') as $key => $value) {
            SubPrices::create([
                'price' => $request->input('price')[$key],
                'subscription_id' => $request->input('sub_id')[$key],
                'product_id' => $product->id,
            ]);
        }
        $code = "IM" . $this->generateRandomString(6);
        if ($request->hasFile('all_imgs')) {
            $images = $request->file('all_imgs');
            foreach ($images as $key => $image) {
                $imageName = time() . $code . $key . '.' . $image->getClientOriginalExtension();
                $request['product_id'] = $product->id;
                $request['name_img'] = $imageName;
                $image->move(public_path('img/products'), $imageName);
                ImagesProduct::create($request->all());
            }
        }

        session()->flash('success', 'The brand has been created');
        return redirect()->route('sett.product.index');
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
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Product::with(['main_category' => function ($q) {
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
            }])->with(['country' => function ($q) {
                $q->select('id', 'name_ar');
            }])
            ->find($id);
        // return $item;
        return view('admin.product.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
            ->with(['country' => function ($q) {
                $q->select('id', 'name_ar');
            }])
            ->find($id);

        $subscription = SubPrices::with(['subscription' => function ($q) {
            $q->select('id', 'name_en');
        }])->where('product_id', $id)->get();
        $mainCategorys = MainCategorys::all();
        $countrys = Country::all();
        $Brands = Brand::all();
        return view('admin.product.edit', compact('product', 'mainCategorys','Brands','countrys'));
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
        $Product = Product::find($id);
        $Product->name_ar = $request->input('name_ar');
        $Product->name_en = $request->input('name_en');
        $Product->slug_ar = $request->input('slug_ar');
        $Product->slug_en = $request->input('slug_en');
        $Product->inactive = $request->input('inactive');
        $Product->description_ar = $request->input('description_ar');
        $Product->description_en = $request->input('description_en');
        $Product->tax = $request->input('tax');
        $Product->sku = $request->input('sku');
        $Product->main_categorys_id = $request->input('main_categorys_id');
        $Product->sub_categories_id = $request->input('sub_categories_id');
        $Product->sub_sub_category_id = $request->input('sub_sub_category_id');
        $Product->brand_id = $request->input('brand_id');
        $Product->today_offer = $request->input('today_offer', 0);
        $Product->supermarket_offer = $request->input('supermarket_offer', 0);
        $Product->baby_Offers = $request->input('baby_Offers', 0);
        $Product->Health_beauty_offers = $request->input('Health_beauty_offers', 0);
        $Product->country_id = $request->input('country_id');
        $Product->short_description_ar = $request->input('short_description_ar');
        $Product->short_description_en = $request->input('short_description_en');


        foreach ($request->input('sub_id') as $key => $value) {
            $sup_id = $request->input('sub_id')[$key];
            $sup  = SubPrices::find($sup_id);
            $sup->price = $request->input('price')[$key];
            $sup->save();
        }
        //insert img
        if ($request->hasFile('cover_image')) {
            if ($Product->cover_image) {
                //to remove the old avatar and also keep the default img
                $imagePath = public_path('img/products' . $Product->cover_image);
                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }
            }
            $file_extension = request()->cover_image->getClientOriginalExtension();
            $file_name = $request->input('name_en') . time() . '.' . $file_extension;
            $path = 'img/products';
            $request->cover_image->move($path, $file_name);
            $Product->cover_image = $file_name; //new img file name
        } else {
            $file_name = request()->cover_image;
        }



        $Product->save();
        // insert img in update
        $code = "IM" . $this->generateRandomString(6);
        if ($request->hasFile('all_imgs')) {
            $images = $request->file('all_imgs');
            foreach ($images as $key => $image) {
                $imageName = time() . $code . $key . '.' . $image->getClientOriginalExtension();
                $request['product_id'] = $Product->id;
                $request['name_img'] = $imageName;
                $image->move(public_path('img/products'), $imageName);
                ImagesProduct::create($request->all());
            }
        }
        session()->flash('success', 'The brand has been updated');
        return redirect()->route('sett.product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id =  $request->input('product_id');
        $Product = Product::find($id);
        $Product->delete();
        session()->flash('success', 'The user has been deleted');
        return redirect()->route('sett.product.index');
    }
    public function deleteImage($id)
    {
        $img = ImagesProduct::find($id);
        $imagePath = public_path('img/products' . $img->name_img);
        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }
        $img->delete();
        session()->flash('success', 'The image has been deleted ');
        return back();
    }
    public function sub_catgory_ajax($id)
    {
        return SubCategory::where('main_category_id', $id)->get();
    }
    public function sub_sub_catgory_ajax($id)
    {
        return SubSubCategory::where('sub_category_id', $id)->get();

    }
    public function search()
    {
        return view('admin.product.search');
    }
    public function search_query($search_query)
    {
        $product = Product::select('id','name_ar', 'name_en','code')
        ->where(function ($query) use ($search_query) {
            $query->where('name_ar', 'like', "%{$search_query}%")
            ->Orwhere('name_en', 'like', "%{$search_query}%")
            ->Orwhere('code', 'like', "%{$search_query}%");
        })
        ->limit(10)
        ->get();
        return $product;
    }
}
