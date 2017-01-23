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
            'title' => 'Bananas',
            'description' => 'Comprar as mais baratas!',
            'quant' => '1 cacho',
            'image' => '',
            'list_id' => '1',
        ]);

        DB::table('products')->insert([
            'title' => 'Laranjas',
            'description' => 'Comprar as mais baratas!',
            'quant' => '6',
            'image' => '',
            'list_id' => '1',
        ]);

        DB::table('products')->insert([
            'title' => 'Café',
            'description' => 'Comprar as mais baratas!',
            'quant' => '2 pacotes',
            'image' => '',
            'list_id' => '1',
        ]);

        DB::table('products')->insert([
            'title' => 'Bananas',
            'description' => 'Comprar as mais baratas!',
            'quant' => '1 cacho',
            'image' => '',
            'list_id' => '3',
        ]);

        DB::table('products')->insert([
            'title' => 'Laranjas',
            'description' => 'Comprar as mais baratas!',
            'quant' => '6',
            'image' => '',
            'list_id' => '2',
        ]);

        DB::table('products')->insert([
            'title' => 'Café',
            'description' => 'Comprar as mais baratas!',
            'quant' => '2 pacotes',
            'image' => '',
            'list_id' => '2',
        ]);

        DB::table('products')->insert([
            'title' => 'Bananas',
            'description' => 'Comprar as mais baratas!',
            'quant' => '1 cacho',
            'image' => '',
            'list_id' => '3',
        ]);

        DB::table('products')->insert([
            'title' => 'Laranjas',
            'description' => 'Comprar as mais baratas!',
            'quant' => '6',
            'image' => '',
            'list_id' => '3',
        ]);

        DB::table('products')->insert([
            'title' => 'Café',
            'description' => 'Comprar as mais baratas!',
            'quant' => '2 pacotes',
            'image' => '',
            'list_id' => '3',
        ]);
    }
}
