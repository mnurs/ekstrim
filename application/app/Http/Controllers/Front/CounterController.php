<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Models\Front\Counter;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\File;
use Mews\Purifier\Facades\Purifier;

class CounterController extends Controller
{
    public function index()
    {
        if(Counter::first()) {
            $counter = Counter::first();
            return view('front.sections.counter.index', compact('counter'));
        } else {
            return view('front.sections.counter.index');
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'background_image' => 'required',
            'image' => 'required',
            'video' => 'required',
            'counter_one_icon' => 'required',
            'counter_one_count' => 'required|integer',
            'counter_one_title' => 'required',
            'counter_two_icon' => 'required',
            'counter_two_count' => 'required|integer',
            'counter_two_title' => 'required',
            'counter_three_icon' => 'required',
            'counter_three_count' => 'required|integer',
            'counter_three_title' => 'required',
            'counter_four_icon' => 'required',
            'counter_four_count' => 'required|integer',
            'counter_four_title' => 'required',
        ]);

        $counter = new Counter();

        $counter->video = Purifier::clean($request->video);
        $counter->counter_one_icon = $request->counter_one_icon;
        $counter->counter_one_count = Purifier::clean($request->counter_one_count);
        $counter->counter_one_title = Purifier::clean($request->counter_one_title);
        $counter->counter_two_icon = $request->counter_two_icon;
        $counter->counter_two_count = Purifier::clean($request->counter_two_count);
        $counter->counter_two_title = Purifier::clean($request->counter_two_title);
        $counter->counter_three_icon = $request->counter_three_icon;
        $counter->counter_three_count = Purifier::clean($request->counter_three_count);
        $counter->counter_three_title = Purifier::clean($request->counter_three_title);
        $counter->counter_four_icon = $request->counter_four_icon;
        $counter->counter_four_count = Purifier::clean($request->counter_four_count);
        $counter->counter_four_title = Purifier::clean($request->counter_four_title);

        if (!empty($request->background_image)) {
            $counter->image = fileUpload($request['background_image'], path_counter_image()); // upload file
         }
        if (!empty($request->image)) {
            $counter->image = fileUpload($request['image'], path_counter_image()); // upload file
         }

        $counter->save();
        session()->flash('success', __('Successfully created'));
        Toastr::success('success', __('Successfully created'), ["positionClass" => "toast-top-right"]);
        return redirect()->route('counter.index');
    }


    public function update(Request $request, $id)
    {

      $counter = Counter::where('id', $id)->firstOrFail();
        $request->validate([
            'video' => 'required',
            'counter_one_icon' => 'required',
            'counter_one_count' => 'required|integer',
            'counter_one_title' => 'required',
            'counter_two_icon' => 'required',
            'counter_two_count' => 'required|integer',
            'counter_two_title' => 'required',
            'counter_three_icon' => 'required',
            'counter_three_count' => 'required|integer',
            'counter_three_title' => 'required',
            'counter_four_icon' => 'required',
            'counter_four_count' => 'required|integer',
            'counter_four_title' => 'required',
        ]);

        $counter->video = Purifier::clean($request->video);
        $counter->counter_one_icon = $request->counter_one_icon;
        $counter->counter_one_count = Purifier::clean($request->counter_one_count);
        $counter->counter_one_title = Purifier::clean($request->counter_one_title);
        $counter->counter_two_icon = $request->counter_two_icon;
        $counter->counter_two_count = Purifier::clean($request->counter_two_count);
        $counter->counter_two_title = Purifier::clean($request->counter_two_title);
        $counter->counter_three_icon = $request->counter_three_icon;
        $counter->counter_three_count = Purifier::clean($request->counter_three_count);
        $counter->counter_three_title = Purifier::clean($request->counter_three_title);
        $counter->counter_four_icon = $request->counter_four_icon;
        $counter->counter_four_count = Purifier::clean($request->counter_four_count);
        $counter->counter_four_title = Purifier::clean($request->counter_four_title);


        if (!empty($request->background_image)) {
            $old_img = '';
            $file = Counter::where('id', $id)->first();
            $old_img = isset($file) ? $file->image : '';

            $counter->background_image = fileUpload($request['background_image'], path_counter_image(), $old_img); // upload file
        }

        if (!empty($request->image)) {
            $old_img = '';
            $file = Counter::where('id', $id)->first();
            $old_img = isset($file) ? $file->image : '';

            $counter->image = fileUpload($request['image'], path_counter_image(), $old_img); // upload file
        }

        $counter->save();

        session()->flash('success', __('Successfully updated'));

        Toastr::success('success', __('Successfully updated'), ["positionClass" => "toast-top-right"]);

        return redirect()->route('counter.index');
    }
}
