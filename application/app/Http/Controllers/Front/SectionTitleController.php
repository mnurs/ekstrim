<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Models\Front\SectionTitle;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Mews\Purifier\Facades\Purifier;

class SectionTitleController extends Controller
{
    public function store(Request $request, $name)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        if(SectionTitle::where('name', $name)->first()) {
            $sectionTitle = SectionTitle::where('name', $name)->first();
        } else {
            $sectionTitle = new SectionTitle();
            $sectionTitle->name = Purifier::clean($request->name);
        }

        $sectionTitle->title = Purifier::clean($request->title);
        $sectionTitle->description = Purifier::clean($request->description);

        $sectionTitle->save();

        session()->flash('success', __('Successfully added'));

        Toastr::success('success', __('Successfully added'), ["positionClass" => "toast-top-right"]);

        return redirect()->back();

    }


    public function gallery()
    {
        return view('front.sections.section_title.gallery');
    }

    public function doctor()
    {
        return view('front.sections.section_title.doctor');
    }
}
