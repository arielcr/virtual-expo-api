<?php

use Illuminate\Database\Seeder;
use VirtualExpo\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        $password = Hash::make('vExpAdmin85');

        User::create([
            'name' => 'Administrator',
            'email' => 'admin@virtualexpo.dev',
            'password' => $password,
        ]);
    }
}
