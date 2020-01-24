<?php

namespace App\Http\Controllers;

use App\Contracts\PaymentContract;
use App\Models\Cart;
use App\Models\FakePayment;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    private $payment;

    public function __construct(PaymentContract $payment)
    {
        $this->payment = $payment;
    }

    public function store()
    {
        $cart = new Cart();
        $this->payment->charge($cart->total(), \request('stripeToken'));
    }
}
