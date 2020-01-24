<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FakePayment extends Model
{
    public function getTestToken()
    {
        return 'valid-token';
    }

    public function totalCharged()
    {
        //
    }
}
