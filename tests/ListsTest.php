<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ListsTest extends TestCase
{

    use WithoutMiddleware;
    use DatabaseTransactions;

    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testIndexLists()
    {
        $this->json('GET', '/lists')
            ->seeJson([
                'status' => 200,
            ]);
    }

    public function testCreateLists()
    {
        $this->json('POST', '/lists',
            ['name' => 'Sally',
                'icon' => 'natal',
                'users' => '1',
                'created_by' => '1'])
            ->seeJson([
                'status' => 200,
            ]);
    }

    public function testShowLists()
    {
        $this->json('GET', '/lists/1')
            ->seeJson([
                'status' => 200,
            ]);
    }

    public function testUpdateLists()
    {
        $this->json('PUT', '/lists/1',
            ['name' => 'Sally2',
                'icon' => 'natal2',
                'users' => '1',
                'created_by' => '1'])
            ->seeJson([
                'status' => 200,
            ]);
    }

    public function testGetListProducts()
    {
        $this->json('GET', '/lists/1/products')
            ->seeJson([
                'status' => 200,
            ]);
    }

    public function testGetListUsers()
    {
        $this->json('GET', '/lists/1/users')
            ->seeJson([
                'status' => 200,
            ]);
    }

    public function testInsertListUsers()
    {
        $this->json('POST', '/lists/1/users',
            ['users' => '3'])
            ->seeJson([
                'status' => 200,
            ]);
    }

    public function testRemoveListUsers()
    {
        $this->json('DELETE', '/lists/1/users',
            ['users' => '1'])
            ->seeJson([
                'status' => 200,
            ]);
    }

    public function testDestroyLists()
    {
        $this->json('DELETE', '/lists/1')
            ->seeJson([
                'status' => 200,
            ]);
    }
}
