<?php

namespace Tests\Unit;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_has_a_formatted_price()
    {
        $product = factory(Product::class)->create([
            'price' => 1099,
        ]);

        $formattedPrice = $product->getPrice();

        $this->assertEquals('10.99', $product->getPrice());
    }
}
