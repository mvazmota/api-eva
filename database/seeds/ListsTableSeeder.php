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
            'title' => 'Casa',
            'description' => str_random(10),
            'icon' => 'imagem1.png',
        ]);

        DB::table('lists')->insert([
            'title' => 'Aniversário Ana',
            'description' => str_random(10),
            'icon' => 'imagem1.png',
        ]);

        DB::table('lists')->insert([
            'title' => 'Festa Natal',
            'description' => str_random(10),
            'icon' => 'imagem1.png',
        ]);

        DB::table('lists')->insert([
            'title' => 'Roupa Carlos',
            'description' => str_random(10),
            'icon' => 'imagem1.png',
        ]);
    }
}
