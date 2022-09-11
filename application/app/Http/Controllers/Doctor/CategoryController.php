<?php

namespace App\Http\Controllers\Doctor;

use Illuminate\Http\Request;
use App\Models\DoctorCategory;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\DataTables\DoctorCategoryDatatable;
use App\Http\Requests\DoctorCategoryRequest;
use App\Http\Requests\DoctorCategoryUpdateRequest;
use Mews\Purifier\Facades\Purifier;

class CategoryController extends Controller
{
    public function index(DoctorCategoryDatatable $dataTable)
    {
        $category = DoctorCategory::all();
        return $dataTable->render('admin.doctorcategory.index', compact('category'));
    }

    public function create()
    {
        return view('admin.doctorcategory.create');
    }

    public function store(DoctorCategoryRequest $request)
    {
        DoctorCategory::create(Purifier::clean($request->all()));

        session()->flash('success', __('Successfully created'));

        Toastr::success('success', __('Successfully created'), ["positionClass" => "toast-top-right"]);
        return back();
    }

    public function show(DoctorCategory $category)
    {
        return view('admin.doctorcategory.create', compact('category'));
    }


    public function update(DoctorCategoryUpdateRequest $request, DoctorCategory $category)
    {
        $category->update(Purifier::clean($request->all()));

        session()->flash('success', __('Successfully updated'));

        Toastr::success('success', __('Successfully updated'), ["positionClass" => "toast-top-right"]);
        return back();
    }

    public function delete($id)
    {
        $category = DoctorCategory::where('id', $id)->firstOrFail();
        $category->delete();
        session()->flash('success', __('Successfully updated'));
        Toastr::success('success', __('Successfully updated'), ["positionClass" => "toast-top-right"]);

        return redirect()->back();
    }
}
