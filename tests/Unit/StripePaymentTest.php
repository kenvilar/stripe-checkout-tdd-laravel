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

    private $lastCharge;

    public function setUp(): void
    {
        parent::setUp();
        $this->lastCharge = $this->lastCharge();
    }

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

        $this->assertEquals(1, $this->newCharges());
        $this->assertEquals(1000, $this->lastCharge()->amount);
    }

    private function lastCharge()
    {
        return Charge::all([
            'limit' => 1,
        ], [
            'api_key' => config('services.stripe.secret'),
        ])->data[0];
    }

    private function newCharges()
    {
        return Charge::all([
            'limit' => 1,
            'ending_before' => $this->lastCharge->id,
        ], [
            'api_key' => config('services.stripe.secret'),
        ])->data;
    }
}
