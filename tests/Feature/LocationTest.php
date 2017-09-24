<?php

namespace Tests\Feature;

use VirtualExpo\User;
use VirtualExpo\Location;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LocationTest extends TestCase
{
    public function test_it_can_create_a_location()
    {
        $user = factory(User::class)->create();
        $token = $user->generateToken();
        $headers = ['Authorization' => "Bearer $token"];
        $payload = [
            'name' => 'Lorem',
            'address' => 'Ipsum',
            'latitude' => '100',
            'longitude' => '200',
            'state_id' => 1,
        ];

        $this->json('POST', '/api/locations', $payload, $headers)
            ->assertStatus(201)
            ->assertJson([
                'name' => 'Lorem',
                'address' => 'Ipsum',
                'latitude' => '100',
                'longitude' => '200',
                'state_id' => 1,
            ]);
    }

    public function test_it_can_update_a_location()
    {
        $user = factory(User::class)->create();
        $token = $user->generateToken();
        $headers = ['Authorization' => "Bearer $token"];
        $location = factory(Location::class)->create();

        $payload = [
            'name' => 'Lorem',
            'address' => 'Ipsum',
        ];

        $response = $this->json('PUT', '/api/locations/' . $location->id, $payload, $headers)
            ->assertStatus(200)
            ->assertJson([
                'name' => 'Lorem',
                'address' => 'Ipsum',
            ]);
    }

    public function test_it_can_delete_a_location()
    {
        $user = factory(User::class)->create();
        $token = $user->generateToken();
        $headers = ['Authorization' => "Bearer $token"];
        $location = factory(Location::class)->create();

        $this->json('DELETE', '/api/locations/' . $location->id, [], $headers)
            ->assertStatus(200);
    }

    public function test_it_can_get_the_locations()
    {
        factory(Location::class)->create();

        $user = factory(User::class)->create();
        $token = $user->generateToken();
        $headers = ['Authorization' => "Bearer $token"];

        $response = $this->json('GET', '/api/locations', [], $headers)
            ->assertStatus(200)
            ->assertJsonStructure([
                '*' => [
                    'id',
                    'name',
                    'address',
                    'latitude',
                    'longitude',
                    'state_id',
                    'state'
                ],
            ]);
    }

    public function test_it_can_get_a_location()
    {
        $location = factory(Location::class)->create();

        $user = factory(User::class)->create();
        $token = $user->generateToken();
        $headers = ['Authorization' => "Bearer $token"];

        $response = $this->json('GET', '/api/locations/' . $location->id, [], $headers)
            ->assertStatus(200)
            ->assertJsonStructure([
                'id',
                'name',
                'address',
                'latitude',
                'longitude',
                'state_id',
                'state'
                ]);
    }
}
