<?php

namespace App\Models;

use App\Contracts\PaymentContract;
use Illuminate\Database\Eloquent\Model;

class FakePayment implements PaymentContract
{
    private $total;

    public function getTestToken()
    {
        return 'valid-token';
    }

    public function totalCharged()
    {
        return number_format($this->total / 100, 2);
    }

    public function charge($total, $token)
    {
        $this->total = $total;
    }

    public function total()
    {
        return $this->total;
    }
}
