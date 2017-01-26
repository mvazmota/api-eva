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
            'created_by' => '1'
        ]);

        DB::table('lists')->insert([
            'name' => 'Festa Joana',
            'icon' => 'prenda',
            'created_by' => '1'
        ]);

        DB::table('lists')->insert([
            'name' => 'Passagem de Ano',
            'icon' => 'trabalho',
            'created_by' => '2'
        ]);
    }
}
