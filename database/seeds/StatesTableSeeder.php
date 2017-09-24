<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class StatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('states')->truncate();
        Schema::enableForeignKeyConstraints();

        $states = [
            ['name' => 'Alaska', 'code' => 'AK', 'country_id' => 236],
            ['name' => 'Alabama', 'code' => 'AL', 'country_id' => 236],
            ['name' => 'American Samoa', 'code' => 'AS', 'country_id' => 236],
            ['name' => 'Arizona', 'code' => 'AZ', 'country_id' => 236],
            ['name' => 'Arkansas', 'code' => 'AR', 'country_id' => 236],
            ['name' => 'California', 'code' => 'CA', 'country_id' => 236],
            ['name' => 'Colorado', 'code' => 'CO', 'country_id' => 236],
            ['name' => 'Connecticut', 'code' => 'CT', 'country_id' => 236],
            ['name' => 'Delaware', 'code' => 'DE', 'country_id' => 236],
            ['name' => 'District of Columbia', 'code' => 'DC', 'country_id' => 236],
            ['name' => 'Federated States of Micronesia', 'code' => 'FM', 'country_id' => 236],
            ['name' => 'Florida', 'code' => 'FL', 'country_id' => 236],
            ['name' => 'Georgia', 'code' => 'GA', 'country_id' => 236],
            ['name' => 'Guam', 'code' => 'GU', 'country_id' => 236],
            ['name' => 'Hawaii', 'code' => 'HI', 'country_id' => 236],
            ['name' => 'Idaho', 'code' => 'ID', 'country_id' => 236],
            ['name' => 'Illinois', 'code' => 'IL', 'country_id' => 236],
            ['name' => 'Indiana', 'code' => 'IN', 'country_id' => 236],
            ['name' => 'Iowa', 'code' => 'IA', 'country_id' => 236],
            ['name' => 'Kansas', 'code' => 'KS', 'country_id' => 236],
            ['name' => 'Kentucky', 'code' => 'KY', 'country_id' => 236],
            ['name' => 'Louisiana', 'code' => 'LA', 'country_id' => 236],
            ['name' => 'Maine', 'code' => 'ME', 'country_id' => 236],
            ['name' => 'Marshall Islands', 'code' => 'MH', 'country_id' => 236],
            ['name' => 'Maryland', 'code' => 'MD', 'country_id' => 236],
            ['name' => 'Massachusetts', 'code' => 'MA', 'country_id' => 236],
            ['name' => 'Michigan', 'code' => 'MI', 'country_id' => 236],
            ['name' => 'Minnesota', 'code' => 'MN', 'country_id' => 236],
            ['name' => 'Mississippi', 'code' => 'MS', 'country_id' => 236],
            ['name' => 'Missouri', 'code' => 'MO', 'country_id' => 236],
            ['name' => 'Montana', 'code' => 'MT', 'country_id' => 236],
            ['name' => 'Nebraska', 'code' => 'NE', 'country_id' => 236],
            ['name' => 'Nevada', 'code' => 'NV', 'country_id' => 236],
            ['name' => 'New Hampshire', 'code' => 'NH', 'country_id' => 236],
            ['name' => 'New Jersey', 'code' => 'NJ', 'country_id' => 236],
            ['name' => 'New Mexico', 'code' => 'NM', 'country_id' => 236],
            ['name' => 'New York', 'code' => 'NY', 'country_id' => 236],
            ['name' => 'North Carolina', 'code' => 'NC', 'country_id' => 236],
            ['name' => 'North Dakota', 'code' => 'ND', 'country_id' => 236],
            ['name' => 'Northern Mariana Islands', 'code' => 'MP', 'country_id' => 236],
            ['name' => 'Ohio', 'code' => 'OH', 'country_id' => 236],
            ['name' => 'Oklahoma', 'code' => 'OK', 'country_id' => 236],
            ['name' => 'Oregon', 'code' => 'OR', 'country_id' => 236],
            ['name' => 'Palau', 'code' => 'PW', 'country_id' => 236],
            ['name' => 'Pennsylvania', 'code' => 'PA', 'country_id' => 236],
            ['name' => 'Puerto Rico', 'code' => 'PR', 'country_id' => 236],
            ['name' => 'Rhode Island', 'code' => 'RI', 'country_id' => 236],
            ['name' => 'South Carolina', 'code' => 'SC', 'country_id' => 236],
            ['name' => 'South Dakota', 'code' => 'SD', 'country_id' => 236],
            ['name' => 'Tennessee', 'code' => 'TN', 'country_id' => 236],
            ['name' => 'Texas', 'code' => 'TX', 'country_id' => 236],
            ['name' => 'Utah', 'code' => 'UT', 'country_id' => 236],
            ['name' => 'Vermont', 'code' => 'VT', 'country_id' => 236],
            ['name' => 'Virgin Islands', 'code' => 'VI', 'country_id' => 236],
            ['name' => 'Virginia', 'code' => 'VA', 'country_id' => 236],
            ['name' => 'Washington', 'code' => 'WA', 'country_id' => 236],
            ['name' => 'West Virginia', 'code' => 'WV', 'country_id' => 236],
            ['name' => 'Wisconsin', 'code' => 'WI', 'country_id' => 236],
            ['name' => 'Wyoming', 'code' => 'WY', 'country_id' => 236],
            ['name' => 'Armed Forces Africa', 'code' => 'AE', 'country_id' => 236],
            ['name' => 'Armed Forces Americas (except Canada)', 'code' => 'AA', 'country_id' => 236],
            ['name' => 'Armed Forces Canada', 'code' => 'AE', 'country_id' => 236],
            ['name' => 'Armed Forces Europe', 'code' => 'AE', 'country_id' => 236],
            ['name' => 'Armed Forces Middle East', 'code' => 'AE', 'country_id' => 236],
            ['name' => 'Armed Forces Pacific', 'code' => 'AP', 'country_id' => 236]
        ];

        DB::table('states')->insert($states);

        
    }
}
