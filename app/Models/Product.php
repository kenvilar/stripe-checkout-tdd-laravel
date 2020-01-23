<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    public function getPrice()
    {
        return number_format($this->price / 100, 2);
    }
}
