<?php

namespace App\Http\Controllers;

use App\MenuItem;
use App\MenuSubitem;
use Illuminate\Http\Request;

class HelperController extends Controller
{
    public function changestatus(Request $request)
    {
        //return $request['type'];
        if($request['type'] == 'item')
        {
            
            $menuItem = MenuItem::findOrFail($request['id']);
            $current  = $menuItem->status;
            $menuItem->status = ($current == 0) ? 1 : 0;
            
            $menuItem->save();
            
            $menuItem->menuSubitems->each(function ($s) {
                $s->status = $s->menuItem->status;
                $s->save();
            });
            return $menuItem->status;
        }else if($request['type']  == 'subitem'){
            $menuItem = MenuSubitem::findOrFail($request['id']);
            $current  = $menuItem->status;
            $menuItem->status = ($current == 0) ? 1 : 0;
            $menuItem->save();
            return $menuItem->status;
        }

    
        return "ok";
    }
}
