<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\News;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Admin\Category;
use App\DataTables\NewsDatatable;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Mews\Purifier\Facades\Purifier;

class NewsController extends Controller
{
    public function index(NewsDatatable $dataTable)
    {
        return $dataTable->render('admin.news.index');
    }


    public function create()
    {
        $categories = Category::all();
        return view('admin.news.create', compact('categories'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'details' => 'required|string',
            'image' => 'required|mimes:jpg,jpeg,png,webp,gif',
            'image_alt' => 'required|string',
            'tags' => 'required|string',
            'category_id' => 'required',
            'status' => 'required',
        ], [
            'category_id.required' => __('The category field is required'),
        ]);

        $news = new News();
        $news->title = Purifier::clean($request->title);
        $news->slug = time().'-'.Str::slug(Purifier::clean($request->title));
        $news->description = Purifier::clean($request->description);
        $news->details = Purifier::clean($request->details);
        $news->image_alt = Purifier::clean($request->image_alt);
        $news->tags = Purifier::clean($request->tags);
        $news->category_id = Purifier::clean($request->category_id);
        $news->status = Purifier::clean($request->status);

        if (!empty($request->image)) {
            $news->image = fileUpload($request['image'], path_news_image()); // upload file
         }

        $news->user_id = Auth::user()->id;

        $news->save();

        session()->flash('success', __('Successfully added'));
        Toastr::success('success', __('Successfully added'), ["positionClass" => "toast-top-right"]);

        return redirect()->route('news.index');

    }

    public function edit($id)
    {
        $categories = Category::all();
        $news = News::where('id', $id)->firstOrFail();
        return view('admin.news.edit', compact('news', 'categories'));
    }


    public function update(Request $request, $id)
    {

        $news = News::where('id', $id)->firstOrFail();
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'details' => 'required|string',
            'image' => 'mimes:jpg,jpeg,png,webp,gif',
            'image_alt' => 'required|string',
            'tags' => 'required|string',
            'category_id' => 'required',
            'status' => 'required',
        ], [
            'category_id.required' => __('The category field is required'),
        ]);

        $news->title = Purifier::clean($request->title);
        $news->description = Purifier::clean($request->description);
        $news->details = Purifier::clean($request->details);
        $news->image_alt = Purifier::clean($request->image_alt);
        $news->tags = Purifier::clean($request->tags);
        $news->category_id = Purifier::clean($request->category_id);
        $news->status = Purifier::clean($request->status);

        if (!empty($request->image)) {
            $old_img = '';
            $file = News::where('id', $news->id)->first();
            $old_img = isset($file) ? $file->image : '';

            $news->image = fileUpload($request['image'], path_news_image(), $old_img); // upload file
        }

        $news->user_id = Auth::user()->id;

        $news->save();

        session()->flash('success', __('Successfully updated'));
        Toastr::success('success', __('Successfully updated'), ["positionClass" => "toast-top-right"]);

        return redirect()->route('news.index');
    }

    public function delete($id)
    {
        $news = News::where('id', $id)->firstOrFail();
        $image_path = public_path(path_news_image() . $news->image);
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
        $news->delete();
        session()->flash('success', __('Successfully delete'));
        Toastr::success('success', __('Successfully delete'), ["positionClass" => "toast-top-right"]);
        return redirect()->route('news.index');
    }
}
