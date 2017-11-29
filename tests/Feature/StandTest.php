<?php

namespace Tests\Feature;

use VirtualExpo\User;
use VirtualExpo\Stand;
use VirtualExpo\Company;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class StandTest extends TestCase
{
    public function test_it_can_create_a_stand()
    {
        $user = factory(User::class)->create();
        $token = $user->generateToken();
        $headers = ['Authorization' => "Bearer $token"];
        $payload = [
            'code' => '1', 
            'booked' => 0,
            'free' => 0,
            'price' => '100',
            'image' => 'image.jpg',
            'event_id' => 1
        ];

        $this->json('POST', '/api/stands', $payload, $headers)
            ->assertStatus(201)
            ->assertJson([
                'code' => '1', 
                'booked' => 0,
                'free' => 0,
                'price' => '100',
                'image' => 'image.jpg',
                'event_id' => 1
            ]);
    }

    public function test_it_can_book_a_stand()
    {
        $user = factory(User::class)->create();
        $token = $user->generateToken();
        $headers = ['Authorization' => "Bearer $token"];

        $stand = factory(Stand::class)->create();
        $company = factory(Company::class)->create();

        $payload = [
            'booked' => 1,
            'company_id' => $company->id,
        ];

        $response = $this->json('PUT', '/api/stands/' . $stand->id, $payload, $headers)
            ->assertStatus(200)
            ->assertJson([
                'booked' => 1,
                'company_id' => $company->id,
            ]);
    }

    public function test_it_can_delete_a_stand()
    {
        $user = factory(User::class)->create();
        $token = $user->generateToken();
        $headers = ['Authorization' => "Bearer $token"];
        $stand = factory(Stand::class)->create();

        $this->json('DELETE', '/api/stands/' . $stand->id, [], $headers)
            ->assertStatus(200);
    }

    public function test_it_can_get_the_stands()
    {
        factory(Stand::class)->create();

        $user = factory(User::class)->create();
        $token = $user->generateToken();
        $headers = ['Authorization' => "Bearer $token"];

        $response = $this->json('GET', '/api/stands', [], $headers)
            ->assertStatus(200)
            ->assertJsonStructure([
                '*' => [
                    'id',
                    'code',
                    'booked',
                    'free',
                    'price',
                    'image',
                    'event_id',
                    'company_id',
                    'company',
                    'visitors'
                ],
            ]);
    }

    public function test_it_can_get_a_stand()
    {
        $stand = factory(Stand::class)->create();

        $user = factory(User::class)->create();
        $token = $user->generateToken();
        $headers = ['Authorization' => "Bearer $token"];

        $response = $this->json('GET', '/api/stands/' . $stand->id, [], $headers)
            ->assertStatus(200)
            ->assertJsonStructure([
                'id',
                'code',
                'booked',
                'free',
                'price',
                'image',
                'event_id',
                'company_id',
                'company',
                'visitors'
                ]);
    }
}
