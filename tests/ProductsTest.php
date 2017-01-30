<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProductsTest extends TestCase
{
    use WithoutMiddleware;
    use DatabaseTransactions;

    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testIndexProducts()
    {
        $this->json('GET', '/products')
            ->seeJson([
                'status' => 200,
            ]);
    }

    public function testCreateProducts()
    {
        $this->json('POST', '/products',
            ['title' => 'Sally Birthday',
                'description' => 'Its gonna be great!',
                'quant' => 'London',
                'list_id' => '1',
                'created_by' => '1'])
            ->seeJson([
                'status' => 200,
            ]);
    }

    public function testShowProducts()
    {
        $this->json('GET', '/products/1')
            ->seeJson([
                'status' => 200,
            ]);
    }

    public function testUpdateProducts()
    {
        $this->json('POST', '/products/1',
            ['title' => 'Sally Birthday2',
                'description' => 'Its gonna be awesome!',
                'quant' => 'Lodz'])
            ->seeJson([
                'status' => 200,
            ]);
    }

    public function testDestroyProducts()
    {
        $this->json('DELETE', '/products/1')
            ->seeJson([
                'status' => 200,
            ]);
    }
}
