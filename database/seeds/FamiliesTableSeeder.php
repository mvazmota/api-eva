<?php

use Illuminate\Database\Seeder;

class FamiliesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('families')->insert([
            'name' => 'Silva',
        ]);

        DB::table('families')->insert([
            'name' => 'Mota',
        ]);

    }
}
