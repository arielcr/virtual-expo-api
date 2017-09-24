<?php

namespace Tests\Feature;

use VirtualExpo\User;
use VirtualExpo\Event;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EventTest extends TestCase
{
    public function test_it_can_create_an_event()
    {
        $user = factory(User::class)->create();
        $token = $user->generateToken();
        $headers = ['Authorization' => "Bearer $token"];
        $payload = [
            'name' => 'Lorem',
            'description' => 'Ipsum',
            'ticket_price' => 400,
            'image' => 'image.jpg',
            'location_id' => 1,
        ];

        $this->json('POST', '/api/events', $payload, $headers)
            ->assertStatus(201)
            ->assertJson([
                'name' => 'Lorem',
                'description' => 'Ipsum',
                'ticket_price' => 400,
                'image' => 'image.jpg',
                'location_id' => 1,
            ]);
    }

    public function test_it_can_update_an_event()
    {
        $user = factory(User::class)->create();
        $token = $user->generateToken();
        $headers = ['Authorization' => "Bearer $token"];
        $event = factory(Event::class)->create();

        $payload = [
            'name' => 'Lorem',
            'description' => 'Ipsum',
        ];

        $response = $this->json('PUT', '/api/events/' . $event->id, $payload, $headers)
            ->assertStatus(200)
            ->assertJson([
                'name' => 'Lorem',
                'description' => 'Ipsum',
            ]);
    }

    public function test_it_can_delete_an_event()
    {
        $user = factory(User::class)->create();
        $token = $user->generateToken();
        $headers = ['Authorization' => "Bearer $token"];
        $event = factory(Event::class)->create();

        $this->json('DELETE', '/api/events/' . $event->id, [], $headers)
            ->assertStatus(200);
    }

    public function test_it_can_get_the_events()
    {
        factory(Event::class)->create();

        $user = factory(User::class)->create();
        $token = $user->generateToken();
        $headers = ['Authorization' => "Bearer $token"];

        $response = $this->json('GET', '/api/events', [], $headers)
            ->assertStatus(200)
            ->assertJsonStructure([
                '*' => [
                    'id',
                    'name',
                    'description',
                    'ticket_price',
                    'image',
                    'location_id',
                    'location',
                    'dates'
                ],
            ]);
    }

    public function test_it_can_get_an_event()
    {
        $event = factory(Event::class)->create([
            'name' => 'First Event',
            'description' => 'First Description',
        ]);

        $user = factory(User::class)->create();
        $token = $user->generateToken();
        $headers = ['Authorization' => "Bearer $token"];

        $response = $this->json('GET', '/api/events/' . $event->id, [], $headers)
            ->assertStatus(200)
            ->assertJsonStructure([
                    'id',
                    'name',
                    'description',
                    'ticket_price',
                    'image',
                    'location_id',
                    'location',
                    'dates',
                    'stands'
                ]);
    }
}
