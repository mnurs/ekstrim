<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Faq;
use Illuminate\Http\Request;
use App\DataTables\FaqDatatable;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Mews\Purifier\Facades\Purifier;

class FaqController extends Controller
{
    public function index(FaqDatatable $dataTable)
    {
        return $dataTable->render('front.faq.index');
    }
    
    public function create(Request $request)
    {
        return view('front.faq.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required',
            'answer' => 'required',
            'type' => 'required',
        ]);

        $faq = new Faq();
        $faq->question = Purifier::clean($request->question);
        $faq->answer = Purifier::clean($request->answer);
        $faq->type = Purifier::clean($request->type);

        $faq->save();

        session()->flash('success', __('Successfully stored'));
        Toastr::success('success', __('Successfully stored'), ["positionClass" => "toast-top-right"]);

        return redirect()->route('faq.index');

    }

    public function edit($id)
    {
        $faq = Faq::where('id', $id)->firstOrFail();
        return view('front.faq.edit', compact('faq'));
    }

    public function update(Request $request, $id)
    {
        $faq = Faq::where('id', $id)->firstOrFail();

        $request->validate([
            'question' => 'required',
            'answer' => 'required',
            'type' => 'required',
        ]);

        $faq->question = Purifier::clean($request->question);
        $faq->answer = Purifier::clean($request->answer);
        $faq->type = Purifier::clean($request->type);

        $faq->save();

        session()->flash('success', __('Successfully updated'));
        Toastr::success('success', __('Successfully updated'), ["positionClass" => "toast-top-right"]);

        return redirect()->route('faq.index');
    }

    public function delete($id)
    {
        $faq = Faq::where('id', $id)->firstOrFail();
        $faq->delete();

        session()->flash('success', __('Successfully deleted'));
        Toastr::success('success', __('Successfully deleted'), ["positionClass" => "toast-top-right"]);

        return redirect()->route('faq.index');
    }

}
