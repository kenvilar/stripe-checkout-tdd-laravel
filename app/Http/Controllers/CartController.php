<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = new Cart();
        return view('cart.index', ['cart' => $cart]);
    }

    public function update(Product $product)
    {
        $cart = new Cart();
        $cart->add($product, $product->id);
        return redirect('/cart');
    }
}
