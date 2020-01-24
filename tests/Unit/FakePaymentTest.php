<?php

namespace Tests\Unit;

use App\Models\FakePayment;
use PHPUnit\Framework\TestCase;

class FakePaymentTest extends TestCase
{
    /**
     * @test
     */
    public function it_has_a_total_charged()
    {
        $payment = new FakePayment();

        $payment->charge(1000, $payment->getTestToken());

        $this->assertEquals('10.00', $payment->totalCharged());
    }
}
