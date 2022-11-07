<?php


namespace App\Http\Controllers\Website\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Seller_stock;
use App\Models\Partners\Seller;

use App\Models\Admin\products\Product;
use App\Models\Admin\Supply;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class StockController extends Controller
{
  public function index(){
    $stock = Seller_stock::select(['id','name', 'quantity', 'avatar_defuat', 'product_id', 'seller_id'])->get();

    return view('website.seller.seller_stock.index', compact('stock'));
  }

  // public function create(Request $request){

   

  //     $product = Seller_stock::select('id' , 'seller_id', 'product_id')->with(['product' => function ($q) {
  //         $q->select('id', 'name_ar' , 'description_ar','orginal_price','cover_image','slug_en');}])
  //    ->where('seller_id', Auth::guard('seller')->user()->id)->get(); 
  //   return view('website.seller.seller_stock.add_stock', compact('seller','product','search_query'));

  // }

  public function search (Request $request){
    $search_query = $request->input('search');
     $product = Seller_stock::select('id','quantity' , 'seller_id', 'product_id')->with(['product' => function ($q) {
      $q->select('id', 'name_ar' , 'description_ar','orginal_price','cover_image','slug_en');}])
      ->with(['seller' => function ($q) {
        $q->select('id');}])
    ->where('seller_id', Auth::guard('seller')->user()->id)->get();
   
    $product = product::select('id','name_ar', 'slug_en', 'orginal_price' ,'cover_image', 'seller_id')
        ->where(function ($query) use ($search_query) {
            $query->where('name_ar', 'like', "%{$search_query}%")->where('inactive', 0);
        })
        
        ->limit(10)
        ->get();
    return view('website.seller.seller_stock.add_stock', compact('product','search_query'));
  }

  public function store(Request $request){

    // Validate the form data
    $this->validate($request, [
        'quantity' => 'required',
    ]);

    $seller_id = Auth::guard('seller')->user()->id;
    $stock = Seller_stock::create([
        'quantity' => $request->input('quantity'),
        'product_id' => $request->input('product_id'),
        'seller_id' => $seller_id,
    ]);
    session()->flash('success', 'The user has been created');
      return redirect()->route('seller.show_all_product');
  }

  public function edit($id){
      $product = Seller_stock::
      with(['product' => function ($q) {$q->select('id','product_id', 'name_en','name_ar', 'slug_en');}])
      ->with(['seller' => function ($q) {$q->select('id','seller_id', 'first_name' ,'second_name');}])
      ->get($id);
      $seller = Seller::orderByRaw('RAND()')->get();
      // $stock = Seller_stock::orderByRaw('RAND()')->get();
      return view('website.seller.product.show_product_seller', compact('product'));
  }

  public function update(Request $request ,$id)
  {
      $stock = Seller_stock::find($id);
      $seller_id = Auth::guard('seller')->user()->id;
      //create new record in supply column
      
      $Supply = Supply::create([
        'quantity' => $request->input('quantity'),
        'seller_id' => $seller_id,
        'seller_stock_id' => $request->input('seller_stock_id'),
        'product_id' => $request->input('product_id'),

      ]);
      
      $stock->increment('quantity', $request->input('quantity'));
      
      $stock->save();

      session()->flash('success', 'The user has been updated');
      return redirect()->back();
  }

  public function destroy(Request $request)
  {
      $id =  $request->input('role_id');

      $seller = Seller_stock::find($id);
      $seller->delete();
      session()->flash('success', 'The user has been deleted');
      return redirect()->route('sett.stock.index');
  }


}
