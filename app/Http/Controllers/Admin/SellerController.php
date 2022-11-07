<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Partners\Seller;
use App\Http\Requests\SellerRequest;
use Illuminate\Support\Facades\File;

class SellerController extends Controller
{
    public function index()
    {
        $seller = Seller::select(['id', 'email', 'password', 'phone', 'first_name', 'second_name', 'user', 'commercial_register', 'tax_register', 'inactive', 'avatar'])->get();
        return view('admin.seller.index', compact('seller'));
    }

    public function create()
    {
        return view('admin.seller.create');
    }

    public function store(SellerRequest $request)
    {

        // Validate the form data
        if ($request->hasFile('avatar')) {
            $file_extension = request()->avatar->getClientOriginalExtension();
            $file_name = $request->input('first_name') . time() . '.' . $file_extension;
            $path = 'img/useravatar';
            $request->avatar->move($path, $file_name);
        } else {
            $file_name = 'default-pp.png';
        }

        if ($request->hasFile('commercial_register')) {
            $file_extension = request()->commercial_register->getClientOriginalExtension();
            $file_name_commercial = $request->input('first_name') . time() . '.' . $file_extension;
            $path = 'img/useravatar';
            $request->commercial_register->move($path, $file_name_commercial);
        }

        if ($request->hasFile('tax_register')) {
            $file_extension = request()->tax_register->getClientOriginalExtension();
            $file_name_tax_register = $request->input('first_name') . time() . '.' . $file_extension;
            $path = 'img/useravatar';
            $request->tax_register->move($path, $file_name_commercial);
        }

        $seller = Seller::create([
            // 'fov_Addres' => $file_name,
            'avatar' => $file_name,
            'commercial_register' => $file_name_commercial,
            'tax_register' => $file_name_tax_register,
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'first_name' => $request->input('first_name'),
            'second_name' => $request->input('second_name'),
            'user' => $request->input('user'),
            'inactive' => $request->input('inactive'),
            'phone' => $request->input('phone'),
        ]);

        session()->flash('success', 'The user has been created');
        return redirect()->route('sett.admin.seller.index');
    }



    public function edit($id)
    {
        $seller = Seller::find($id);
        return view('admin.seller.edit', compact('seller'));
    }

    public function update(Request $request, $id)
    {

        // dd($request->all());
        $seller = Seller::find($id);

        $seller->first_name = $request->input('first_name');
        $seller->second_name = $request->input('second_name');
        $seller->email = $request->input('email');
        $seller->password = $request->input('password');
        $seller->phone = $request->input('phone');
        $seller->user = $request->input('user');
        $seller->inactive = $request->input('inactive');
        if (!empty($request->input('password'))) {
            $seller->password = bcrypt($request->input('password'));
        }

        //insert img
        if ($request->hasFile('avatar')) {

            if ($seller->avatar !== "default-pp.png") {
                //to remove the old avatar and also keep the default img
                $imagePath = public_path('img/useravatar/' . $seller->avatar);
                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }
            }

            $file_extension = request()->avatar->getClientOriginalExtension();
            $file_name = $request->input('first_name') . time() . '.' . $file_extension;
            $path = 'img/useravatar';
            $request->avatar->move($path, $file_name);

            $seller->avatar = $file_name; //new img file name
        } else {
            $file_name = request()->avatar;
        }

        //insert img
        if ($request->hasFile('tax_register')) {

            if ($seller->avatar !== "default-pp.png") {
                //to remove the old avatar and also keep the default img
                $imagePath = public_path('img/useravatar/' . $seller->tax_register);
                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }
            }

            $file_extension = request()->tax_register->getClientOriginalExtension();
            $file_name = $request->input('first_name') .'tax-register'. time() . '.' . $file_extension;
            $path = 'img/useravatar';
            $request->tax_register->move($path, $file_name);

            $seller->tax_register = $file_name; //new img file name
        } else {
            $file_name = request()->tax_register;
        }



        if ($request->hasFile('commercial_register')) {

            if ($seller->commercial_register !== "default-pp.png") {
                //to remove the old avatar and also keep the default img
                $imagePath = public_path('img/useravatar/' . $seller->commercial_register);
                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }
            }

            $file_extension = request()->commercial_register->getClientOriginalExtension();
            $file_name = $request->input('first_name') . 'commercial-register'.time() . '.' . $file_extension;
            $path = 'img/useravatar';
            $request->commercial_register->move($path, $file_name);

            $seller->commercial_register = $file_name; //new img file name
        } else {
            $file_name = request()->commercial_register;
        }

        $seller->save();


        //for inserting the role
        // $user->roles()->detach();
        // foreach($request->input('role') as $item){
        //     $user->assignRole($item);
        // }

        session()->flash('success', 'The user has been updated');
        return redirect()->route('sett.admin.seller.index');
    }

    public function destroy(Request $request)
    {
        $id =  $request->input('role_id');
        $seller = Seller::find($id);
        $seller->delete();
        session()->flash('success', 'The user has been deleted');
        return redirect()->route('sett.admin.seller.index');
    }
    public function show($id)
    {
        $seller =Seller::select(['id','email','first_name','second_name','user','commercial_register','tax_register','inactive','phone','avatar'])->find($id);
        return view('admin.seller.show',compact('seller'));
    }
    public function search()
    {
        return view('admin.seller.search');
    }
    public function search_query($search_query)
    {
        $seller = Seller::select('id','first_name', 'second_name','user')
        ->where(function ($query) use ($search_query) {
            $query->where('first_name', 'like', "%{$search_query}%")
            ->Orwhere('second_name', 'like', "%{$search_query}%")
            ->Orwhere('user', 'like', "%{$search_query}%");
        })
        ->limit(10)
        ->get();
        return $seller;
    }



}
