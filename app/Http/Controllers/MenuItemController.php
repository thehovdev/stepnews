<?php

namespace App\Http\Controllers;

use App\MenuItem;
use App\MenuSubitem;
use Illuminate\Http\Request;
use Illuminate\Contracts\Validation\Validator;

class MenuItemController extends Controller
{
    public static function getAll()
    {
        return MenuItem::all();
    }

    public function index()
    {
        return view('menu.index')->with('menu', MenuItem::all());
    }

    public function create()
    {
        return view('menu.create');
    }


    public function show(MenuItem $item)
    {
        return view('menu.show')->with('item', $item);
    }

    public function edit(MenuItem $item)
    {
        return view('menu.edit')->with('item', $item);
    }

    public function update(MenuItem $item)
    {
        $data = request()->validate([
            'name' => 'required',
            'route_name' => 'required',
        ]);

        $item->update($data);

        $subs = request('subitems');       

        foreach ($subs as $key => $value) {
            if((empty($value['name']) && empty($value['route_name']) ) || (empty($value['name'])) )
            {   
                if (isset($value['id']))
                $item->menuSubitems()->where('id', $value['id'])->delete();
            }else{

                if (isset($value['id'])){
                    $sub = MenuSubitem::findOrFail($value['id']);
                    $sub->name = $value['name'];
                    $sub->route_name = $value['route_name'];
                    $sub->save();
                }
                else
                {
                    $value['menu_item_id'] = $item->id;
                    $item->menuSubitems()->create($value);
                }
                   
            }
        }

        return redirect()->route('menu')->with('menu', MenuItem::all());
    }

    public function store()
    {
        $data = request()->validate([
            'name' => 'required',
            'route_name' => 'required',
        ]);

        $newMenuItem = MenuItem::create($data);
        $subs = request('subitems');
       
        foreach ($subs as $key => $value) {
            if((empty($value['name']) && empty($value['route_name']) ) || (empty($value['name'])))
            {
                continue;
            }else{
                $newMenuItem->menuSubitems()->create($value);
            }
        }

        return redirect()->route('menu')->with('menu', MenuItem::all());
    }

    public function destroy(MenuItem $item)
    {
        $item->delete();

        return redirect()->back();
    }
}
