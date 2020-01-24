<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UpdateCartTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_can_update_cart_content()
    {
        $product = factory(Product::class)->create();

        $response = $this->put('/cart/' . $product->id);

        $response->assertRedirect('/cart');
        $response->assertSessionHas('cart');

        $cart = session('cart');

        $this->get('/cart')
            ->assertSee($product->name)
            ->assertSee($product->getPrice())
            ->assertSee($cart->totalPrice());
    }
}
