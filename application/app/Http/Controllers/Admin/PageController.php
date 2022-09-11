<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Page;
use Illuminate\Http\Request;
use App\DataTables\PageDatatable;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Mews\Purifier\Facades\Purifier;

class PageController extends Controller
{
    public function index(PageDatatable $dataTable)
    {
        return $dataTable->render('admin.page.index');
    }

    public function edit($id)
    {
        $page = Page::where('id', $id)->firstOrFail();
        return view('admin.page.edit', compact('page'));
    }

    public function update(Request $request, $id)
    {
        $page = Page::where('id', $id)->firstOrFail();
        $request->validate([
            'title' => 'required|max:255',
        ]);

        $page->title = Purifier::clean($request->title);
        $page->tags = Purifier::clean($request->tags);
        $page->description = Purifier::clean($request->description);

        $page->save();

        session()->flash('success', __('Successfully updated'));
        Toastr::success('success', __('Successfully updated'), ["positionClass" => "toast-top-right"]);

        return redirect()->route('page.index');

    }
}
