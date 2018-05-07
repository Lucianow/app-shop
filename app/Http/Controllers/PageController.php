<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class PageController extends Controller
{

    public function welcome()
    {
        $products = Product::all();
        return view('welcome')->with(compact('products'));
    }
}
