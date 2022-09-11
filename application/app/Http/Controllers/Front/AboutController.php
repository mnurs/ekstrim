<?php

namespace App\Http\Controllers\Front;

use App\Models\Front\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\File;
use Mews\Purifier\Facades\Purifier;

class AboutController extends Controller
{
    public function index()
    {
        if(About::first()) {
            $about = About::first();
            return view('front.sections.about.index', compact('about'));
        } else {
            return view('front.sections.about.index');
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required',
            'title' => 'required',
            'description' => 'required',
            'icon_one' => 'required',
            'icon_one_title' => 'required',
            'icon_one_description' => 'required',
            'icon_two' => 'required',
            'icon_two_title' => 'required',
            'icon_two_description' => 'required',
            'icon_three' => 'required',
            'icon_three_title' => 'required',
            'icon_three_description' => 'required',
        ]);

        $about = new About();

        $about->title = Purifier::clean($request->title);
        $about->description = Purifier::clean($request->description);
        $about->icon_one = $request->icon_one;
        $about->icon_one_title = Purifier::clean($request->icon_one_title);
        $about->icon_one_description = Purifier::clean($request->icon_one_description);
        $about->icon_two = $request->icon_two;
        $about->icon_two_title = Purifier::clean($request->icon_two_title);
        $about->icon_two_description = Purifier::clean($request->icon_two_description);
        $about->icon_three = $request->icon_three;
        $about->icon_three_title = Purifier::clean($request->icon_three_title);
        $about->icon_three_description = Purifier::clean($request->icon_three_description);

        if (!empty($request->image)) {
            $about->image = fileUpload($request['image'], path_about_image()); // upload file
         }

        $about->save();

        session()->flash('success', __('Successfully created'));

        Toastr::success('success', __('Successfully created'), ["positionClass" => "toast-top-right"]);

        return redirect()->route('about.index');

    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'icon_one' => 'required',
            'icon_one_title' => 'required',
            'icon_one_description' => 'required',
            'icon_two' => 'required',
            'icon_two_title' => 'required',
            'icon_two_description' => 'required',
            'icon_three' => 'required',
            'icon_three_title' => 'required',
            'icon_three_description' => 'required',
        ]);

        $about = About::where('id', $id)->firstOrFail();
        $about->title = Purifier::clean($request->title);
        $about->description = Purifier::clean($request->description);
        $about->icon_one = $request->icon_one;
        $about->icon_one_title = Purifier::clean($request->icon_one_title);
        $about->icon_one_description = Purifier::clean($request->icon_one_description);
        $about->icon_two = $request->icon_two;
        $about->icon_two_title = Purifier::clean($request->icon_two_title);
        $about->icon_two_description = Purifier::clean($request->icon_two_description);
        $about->icon_three = $request->icon_three;
        $about->icon_three_title = Purifier::clean($request->icon_three_title);
        $about->icon_three_description = $request->icon_three_description;


        if (!empty($request->image)) {
            $old_img = '';
            $file = About::where('id', $about->id)->first();
            $old_img = isset($file) ? $file->image : '';

            $about->image = fileUpload($request['image'], path_about_image(), $old_img); // upload file
        }

        $about->save();

        session()->flash('success', __('Successfully updated'));

        Toastr::success('success', __('Successfully updated'), ["positionClass" => "toast-top-right"]);

        return redirect()->route('about.index');
    }
}
