<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Menu;

class HomeController extends Controller
{

    public function index()
    {
        return view('front.index');
    }

    public function menu()
    {
        return view('front.menu');
    }

    public function menus($slung)
    {
        $Category = Category::where('slung',$slung)->get();
        foreach ($Category as $key => $value) {
            $title = $value->cat;
        }
        $Menu = Menu::where('cat_id',$value->id)->get();
        return view('front.menus', compact('title','Menu'));
    }
}
