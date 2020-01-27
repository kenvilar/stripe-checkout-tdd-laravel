<?php

namespace Tests\Unit;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OrderTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_can_add_products_to_the_order()
    {
        $products = factory(Product::class, 3)->create();
        $order = factory(Order::class)->create();

        $order->addProducts($products);

        $this->assertEquals(3, $order->products()->count());
    }
}
