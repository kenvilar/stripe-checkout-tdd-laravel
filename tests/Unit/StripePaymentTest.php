<?php

namespace Tests\Unit;

use App\Models\FakePayment;
use App\Models\StripePayment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Stripe\Charge;
use Stripe\Stripe;
use Stripe\Token;
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

        //Stripe::setApiKey(config('services.stripe.secret'));

        $token = Token::create([
            'card' => [
                'number' => '4242424242424242',
                'exp_month' => 1,
                'exp_year' => date('Y') + 1,
                'cvc' => '314',
            ],
        ], [
            'api_key' => config('services.stripe.secret'),
        ]);

        $payment->charge(1000, $token->id);

        $charges = Charge::all([
            'limit' => 1,
        ], [
            'api_key' => config('services.stripe.secret'),
        ]);

        $this->assertEquals('10.00', $payment->totalCharged());
    }
}
