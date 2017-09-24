<?php

use Illuminate\Database\Seeder;
use VirtualExpo\Event;
use VirtualExpo\Stand;

class StandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('stands')->truncate();
        Schema::enableForeignKeyConstraints();

        $faker = \Faker\Factory::create();
        $events = Event::all();

        foreach ($events as $event) {
            for ($i=1; $i <= 25; $i++) { 
                Stand::create([
                    'booked' => 0,
                    'free' => 0,
                    'price' => $faker->randomFloat(2, $min = 50, $max = 500),
                    'image' => 'images/stands/' . $i . '.jpg',
                    'event_id' => $event->id
                ]);
            }
        }

        foreach ($events as $event) {
            for ($i=25; $i <= 30; $i++) { 
                Stand::create([
                    'booked' => 0,
                    'free' => 1,
                    'price' => 0,
                    'image' => 'images/stands/' . $i . '.jpg',
                    'event_id' => $event->id
                ]);
            }
        }

    }
}
