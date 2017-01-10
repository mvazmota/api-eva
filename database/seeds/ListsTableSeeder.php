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
            'icon' => 'casa',
        ]);

        DB::table('lists')->insert([
            'name' => 'Festa Joana',
            'icon' => 'prenda',
        ]);

        DB::table('lists')->insert([
            'name' => 'Passagem de Ano',
            'icon' => 'trabalho',
        ]);

    }
}
