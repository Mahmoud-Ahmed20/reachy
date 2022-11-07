<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\UsersRequest;
use App\Models\location\City;
use App\Models\location\Country;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class UsersController extends Controller
{

    public function index()
    {
        //$users = User::select('id', 'name', 'email')->get();

        $users = User::select(['id', 'first_name', 'second_name', 'avatar', 'birthday', 'deactivate'])->with(['country' => function ($q) {
            $q->select('id', 'name_en');
        }])->get();

        return view('admin.index', compact('users'));
    }

    public function create()
    {
        $countries = Country::orderByRaw('RAND()')->get();
        $city = City::orderByRaw('RAND()')->get();
        $roles = Role::all();

        return view('admin.create', compact('countries', 'city', 'roles'));
    }

    //for select input ajax to send the cities beasd on the given country
    public function createcityajax($id)
    {
        return City::where('country_id', $id)->get();
    }

    public function store(UsersRequest $request)
    {
        // the valdiation is in (app/requests/UsersRequest)

        //insert img
        if ($request->hasFile('avatar')) {
            $file_extension = request()->avatar->getClientOriginalExtension();
            $file_name = $request->input('first_name') . time() . '.' . $file_extension;
            $path = 'img/useravatar';
            $request->avatar->move($path, $file_name);
        } else {
            $file_name = 'default-pp.png';
        }

        $user = User::create([
            'avatar' => $file_name,
            'first_name' => $request->input('first_name'),
            'second_name' => $request->input('second_name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'gendar' => $request->input('gendar'),
            'birthday' => $request->input('birthday'),
            'country_id' => $request->input('country_id'),
            'city_id' => $request->input('city_id'),
            'phone_number' => $request->input('phone_number'),
            'sec_phone_number' => $request->input('sec_phone_number'),
            'deactivate' => $request->input('deactivate'),
            'note' => $request->input('note'),
        ]);

        //for inserting the role
        foreach ($request->input('role') as $item) {
            $user->assignRole($item);
        }

        session()->flash('success', 'The user has been created');
        return redirect()->route('sett.admin.index');
    }



    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $user = User::with(['country' => function ($q) {
            $q->select('id', 'name_en');
        }])
            ->with(['city' => function ($q) {
                $q->select('id', 'name_en');
            }])
            ->find($id);

        //return $user;
        $roles = Role::select('id', 'name')->get();
        $userRole = $user->roles->pluck('id')->all();
        $countries = Country::orderByRaw('RAND()')->get();

        return view('admin.edit', compact('user', 'roles', 'userRole', 'countries'));
    }


    public function edit_profile_user()
    {
        $user_id = Auth::id();
        $user = User::with(['country' => function ($q) {
            $q->select('id', 'name_en');
        }])
            ->with(['city' => function ($q) {
                $q->select('id', 'name_en');
            }])
            ->find($user_id);
        $countries = Country::orderByRaw('RAND()')->get();
        return view('admin.edit_profile', compact('user', 'countries'));
    }


    public function edit_profile_user_store(UsersRequest $request)
    {
        $user_id = Auth::id();
        $user = User::find($user_id);
        $user->first_name = $request->input('first_name');
        $user->second_name = $request->input('second_name');
        $user->gendar = $request->input('gendar');
        $user->birthday = $request->input('birthday');
        $user->country = $request->input('country');
        $user->city = $request->input('city');
        $user->phone_number = $request->input('phone_number');
        $user->sec_phone_number = $request->input('sec_phone_number');
        $user->note = $request->input('note');

        if (!empty($request->input('newpassword'))) {
            $user->password = bcrypt($request->input('newpassword'));
        }

        //insert img
        if ($request->hasFile('avatar')) {

            if ($user->avatar !== "default-pp.png") {
                //to remove the old avatar and also keep the default img
                $imagePath = public_path('img/useravatar/' . $user->avatar);
                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }
            }

            $file_extension = request()->avatar->getClientOriginalExtension();
            $file_name = $request->input('first_name') . time() . '.' . $file_extension;
            $path = 'img/useravatar';
            $request->avatar->move($path, $file_name);

            $user->avatar = $file_name; //new img file name
        } else {
            $file_name = request()->avatar;
        }

        $user->save();

        session()->flash('success', 'The user has been updated');
        return redirect()->back();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(UsersRequest $request, $id)
    {
        $user = User::find($id);
        $user->first_name = $request->input('first_name');
        $user->second_name = $request->input('second_name');
        $user->email = $request->input('email');
        $user->gendar = $request->input('gendar');
        $user->birthday = $request->input('birthday');
        $user->country_id = $request->input('country_id');
        $user->city_id = $request->input('city_id');
        $user->phone_number = $request->input('phone_number');
        $user->sec_phone_number = $request->input('sec_phone_number');
        $user->deactivate = $request->input('deactivate');
        $user->note = $request->input('note');

        if (!empty($request->input('newpassword'))) {
            $user->password = bcrypt($request->input('newpassword'));
        }

        //insert img
        if ($request->hasFile('avatar')) {

            if ($user->avatar !== "default-pp.png") {
                //to remove the old avatar and also keep the default img
                $imagePath = public_path('img/useravatar/' . $user->avatar);
                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }
            }

            $file_extension = request()->avatar->getClientOriginalExtension();
            $file_name = $request->input('first_name') . time() . '.' . $file_extension;
            $path = 'img/useravatar';
            $request->avatar->move($path, $file_name);

            $user->avatar = $file_name; //new img file name
        } else {
            $file_name = request()->avatar;
        }

        $user->save();


        //for inserting the role
        $user->roles()->detach();
        foreach ($request->input('role') as $item) {
            $user->assignRole($item);
        }

        session()->flash('success', 'The user has been updated');
        return redirect()->route('sett.admin.index');
    }


    public function note_ajax(Request $request)
    {

        $id = Auth::id();

        $user = User::find($id);
        $user->note = $request->input('query');

        $user->save();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        User::find($request->user_id)->delete();

        session()->flash('success', 'The user has been deleted');
        return redirect()->route('sett.admin.index');
    }
    public function search_admin()
    {
        return view('admin.search');
    }
    public function search_query($search_query)
    {
         $User = User::select('id','first_name', 'second_name')
        ->where(function ($query) use ($search_query) {
            $query->where('first_name', 'like', "%{$search_query}%")
            ->Orwhere('second_name', 'like', "%{$search_query}%")
            ->Orwhere('phone_number', 'like', "%{$search_query}%");
        })
        ->limit(10)
        ->get();
        return $User;
    }
    //------------

}
