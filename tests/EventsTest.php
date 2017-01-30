<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EventsTest extends TestCase
{
    use WithoutMiddleware;
    use DatabaseTransactions;

    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testIndexEvents()
    {
        $this->json('GET', '/events')
            ->seeJson([
                'status' => 200,
            ]);
    }

    public function testCreateEvents()
    {
        $this->json('POST', '/events',
            ['title' => 'Sally Birthday',
                'date' => '12/11/2017',
                'location' => 'Lodz',
                'users' => '1',
                'start_time' => '16h20',
                'end_time' => '18h00',
                'created_by' => '1'])
            ->seeJson([
                'status' => 200,
            ]);
    }

    public function testShowEvents()
    {
        $this->json('GET', '/events/1')
            ->seeJson([
                'status' => 200,
            ]);
    }

    public function testUpdateEvents()
    {
        $this->json('PUT', '/events/1',
            ['title' => 'Sally Birthday2',
                'date' => '17/11/2017',
                'location' => 'Lodz',
                'start_time' => '16h20',
                'end_time' => '19h00'])
            ->seeJson([
                'status' => 200,
            ]);
    }

    public function testGetListUsers()
    {
        $this->json('GET', '/events/1/users')
            ->seeJson([
                'status' => 200,
            ]);
    }

    public function testInsertEventUsers()
    {
        $this->json('POST', '/events/1/users',
            ['users' => '1'])
            ->seeJson([
                'status' => 200,
            ]);
    }

    public function testRemoveEventUsers()
    {
        $this->json('DELETE', '/events/1/users',
            ['users' => '2'])
            ->seeJson([
                'status' => 200,
            ]);
    }

    public function testDestroyEvents()
    {
        $this->json('DELETE', '/events/1')
            ->seeJson([
                'status' => 200,
            ]);
    }
}
