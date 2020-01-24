<?php

namespace Tests\Unit;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CartTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_can_add_items_to_the_cart()
    {
        $product = factory(Product::class)->create();
        $cart = new Cart();
        $cart->add($product, $product->id);

        $this->assertEquals(1, $cart->items->count());
    }

    /**
     * @test
     */
    public function it_has_a_total_price()
    {
        $products = factory(Product::class, 3)->create();
        $cart = new Cart();

        foreach ($products as $product) {
            $cart->add($product, $product->id);
        }

        $totalPrice = $products->reduce(function ($total, $product) {
            return $total + $product->price;
        });

        $this->assertEquals($totalPrice, $cart->totalPrice());
    }
}
