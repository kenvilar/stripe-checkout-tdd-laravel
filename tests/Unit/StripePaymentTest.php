<?php

namespace Tests\Unit;

use App\Models\FakePayment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StripePaymentTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_can_make_real_charges_with_a_valid_token()
    {
        $payment = new StripePayment();
        $payment->charge(1000, 'real-token?');
    }
}
