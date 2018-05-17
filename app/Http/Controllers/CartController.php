<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function update()
    {
        $client = auth()->user();
        $cart = $client->cart;
        $cart->status = 'Pending';
        $cart->save(); // UPDATE
        $notification = 'Seu pedido foi registrado corretamente! Entraremos em contato via e-mail!';
        return back()->with(compact('notification'));
    }
}
