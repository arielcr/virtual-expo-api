<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class LocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('locations')->truncate();
        Schema::enableForeignKeyConstraints();

        $states = [
            [
                'name' => 'Phoenix Convention Center', 
                'address' => '100 N. 3rd Street Phoenix, Arizona 85004 United States', 
                'latitude' => '33.449347', 
                'longitude' => '-112.069194', 
                'state_id' => 4
            ],
            [
                'name' => 'Anaheim Convention Center', 
                'address' => 'Anaheim Resort', 
                'latitude' => '33.788778', 
                'longitude' => '-117.914886', 
                'state_id' => 6
            ],
            [
                'name' => 'Orange County Convention Center', 
                'address' => '9800 International Drive', 
                'latitude' => '28.426389', 
                'longitude' => '-81.465556', 
                'state_id' => 12
            ],
            [
                'name' => 'Overland Park Convention Center', 
                'address' => '6000 College Boulevard', 
                'latitude' => '38.928333', 
                'longitude' => '-94.655278', 
                'state_id' => 20
            ],
            [
                'name' => 'DeVos Place Convention Center', 
                'address' => '303 Monroe Ave NW', 
                'latitude' => '42.96933', 
                'longitude' => '-85.67345', 
                'state_id' => 27
            ],
            [
                'name' => 'Las Vegas Convention Center', 
                'address' => '3150 Paradise Road', 
                'latitude' => '36.131516', 
                'longitude' => '-115.151507', 
                'state_id' => 33
            ],
            [
                'name' => 'The Dome Center', 
                'address' => 'Henrietta, New York', 
                'latitude' => '43.0659', 
                'longitude' => '-77.6123', 
                'state_id' => 37
            ],
            [
                'name' => 'Charlotte Convention Center', 
                'address' => '501 South College Street', 
                'latitude' => '35.222548', 
                'longitude' => '-80.845571', 
                'state_id' => 38
            ],
            [
                'name' => 'Spokane Convention Center', 
                'address' => '334 West Spokane Falls Blvd.', 
                'latitude' => '47.661', 
                'longitude' => '-117.413', 
                'state_id' => 56
            ],
            [
                'name' => 'Dayton Convention Center', 
                'address' => '22 E. Fifth Street', 
                'latitude' => '39.756503', 
                'longitude' => '-84.190122', 
                'state_id' => 41
            ],
        ];

        DB::table('locations')->insert($states);
    }
}
