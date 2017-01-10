<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ListsTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(ListPivotUsersTableSeeder::class);

    }
}
