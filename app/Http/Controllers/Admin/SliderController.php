<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    //
    public function index()
    {
        $sliders = Slider::all();
        return view('admin/slider/index', compact('sliders'));
    }

    public function edit($id)
    {
        $sliders = Slider::find($id);
        return view('admin/slider/edit', compact('sliders'));
    }

    public function update(Request $request, $id)
    {
        $slider = Slider::find($id);
        $slider->url = $request->input('url');
        //insert img
        if ($request->hasFile('image')) {

            if ($slider->image) {
                //to remove the old avatar and also keep the default img
                $imagePath = public_path('img/slider/' . $slider->image);
                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }
            }

            $file_extension = request()->image->getClientOriginalExtension();
            $file_name = $request->input('first_name') . time() . '.' . $file_extension;
            $path = 'img/slider';
            $request->image->move($path, $file_name);

            $slider->image = $file_name; //new img file name
        } else {
            $file_name = request()->image;
        }
        $slider->save();

        session()->flash('success', 'The slider has been updated');
        return redirect()->route('sett.slider.index');
    }
}
