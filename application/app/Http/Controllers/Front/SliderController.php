<?php

namespace App\Http\Controllers\Front;

use App\Models\Front\Slider;
use Illuminate\Http\Request;
use App\DataTables\SliderDatatable;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Mews\Purifier\Facades\Purifier;

class SliderController extends Controller
{
    public function index(SliderDatatable $dataTable)
    {
        return $dataTable->render('front.sections.slider.index');
    }

    public function create()
    {
        return view('front.sections.slider.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required',
            'icon' => 'required',
            'small_heading' => 'required',
            'big_heading' => 'required',
            'description' => 'required',
            'status' => 'required',
        ]);

        $slider = new Slider();
        $slider->icon = Purifier::clean($request->icon);
        $slider->small_heading = Purifier::clean($request->small_heading);
        $slider->big_heading = Purifier::clean($request->big_heading);
        $slider->description = Purifier::clean($request->description);
        $slider->status = Purifier::clean($request->status);

        if (!empty($request->image)) {
            $slider->image = fileUpload($request['image'], path_slider_image()); // upload file
         }

        $slider->user_id = Auth::user()->id;

        $slider->save();

        session()->flash('success', __('Successfully created'));

        Toastr::success('success', __('Successfully created'), ["positionClass" => "toast-top-right"]);

        return redirect()->route('slider.index');
    }

    public function edit($id)
    {
        $slider = Slider::where('id', $id)->firstOrFail();

        return view('front.sections.slider.edit', compact('slider'));
    }


    public function update(Request $request, $id)
    {
        $slider = Slider::where('id', $id)->firstOrFail();
        $request->validate([
            'icon' => 'required',
            'small_heading' => 'required',
            'big_heading' => 'required',
            'description' => 'required',
            'status' => 'required',
        ]);

        $slider->icon = Purifier::clean($request->icon);
        $slider->small_heading = Purifier::clean($request->small_heading);
        $slider->big_heading = Purifier::clean($request->big_heading);
        $slider->description = Purifier::clean($request->description);
        $slider->status = Purifier::clean($request->status);



        if (!empty($request->image)) {
            $old_img = '';
            $file = Slider::where('id', $id)->first();
            $old_img = isset($file) ? $file->image : '';

            $slider->image = fileUpload($request['image'], path_slider_image(), $old_img); // upload file
        }

        $slider->user_id = Auth::user()->id;

        $slider->save();

        session()->flash('success', __('Successfully updated'));

        Toastr::success('success', __('Successfully updated'), ["positionClass" => "toast-top-right"]);

        return redirect()->route('slider.index');

    }

    public function delete($id)
    {
        $slider = Slider::where('id', $id)->firstOrFail();
        $image_path = public_path(path_slider_image() . $slider->image);
                if (File::exists($image_path)) {
                    File::delete($image_path);
                }
        $slider->delete();
        session()->flash('success', __('Successfully deleted'));
        Toastr::success('success', __('Successfully deleted'), ["positionClass" => "toast-top-right"]);
        return redirect()->route('slider.index');
    }
}
