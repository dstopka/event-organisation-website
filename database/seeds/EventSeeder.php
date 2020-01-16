<?php

use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events')->insert([
            'title' => 'Pielgrzymka',
            'description' => 'Pielgrzymka papieska',
            'user_id' => 3,
            'latitude' => 50.059925,
            'longtitude' => 19.909014,
            'places' => 10000,
            'price' => 0,
            'isFree' => 1
        ]);

        DB::table('event_dates')->insert([
           'event_id' => 1,
           'start' => date("Y-m-d H:i:s", mktime(12, 00, 00, 1, 25, 2020)),
           'end' => date("Y-m-d H:i:s", mktime(20, 00, 00, 1, 26, 2020)),
            'free_places' => 9999
        ]);

        DB::table('tickets')->insert([
           'user_id' => 2,
           'eventDate_id' => 1,
           'is_paid' => 1
        ]);

        DB::table('events')->insert([
            'title' => 'Szkolenie z Cyberbezpieczeństwa',
            'description' => 'Tematem przewodnim jest bezpieczeństwo w sieci oraz świadomość użytkowników',
            'user_id' => 3,
            'latitude' => 50.064500,
            'longtitude' => 19.923286,
            'places' => 100,
            'price' => 20,
            'isFree' => 0
        ]);

        DB::table('event_dates')->insert([
            'event_id' => 2,
           'start' => date("Y-m-d H:i:s", mktime(10, 0, 0, 1, 25, 2020)),
           'end' => date("Y-m-d H:i:s", mktime(18, 0, 0, 1, 25, 2020)),
            'free_places' => 100
        ]);

        DB::table('event_dates')->insert([
            'event_id' => 2,
           'start' => date("Y-m-d H:i:s", mktime(12, 0, 0, 1, 31, 2020)),
           'end' => date("Y-m-d H:i:s", mktime(20, 0, 0, 1, 31, 2020)),
            'free_places' => 100
        ]);

        DB::table('event_dates')->insert([
            'event_id' => 2,
            'start' => date("Y-m-d H:i:s", mktime(12, 0, 0, 2, 8, 2020)),
            'end' => date("Y-m-d H:i:s", mktime(20, 0, 0, 2, 8, 2020)),
            'free_places' => 100
        ]);

        DB::table('events')->insert([
            'title' => 'Project X',
            'description' => 'Zakończenie sesji!!!',
            'user_id' => 3,
            'latitude' => 50.064500,
            'longtitude' => 19.923286,
            'places' => 100,
            'price' => 20,
            'isFree' => 0
        ]);

        DB::table('event_dates')->insert([
            'event_id' => 3,
            'start' => date("Y-m-d H:i:s", mktime(15, 0, 0, 2, 14, 2020)),
            'end' => date("Y-m-d H:i:s", mktime(6, 0, 0, 2, 15, 2020)),
            'free_places' => 100
        ]);


    }
}
