<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void∫
     */
    public function run()
    {
        $this->call(CountriesTableSeeder::class);
        $this->call(StatesTableSeeder::class);
        $this->call(LocationsTableSeeder::class);
        $this->call(EventsTableSeeder::class);
        $this->call(DatesTableSeeder::class);
        $this->call(CompanyTableSeeder::class);
        $this->call(ContactTableSeeder::class);
        $this->call(DocumentTableSeeder::class);
        $this->call(StandsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}
