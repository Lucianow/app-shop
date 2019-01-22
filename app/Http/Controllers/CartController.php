<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Mail\NewOrder;
use Mail;

class CartController extends Controller
{
    public function update()
    {
        $client = auth()->user();
        $cart = $client->cart;
        $cart->status = 'Pending';
        $cart->order_date = Carbon::now('America/Fortaleza');
        $cart->save(); // UPDATE

        $admins = User::where('admin', true)->get();
        Mail::to($admins)->send(new newOrder($client, $cart));


        $notification = 'Seu pedido foi registrado corretamente! Entraremos em contato via e-mail!';
        return back()->with(compact('notification'));
    }
}
