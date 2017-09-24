<?php

use Illuminate\Database\Seeder;
use VirtualExpo\Event;
use VirtualExpo\Date;

class DatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('dates')->truncate();
        Schema::enableForeignKeyConstraints();

        $faker = \Faker\Factory::create();
        $events = Event::all();

        foreach ($events as $event) {
            $n = mt_rand(1,5);
            for ($i=0; $i < $n; $i++) { 
                Date::create([
                    'date' => $faker->dateTimeThisYear(),
                    'event_id' => $event->id
                ]);
            }
        }
    }
}
