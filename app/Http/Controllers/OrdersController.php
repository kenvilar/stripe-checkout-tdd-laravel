<?php

namespace App\Http\Controllers;

use App\Contracts\PaymentContract;
use App\Models\Cart;
use App\Models\FakePayment;
use App\Models\Order;
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

        $order = Order::create([
            'email' => \request('stripeEmail'),
            'total' => $this->payment->total(),
        ]);

        foreach ($cart->items as $item) {
            $order->products()->attach($item->id, [
                'price' => $item->price,
            ]);
        }
    }
}
