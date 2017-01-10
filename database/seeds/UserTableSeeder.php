<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Carlos',
            'email' => 'carlos@ua.pt',
            'color' => 'red',
            'password' => 'eva123',
        ]);

        DB::table('users')->insert([
            'name' => 'Alexandre',
            'email' => 'alex@ua.pt',
            'color' => 'blue',
            'password' => 'eva123',
        ]);

        DB::table('users')->insert([
            'name' => 'Ana',
            'email' => 'ana@ua.pt',
            'color' => 'pink',
            'password' => 'eva123',
        ]);

    }
}
