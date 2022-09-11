<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Models\Models\Admin\Site;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\File;
use App\Http\Requests\SiteStoreRequest;
use Illuminate\Support\Facades\Session;
use Mews\Purifier\Facades\Purifier;

class SiteIdentityController extends Controller
{
    public function create()
    {
        $site = Site::first();
        return view('admin.site.create', compact('site'));
    }

    public function store(SiteStoreRequest $request)
    {

        $input = Purifier::clean($request->except('image1', 'image2', 'image3'));



        if ($request->has('image1')) {
            $name_path = explode("/", $request->image1);
            $name = time() . end($name_path);
            File::copy(public_path($request->image1), public_path(path_site_logo_image() . $name));
            $input['image1'] = $name;
        }

        if ($request->has('image2')) {
            $name_path = explode("/", $request->image2);
            $name = time() . end($name_path);
            File::copy(public_path($request->image2), public_path(path_site_favicon_image() . $name));
            $input['image2'] = $name;
        }

        if ($request->has('image3')) {
            $name_path = explode("/", $request->image3);
            $name = time() . end($name_path);
            File::copy(public_path($request->image3), public_path(path_site_favicon_image() . $name));
            $input['image3'] = $name;
        }

        Site::create($input);

        Session::flash('message', __('Successfully created'));

        Toastr::success('message', __('Successfully Created'));

        return redirect()->back()->with('success', __('Site created successfully'));
    }

    public function update(Request $request, $id)
    {

        $site = Site::FindOrFail($id);

        $input = Purifier::clean($request->except('image1', 'image2', 'image3'));

        if (!empty($request->image1)) {
            $old_img = '';
            $file = Site::where('id', $id)->first();
            $old_img = isset($file) ? $file->image1 : '';

            $input['image1'] = fileUpload($request['image1'], path_site_logo_image(), $old_img); // upload file
        }

        if (!empty($request->image2)) {
            $old_img = '';
            $file = Site::where('id', $id)->first();
            $old_img = isset($file) ? $file->image2 : '';

            $site->image2 = fileUpload($request['image2'], path_site_favicon_image(), $old_img); // upload file
        }

        if (!empty($request->image3)) {
            $old_img = '';
            $file = Site::where('id', $id)->first();
            $old_img = isset($file) ? $file->image3 : '';

            $site->image3 = fileUpload($request['image3'], path_site_while_logo_image(), $old_img); // upload file
        }





        $site->update($input);

        Session::flash('message', __('Successfully created'));

        Toastr::success('message', __('Successfully Updated'));

        return redirect()->back()->with('success', __('Site updated successfully'));
    }
}
