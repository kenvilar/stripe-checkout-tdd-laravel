<?php

namespace App\Models;

use App\Contracts\PaymentContract;
use Stripe\Charge;

class StripePayment implements PaymentContract
{
    public function charge($total, $token)
    {
        // `source` is obtained with Stripe.js; see https://stripe.com/docs/payments/accept-a-payment-charges#web-create-token
        $charge = Charge::create([
            'amount' => $total,
            'currency' => 'usd',
            'source' => $token,
            'description' => 'My First Test Charge (created for API docs)', //optional
        ], [
            'api_key' => config('services.stripe.secret'),
        ]);

        $this->total = $charge->amount;
    }

    public function total()
    {
        return $this->total;
    }
}
