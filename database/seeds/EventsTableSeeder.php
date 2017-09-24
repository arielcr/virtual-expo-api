<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('events')->truncate();
        Schema::enableForeignKeyConstraints();
        
        $events = [
            [
                'name' => 'International Builders Show', 
                'description' => 'The International Builders’ Show is organized by the National Association of Home Builders (NAHB) and is the largest light construction building industry tradeshow in the United States.', 
                'ticket_price' => 7, 
                'image' => 'images/events/1.jpg',
                'location_id' => 1
            ],
            [
                'name' => 'Outdoor Retailer Winter Market', 
                'description' => 'The Outdoor Retailer2 Winter Market is a popular outdoor and winter sports gear trade show. The event features hundreds of outdoor industry manufacturers.', 
                'ticket_price' => 10, 
                'image' => 'images/events/2.jpg',
                'location_id' => 9
            ],
            [
                'name' => 'Kitchen/Bath Industry Show', 
                'description' => 'KBIS, in conjunction with the National Kitchen and Bath Association (NKBA) is an inspiring, interactive platform that showcases the latest industry products, trends and technologies.', 
                'ticket_price' => 5, 
                'image' => 'images/events/3.jpg',
                'location_id' => 3
            ],
            [
                'name' => 'Consumer Electronics Show', 
                'description' => 'The International Consumer Electronics Show (CES) is a major technology-related Trade Show held each January in the Las Vegas Convention Center, Las Vegas, Nevada.', 
                'ticket_price' => 15, 
                'image' => 'images/events/4.jpg',
                'location_id' => 6
            ],
            [
                'name' => 'AHR Expo', 
                'description' => 'Over 1,800 leading manufacturers and innovative new suppliers attend the Air Conditioning Heating, & Refrigeration Exposition (AHR Expo) to showcase their latest products and systems.', 
                'ticket_price' => 20, 
                'image' => 'images/events/5.jpg',
                'location_id' => 5
            ],
            [
                'name' => 'World of Concrete', 
                'description' => 'The World of Concrete is an international trade show for the commercial concrete and masonry construction industries. The show attracts over 55,000 attendees and 1,400 exhibitors every year.', 
                'ticket_price' => 17, 
                'image' => 'images/events/6.jpg',
                'location_id' => 4
            ],
            [
                'name' => 'SHOT Show', 
                'description' => 'The Shooting, Hunting, Outdoor Trade Show (SHOT Show) and Conference is the largest and most comprehensive trade show for all professionals involved with the shooting sports.', 
                'ticket_price' => 12, 
                'image' => 'images/events/7.jpg',
                'location_id' => 7
            ],
            [
                'name' => 'PGA Merchandise Show', 
                'description' => 'The PGA Merchandise Show has evolved into comprehensive multi-purpose business platform providing a snap shot of the Golf industry as a whole.', 
                'ticket_price' => 10, 
                'image' => 'images/events/8.jpg',
                'location_id' => 8
            ],
            [
                'name' => 'National Association of Music Merchants', 
                'description' => 'NAMMs mission is to strengthen the music products industry and promote the pleasures and benefits of making music.', 
                'ticket_price' => 14, 
                'image' => 'images/events/9.jpg',
                'location_id' => 2
            ],
            [
                'name' => 'International Production and Processing Expo', 
                'description' => 'The International Production & Processing Expo is the world’s largest annual poultry, meat and feed industry event of its kind.', 
                'ticket_price' => 12, 
                'image' => 'images/events/10.jpg',
                'location_id' => 10
            ],
        ];

        DB::table('events')->insert($events);
    }
}
