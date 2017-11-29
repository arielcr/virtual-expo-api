<?php

use Illuminate\Database\Seeder;
use VirtualExpo\Contact;

class ContactTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Contact::truncate();
        Schema::enableForeignKeyConstraints();

        Contact::create([
            'name' => 'Test Contact',
            'email' => 'test@contact.com',
            'telephone' => '1254-2154',
            'administrator' => 1,
            'company_id' => 1
        ]);
    }
}
