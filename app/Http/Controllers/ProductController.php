<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show($id)
    {
        $product = Product::find($id);
        $images = $product->images;

        $imagesLeft = collect();
        $imagesRight = collect();
        foreach ($images as $key => $image) {
            if ($key%2==0)
                $imagesLeft->push($image);
            else
                $imagesRight->push($image);
        }
        $notification = 'O produto foi incluído em seu Carro de Compras com sucesso!';
        return view('products.show')->with(compact('product', 'imagesLeft', 'imagesRight'));
    }
}
