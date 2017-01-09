<?php

use Illuminate\Database\Seeder;

class ListsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lists')->insert([
            'name' => 'Casa',
            'users' => 'Carlos',
            'icon' => 'casa',
        ]);

        DB::table('lists')->insert([
            'name' => 'Casa',
            'users' => 'Carlos',
            'icon' => 'casa',
        ]);

        DB::table('lists')->insert([
            'name' => 'Casa',
            'users' => 'Carlos',
            'icon' => 'casa',
        ]);

        DB::table('lists')->insert([
            'name' => 'Casa',
            'users' => 'Carlos',
            'icon' => 'casa',
        ]);
    }
}
