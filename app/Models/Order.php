<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('price');
    }

    public function addProducts($products)
    {
        foreach ($products as $product) {
            $this->products()->attach($product->id, [
                'price' => $product->price,
            ]);
        }
    }

    public function totalPrice()
    {
        return number_format($this->total / 100, 2);
    }
}
