<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Address;
class AddressController extends Controller
{
    public function index(){
      $create_address = Address::select(['id','favorite_address', 'name_street', 'address_details', 'building_number', 'phone','apartment_number'])->get();

      return view('admin.address.index', compact('create_address'));
    }

    public function create(){
      return view('admin.address.create');
    }

    public function store(Request $request){

      // Validate the form data
      $this->validate($request, [
          'favorite_address' => 'required',
          'name_street' => 'required',
          'address_details' => 'required',
          'building_number' => 'required',
          'phone' => 'required|numeric',
          'apartment_number' => 'required',

          // 'g-recaptcha-response' => ['required', new Recaptcha()],
      ]);
      $address = Address::create([
          // 'fov_Addres' => $file_name,
          'favorite_address' => $request->input('favorite_address'),
          'name_street' => $request->input('name_street'),
          'address_details' => $request->input('address_details'),
          'building_number' => $request->input('building_number'),
          'phone' => $request->input('phone'),
          'apartment_number' => $request->input('apartment_number'),
      ]);


      session()->flash('success', 'The user has been created');
        return redirect()->route('sett.admin.address.index');

    }

    public function edit($id){
        $address = Address::find($id);
        return view('admin.address.edit',compact('address'));
    }

    public function update(Request $request ,$id)
    {
        $address = Address::find($id);

        $this->validate($request, [
            'favorite_address' => 'required',
            'name_street' => 'required',
            'address_details' => 'required',
            'building_number' => 'required',
            'phone' => 'required|numeric',
            'apartment_number' => 'required',
        ]);

        $address->favorite_address = $request->input('favorite_address');
        $address->name_street = $request->input('name_street');
        $address->address_details = $request->input('address_details');
        $address->building_number = $request->input('building_number');
        $address->phone = $request->input('phone');
        $address->apartment_number = $request->input('apartment_number');

        $address->save();
        session()->flash('success', 'The user has been updated');
        return redirect()->route('sett.admin.address.index');
    }

    public function destroy(Request $request)
    {
        $id =  $request->input('role_id');
        $address = Address::find($id);
        $address->delete();
        session()->flash('success', 'The user has been deleted');
        return redirect()->route('sett.admin.address.index');
    }



}
