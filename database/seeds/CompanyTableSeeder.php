<?php

use Illuminate\Database\Seeder;
use VirtualExpo\Company;

class CompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Company::truncate();
        Schema::enableForeignKeyConstraints();

        Company::create([
            'name' => 'Test Company',
            'description' => 'The description of the company',
            'logo' => 'images/companies/1.jpg',
        ]);
    }
}
