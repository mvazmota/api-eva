<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'title' => str_random(10),
            'description' => str_random(10),
            'quant' => '1 unidades',
            'image' => str_random(10).'.png',
            'list_id' => '1',
        ]);

        DB::table('products')->insert([
            'title' => str_random(10),
            'description' => str_random(10),
            'quant' => '4 peças',
            'image' => str_random(10).'.png',
            'list_id' => '2',
        ]);

        DB::table('products')->insert([
            'title' => str_random(10),
            'description' => str_random(10),
            'quant' => '2 caixas',
            'image' => str_random(10).'.png',
            'list_id' => '2',
        ]);
    }
}
