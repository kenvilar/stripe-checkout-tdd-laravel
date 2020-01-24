<?php

namespace App\Models;

use App\Contracts\PaymentContract;
use Illuminate\Database\Eloquent\Model;

class FakePayment implements PaymentContract
{
    public function getTestToken()
    {
        return 'valid-token';
    }

    public function totalCharged()
    {
        //
    }

    public function charge($total, $token)
    {
        // TODO: Implement charge() method.
    }
}
