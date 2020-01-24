<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public $items;

    public function __construct()
    {
        $this->items = collect();
    }

    public function add($product, $key)
    {
        $this->items->put($key, $product);
    }

    public function totalPrice()
    {
        $totalPrice = $this->items->reduce(function ($total, $item) {
            return $total + $item->price;
        });

        return number_format($totalPrice / 100, '2');
    }
}
