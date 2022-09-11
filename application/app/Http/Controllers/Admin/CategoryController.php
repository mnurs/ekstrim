<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\News;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Admin\Category;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\DataTables\CategoryDatatable;
use Mews\Purifier\Facades\Purifier;

class CategoryController extends Controller
{
    public function index(CategoryDatatable $dataTable)
    {
        return $dataTable->render('admin.category.index');
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $category = new Category();
        $category->name = Purifier::clean($request->name);
        $category->slug = Str::slug(Purifier::clean($request->name));
        $category->save();

        session()->flash('success', __('Successfully added'));
        Toastr::success('success', __('Successfully added'), ["positionClass" => "toast-top-right"]);

        return redirect()->route('category.index');
    }


    public function edit($id)
    {
        $category = Category::where('id', $id)->firstOrFail();
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::where('id', $id)->firstOrFail();

        $category->name = Purifier::clean($request->name);
        $category->slug = Str::slug(Purifier::clean($request->name));
        $category->save();

        session()->flash('success', __('Successfully updated'));
        Toastr::success('success', __('Successfully updated'), ["positionClass" => "toast-top-right"]);

        return redirect()->route('category.index');
    }


    public function delete($id)
    {
        $category = Category::where('id', $id)->firstOrFail();
        if(News::where('category_id', $id)->first()) {
            session()->flash('success', __('This category has news'));
            Toastr::warning('warning', __('This category has news'), ["positionClass" => "toast-top-right"]);
        } else {
            $category->delete();
            session()->flash('success', __('Successfully updated'));
            Toastr::success('success', __('Successfully updated'), ["positionClass" => "toast-top-right"]);
        }

        return redirect()->route('category.index');
    }
}
