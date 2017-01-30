<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UsersTest extends TestCase
{
    use WithoutMiddleware;
    use DatabaseTransactions;

    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testIndexUsers()
    {
        $this->json('GET', '/users')
            ->seeJson([
                'status' => 200,
            ]);
    }

//    public function testCreateUsers()
//    {
//        $this->json('POST', '/events',
//            ['title' => 'Sally Birthday',
//                'date' => '12/11/2017',
//                'location' => 'Lodz',
//                'users' => '1',
//                'start_time' => '16h20',
//                'end_time' => '18h00',
//                'created_by' => '1'])
//            ->seeJson([
//                'status' => 200,
//            ]);
//    }

    public function testShowUsers()
    {
        $this->json('GET', '/users/1')
            ->seeJson([
                'status' => 200,
            ]);
    }

//    public function testUpdateUsers()
//    {
//        $this->json('PUT', '/users/1',
//            ['name' => 'Sally',
//                'color' => 'blue',
//                'email' => 'carlos@ua.pt',
//                'birthday' => '22/10/2002'])
//            ->seeJson([
//                'status' => 200,
//            ]);
//    }

    public function testGetUserLists()
    {
        $this->json('GET', '/users/1/lists')
            ->seeJson([
                'status' => 200,
            ]);
    }

    public function testGetUserFamily()
    {
        $this->json('GET', '/users/2/family')
            ->seeJson([
                'status' => 200,
            ]);
    }

    public function testGetUserEvents()
    {
        $this->json('GET', '/users/2/events')
            ->seeJson([
                'status' => 200,
            ]);
    }

    public function testDestroyUsers()
    {
        $this->json('DELETE', '/users/1')
            ->seeJson([
                'status' => 200,
            ]);
    }
}
