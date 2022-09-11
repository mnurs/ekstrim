<?php

namespace App\Http\Controllers\Front;

use App\Models\Front\Notice;
use Illuminate\Http\Request;
use App\DataTables\NoticeDatatable;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Mews\Purifier\Facades\Purifier;

class NoticeController extends Controller
{
    public function index(NoticeDatatable $dataTable)
    {
        return $dataTable->render('front.sections.notice.index');
    }

    public function create()
    {
        return view('front.sections.notice.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'icon' => 'required',
            'title' => 'required',
            'description' => 'required',
            'button_text' => 'required',
            'button_url' => 'required',
            'status' => 'required',
        ]);

        $notice = new Notice();
        $notice->icon = $request->icon;
        $notice->title = Purifier::clean($request->title);
        $notice->description = Purifier::clean($request->description);
        $notice->button_text = Purifier::clean($request->button_text);
        $notice->button_url = Purifier::clean($request->button_url);
        $notice->status = Purifier::clean($request->status);
        $notice->save();

        session()->flash('success', __('Successfully created'));

        Toastr::success('success', __('Successfully created'), ["positionClass" => "toast-top-right"]);

        return redirect()->route('notice.index');
    }

    public function edit($id)
    {
        $notice = Notice::where('id', $id)->firstOrFail();
        return view('front.sections.notice.edit', compact('notice'));
    }

    public function update(Request $request, $id)
    {
        $notice = Notice::where('id', $id)->firstOrFail();

        $request->validate([
            'icon' => 'required',
            'title' => 'required',
            'description' => 'required',
            'button_text' => 'required',
            'button_url' => 'required',
            'status' => 'required',
        ]);

        $notice->icon = $request->icon;
        $notice->title = Purifier::clean($request->title);
        $notice->description = Purifier::clean($request->description);
        $notice->button_text = Purifier::clean($request->button_text);
        $notice->button_url = Purifier::clean($request->button_url);
        $notice->status = Purifier::clean($request->status);
        $notice->save();

        session()->flash('success', __('Successfully updated'));

        Toastr::success('success', __('Successfully updated'), ["positionClass" => "toast-top-right"]);

        return redirect()->route('notice.index');
    }

    public function delete($id)
    {
        $notice = Notice::where('id', $id)->firstOrFail();
        $notice->delete();
        session()->flash('success', __('Successfully deleted'));

        Toastr::success('success', __('Successfully deleted'), ["positionClass" => "toast-top-right"]);

        return redirect()->route('notice.index');
    }
}
