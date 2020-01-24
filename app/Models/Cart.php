<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public $items;

    public function __construct()
    {
        $this->items = collect();

        if (session()->has('cart')) {
            $this->items = session('cart')->items;
        }
    }

    public function add($product, $key)
    {
        $this->items->put($key, $product);
        session()->put('cart', $this);
    }

    public function totalPrice()
    {
        return number_format($this->total() / 100, 2);
    }

    public function total()
    {
        return $this->items->reduce(function ($total, $item) {
            return $total + $item->price;
        });
    }
}
