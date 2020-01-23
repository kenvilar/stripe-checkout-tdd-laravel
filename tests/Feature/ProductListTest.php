<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductListTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_can_display_the_product_list()
    {
        Product::create([
            'name' => 'Test Product',
            'description' => 'Test product description',
            'price' => 1099,
        ]);

        $response = $this->get('/products');

        $response
            ->assertSee('Test Product')
            ->assertSee('10.99');
    }
}
