<?php

use Illuminate\Database\Seeder;

class ListPivotUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('list_user')->insert([
            'list_id' => '1',
            'user_id' => '1',
        ]);

        DB::table('list_user')->insert([
            'list_id' => '1',
            'user_id' => '2',
        ]);

        DB::table('list_user')->insert([
            'list_id' => '2',
            'user_id' => '1',
        ]);

        DB::table('list_user')->insert([
            'list_id' => '3',
            'user_id' => '2',
        ]);

    }
}
