<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\MenuItem;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Mews\Purifier\Facades\Purifier;

class MenuItemController extends Controller
{
    public function store(Request $request)
    {
        MenuItem::where('menu_id', $request->menu_id)->delete();
        

        foreach ($request->menu_items as $item) {

            if ($item['item_label'] == null ||  $item['url'] == null) {
                return redirect()->back()->with('menu_items_error', '');
            }

            $menu_item = new MenuItem();
            $menu_item->label = $item['item_label'];
            $menu_item->url = $item['url'];
            $menu_item->icon = $item['icon'];
            $menu_item->css_class = $item['css_class'];
            
            $menu_item->menu_id = Purifier::clean($request->menu_id);
            $menu_item->position = Purifier::clean($request->position);
            $menu_item->status = Purifier::clean($request->status);

            $menu_item->save();

        }

        session()->flash('success', __('Successfully updated'));
        Toastr::success('success', __('Successfully updated'), ["positionClass" => "toast-top-right"]);

        return redirect()->route('menu.index');


    }
}
