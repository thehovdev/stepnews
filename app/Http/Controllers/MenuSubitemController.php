<?php

namespace App\Http\Controllers;

use App\MenuSubitem;
use Illuminate\Http\Request;

class MenuSubitemController extends Controller
{
 
    public function destroy(MenuSubitem $item)
    {
        $item->delete();

        return redirect()->back();
    }
}
