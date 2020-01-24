<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\FakePayment;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function store()
    {
        $cart = new Cart();

        $payment = new FakePayment();
        $payment->charge($cart->total(), \request('stripeToken'));
    }
}
