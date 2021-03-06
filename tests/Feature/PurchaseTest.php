<?php

namespace Tests\Feature;

use App\Contracts\PaymentContract;
use App\Models\Cart;
use App\Models\FakePayment;
use App\Models\Order;
use App\Models\Product;
use Faker\Provider\Payment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PurchaseTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_can_purchase_products()
    {
        $product = factory(Product::class)->create([
            'price' => 1000,
        ]);
        $cart = new Cart();
        $cart->add($product, $product->id);

        $payment = new FakePayment();

        $this->app->instance(PaymentContract::class, $payment);

        $response = $this->post('/orders', [
            'stripeEmail' => 'test@email.com',
            'stripeToken' => $payment->getTestToken(),
        ]);

        $order = Order::query()->where('email', 'test@email.com')->first();

        $this->assertNotNull($order);
        $response->assertRedirect('/orders/' . $order->id);

        $this->get('/orders/' . $order->id)
            ->assertSee('test@email.com')
            ->assertSee($product->name);

        $this->assertEquals('10.00', $payment->totalCharged());
    }

    /**
     * @test
     */
    public function it_creates_orders_after_purchase()
    {
        $product = factory(Product::class)->create([
            'price' => 1000,
        ]);
        $cart = new Cart();
        $cart->add($product, $product->id);

        $payment = new FakePayment();

        $this->app->instance(PaymentContract::class, $payment);

        $this->post('/orders', [
            'stripeEmail' => 'test@email.com',
            'stripeToken' => $payment->getTestToken(),
        ]);

        $order = Order::where('email', 'test@email.com')->first();

        $this->assertNotNull($order);
        $this->assertEquals(1, $order->products->count());
    }
}
