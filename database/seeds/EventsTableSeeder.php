<?php

use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events')->insert([
            'title' => 'Festa da Catarina',
            'date' => '09/01/2017',
            'start_time' => '12h30',
            'end_time' => '16h30',
            'location' => 'Aveiro',
            'description' => 'Que festa que vai ser!',
        ]);

        DB::table('events')->insert([
            'title' => 'Festa da Catarina2',
            'date' => '22/01/2017',
            'start_time' => '12h30',
            'location' => 'Aveiro',
            'description' => 'Que festa que vai ser!',
        ]);

        DB::table('events')->insert([
            'title' => 'Festa da Catarina',
            'date' => '12/02/2017',
            'start_time' => '12h30',
            'location' => 'Aveiro',
            'description' => 'Que festa que vai ser!',
        ]);
    }
}
