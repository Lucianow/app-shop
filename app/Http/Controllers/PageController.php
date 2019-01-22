<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class PageController extends Controller
{

    public function welcome()
    {
        $categories = Category::get();
        return view('welcome')->with(compact('categories'));
    }
}
