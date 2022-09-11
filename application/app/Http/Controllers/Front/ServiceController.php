<?php

namespace App\Http\Controllers\Front;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Front\Service;
use App\DataTables\ServiceDatatable;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;
use Mews\Purifier\Facades\Purifier;

class ServiceController extends Controller
{
    public function index(ServiceDatatable $dataTable)
    {
        return $dataTable->render('front.sections.service.index');
    }

    public function create()
    {
        return view('front.sections.service.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required',
            'icon' => 'required',
            'title' => 'required:unique:services',
            'description' => 'required',
            'details' => 'required',
            'status' => 'required',
        ]);

        $service = new Service();
        $service->user_id = Auth::user()->id;

        $service->title = Purifier::clean($request->title);
        $service->slug = Str::slug(Purifier::clean($request->title));
        $service->description = Purifier::clean($request->description);
        $service->details = Purifier::clean($request->details);
        $service->tags = Purifier::clean($request->tags);
        $service->status = Purifier::clean($request->status);

        if (!empty($request->image)) {
            $service->image = fileUpload($request['image'], path_service_image()); // upload file
         }

        if (!empty($request->icon)) {
            $service->icon = fileUpload($request['icon'], path_service_image()); // upload file
         }

        $service->save();

        session()->flash('success', __('Successfully created'));
        Toastr::success('success', __('Successfully created'), ["positionClass" => "toast-top-right"]);
        return redirect()->route('service.index');
    }

    public function edit($id)
    {
        $service = Service::where('id', $id)->firstOrFail();
        return view('front.sections.service.edit', compact('service'));
    }

    public function update(Request $request, $id)
    {
        $service = Service::where('id', $id)->firstOrFail();
        $request->validate([
            'title' => [
                'required',
                Rule::unique('services')->ignore($id),
            ],
            'description' => 'required',
            'details' => 'required',
            'status' => 'required',
        ]);

        $service->user_id = Auth::user()->id;
        $service->title = Purifier::clean($request->title);
        $service->slug = Str::slug(Purifier::clean($request->title));
        $service->description = Purifier::clean($request->description);
        $service->details = Purifier::clean($request->details);
        $service->tags = Purifier::clean($request->tags);
        $service->status = Purifier::clean($request->status);


        if (!empty($request->image)) {
            $old_img = '';
            $file = Service::where('id', $id)->first();
            $old_img = isset($file) ? $file->image : '';

            $service->image = fileUpload($request['image'], path_service_image(), $old_img); // upload file
        }

        if (!empty($request->icon)) {
            $old_img = '';
            $file = Service::where('id', $id)->first();
            $old_img = isset($file) ? $file->icon : '';

            $service->icon = fileUpload($request['icon'], path_service_image(), $old_img); // upload file
        }

        $service->save();

        session()->flash('success', __('Successfully updated'));
        Toastr::success('success', __('Successfully updated'), ["positionClass" => "toast-top-right"]);
        return redirect()->route('service.index');
    }

    public function delete($id)
    {
        $service = Service::where('id', $id)->firstOrFail();
        $image_path = public_path(path_service_image() . $service->image);
        if (File::exists($image_path)) {
            File::delete(public_path(path_service_image() . $service->image));
            File::delete(public_path(path_service_image() . $service->icon));
        }

        $service->delete();

        session()->flash('success', __('Successfully deleted'));
        Toastr::success('success', __('Successfully deleted'), ["positionClass" => "toast-top-right"]);
        return redirect()->route('service.index');
    }
}
