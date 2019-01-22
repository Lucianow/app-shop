<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    //
    /**
     * @param Category $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show (Category $category)
    {
        $products = $category->products()->paginate(6);
        return view('categories.show')->with(compact('category', 'products'));
    }
}
