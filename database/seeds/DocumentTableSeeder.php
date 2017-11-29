<?php

use Illuminate\Database\Seeder;
use VirtualExpo\Document;

class DocumentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Document::truncate();
        Schema::enableForeignKeyConstraints();

        Document::create([
            'name' => 'Marketing Document',
            'path' => 'documents/marketing.txt',
            'company_id' => 1
        ]);
    }
}
