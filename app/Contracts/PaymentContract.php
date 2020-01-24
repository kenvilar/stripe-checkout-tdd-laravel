<?php

namespace App\Contracts;

interface PaymentContract
{
    public function charge($total, $token);
}
