<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Menu;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Admin\MenuItem;
use App\DataTables\MenuDatatable;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Mews\Purifier\Facades\Purifier;

class MenuController extends Controller
{
    public function index(MenuDatatable $dataTable)
    {
        return $dataTable->render('admin.menu.index');
    }

    public function create()
    {
        return view('admin.menu.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'label' => 'required',
            'status' => 'required|integer',
        ]);

        $menu = new Menu();
        $menu->label = Purifier::clean($request->label);
        $menu->slug = Str::slug(Purifier::clean($request->label));
        $menu->status = Purifier::clean($request->status);

        $menu->save();

        session()->flash('success', __('Successfully added'));
        Toastr::success('success', __('Successfully added'), ["positionClass" => "toast-top-right"]);

        return redirect()->route('menu.index');
    }

    public function edit($id)
    {
        $menu = Menu::where('id', $id)->firstOrFail();
        $menu_items = MenuItem::where('menu_id', $menu->id)->get();
        $menu_position = MenuItem::where('menu_id', $menu->id)->first();
        return view('admin.menu.edit', compact('menu', 'menu_items', 'menu_position'));
    }


    public function update(Request $request, $id)
    {

       $menu = Menu::where('id', $id)->firstOrFail();
       $request->validate([
            'label' => 'required',
            'status' => 'required|integer',
        ]);

        $menu->label = Purifier::clean($request->label);
        $menu->slug = Str::slug(Purifier::clean($request->label));
        $menu->status = Purifier::clean($request->status);

        $menu->save();

        session()->flash('success', __('Successfully updated'));
        Toastr::success('success', __('Successfully updated'), ["positionClass" => "toast-top-right"]);

        return redirect()->route('menu.index');

    }


    public function delete($id)
    {
        $menu = Menu::where('id', $id)->firstOrFail();
        $menu->delete();

        $menu_items = MenuItem::where('menu_id', $id);
        if($menu_items) {
            $menu_items->delete();
        }

        session()->flash('success', __('Successfully deleted'));
        Toastr::success('success', __('Successfully deleted'), ["positionClass" => "toast-top-right"]);

        return redirect()->back();
    }
}
