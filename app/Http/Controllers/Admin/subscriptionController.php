<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Subscription;
use App\Models\Admin\products\SubPrices;
use Illuminate\Support\Facades\File;

class subscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $Subuscription = Subscription::all();
        return view('admin/subscription/index', compact('Subuscription'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $price = SubPrices::all();
        return view('admin/subscription/create', compact('price'));
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
                'slug_ar' => 'required|max:50',
                'slug_en' => 'required|max:50',
                'img' => 'image|mimes:jpeg,jpg,png|max:700',
                'description_ar' => 'required',
                'description_en' => 'required',
                'limited_cost' => 'required',
                'amount_money' => 'required',
            ]
        );
        // dd($request->all());
        //insert img

        $file_extension = request()->img->getClientOriginalExtension();
        $file_name = $request->input('name_en') . time() . '.' . $file_extension;
        $path = 'img/subscription';
        $request->img->move($path, $file_name);

        $Subscription = Subscription::create([
            'img' => $file_name,
            'name_ar' => $request->input('name_ar'),
            'name_en' => $request->input('name_en'),
            'slug_ar' => $request->input('slug_ar'),
            'slug_en' => $request->input('slug_en'),
            'description_ar' => $request->input('description_ar'),
            'description_en' => $request->input('description_en'),
            'limited_cost' => $request->input('limited_cost'),
            'amount_money' => $request->input('amount_money'),
        ]);


        session()->flash('success', 'The subscription has been created');
        return redirect()->route('sett.subscription.index');
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
        $subscription = Subscription::find($id);
        return view('admin/subscription/edit', compact('subscription'));
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
        // dd($request->all());

        $subscription = Subscription::find($id);
        $subscription->name_ar = $request->input('name_ar');
        $subscription->name_en = $request->input('name_en');
        $subscription->slug_ar = $request->input('slug_ar');
        $subscription->slug_en = $request->input('slug_en');
        $subscription->description_ar = $request->input('description_ar');
        $subscription->description_en = $request->input('description_en');
        $subscription->limited_cost = $request->input('limited_cost');
        $subscription->amount_money = $request->input('amount_money');


        //insert img
        if ($request->hasFile('img')) {

            if ($subscription->img) {
                //to remove the old avatar and also keep the default img
                $imagePath = public_path('img/subscription/' . $subscription->img);
                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }
            }

            $file_extension = request()->img->getClientOriginalExtension();
            $file_name = $request->input('name_en') . time() . '.' . $file_extension;
            $path = 'img/subscription';
            $request->img->move($path, $file_name);
            $subscription->img = $file_name; //new img file name
        } else {
            $file_name = request()->img;
        }
        $subscription->save();
        session()->flash('success', 'The subscription has been updated');
        return redirect()->route('sett.subscription.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id =  $request->input('subuscription_id');
        $Subscription = Subscription::find($id);
        $Subscription->delete();
        session()->flash('success', 'The subscription has been deleted');
        return redirect()->route('sett.subscription.index');
    }

}
