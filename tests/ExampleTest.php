<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{

    use WithoutMiddleware;

    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->post('/list',
            ['name' => 'Sally',
                'icon' => 'natal',
                'created_by' => '1'])
//            ->seeJson([
//                'created' => true,
//            ])
;
    }
}
