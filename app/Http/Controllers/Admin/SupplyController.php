<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Supply;
use App\Models\Admin\Seller_stock;
use App\Models\Partners\Seller;
use App\Models\Admin\products\Product;

class SupplyController extends Controller
{
    public function index(){
        $supply = Supply::select(['id', 'quantity', 'seller_stock_id', 'product_id', 'seller_id'])->get();

        return view('admin.supply.index', compact('supply'));
    }

    public function create(){
        $seller = Seller::orderByRaw('RAND()')->get();
        $seller_stock = Seller_stock::orderByRaw('RAND()')->get();
        $product = Product::orderByRaw('RAND()')->get();


        return view('admin.supply.create', compact('seller','product','seller_stock'));
    }

    public function store(Request $request){

        // Validate the form data
        $this->validate($request, [
            'quantity' => 'required',
            'product_id' => 'required|numeric',
            'seller_id' => 'required|numeric',
            'seller_stock_id' => 'required|numeric',
            // 'g-recaptcha-response' => ['required', new Recaptcha()],
        ]);


        $stock = Supply::create([
            'quantity' => $request->input('quantity'),
            'product_id' => $request->input('product_id'),
            'seller_id' => $request->input('seller_id'),
            'seller_stock_id' => $request->input('seller_stock_id'),

        ]);

        session()->flash('success', 'The user has been created');
          return redirect()->route('sett.supply.index');

      }

      public function edit($id){

        $supply = Supply::
        with(['product' => function ($q) {$q->select('id', 'name_en');}])
        ->with(['seller' => function ($q) {$q->select('id', 'first_name' ,'second_name');}])
        ->with(['seller_stock' => function ($q) {$q->select('id', 'quantity'  );}])
        ->find($id);
        $seller = Seller::orderByRaw('RAND()')->get();
        $seller_stock = Seller_Stock::orderByRaw('RAND()')->get();
        $product = Product::orderByRaw('RAND()')->get();
        return view('admin.supply.edit', compact('supply','seller','product','seller_stock'));
    }

    public function update(Request $request ,$id)
  {
      $supply = Supply::find($id);

      $supply->quantity = $request->input('quantity');
      $supply->product_id = $request->input('product_id');
      $supply->seller_id = $request->input('seller_id');
      $supply->seller_stock_id = $request->input('seller_stock_id');

      //insert img


      $supply->save();

      session()->flash('success', 'The user has been updated');
      return redirect()->route('sett.supply.index');
  }

  public function destroy(Request $request)
  {
      $id =  $request->input('role_id');

      $seller = Supply::find($id);
      $seller->delete();
      session()->flash('success', 'The user has been deleted');
      return redirect()->route('sett.supply.index');
  }

}
