<?php

namespace Tests\Feature;

use VirtualExpo\User;
use VirtualExpo\Company;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CompanyTest extends TestCase
{
    public function test_it_can_create_a_company()
    {
        $user = factory(User::class)->create();
        $token = $user->generateToken();
        $headers = ['Authorization' => "Bearer $token"];
        $payload = [
            'name' => 'Lorem',
            'description' => 'Ipsum',
            'logo' => 'logo.jpg'
        ];

        $this->json('POST', '/api/companies', $payload, $headers)
            ->assertStatus(201)
            ->assertJson([
                'name' => 'Lorem',
                'description' => 'Ipsum',
                'logo' => 'logo.jpg'
            ]);
    }

    public function test_it_can_update_a_company()
    {
        $user = factory(User::class)->create();
        $token = $user->generateToken();
        $headers = ['Authorization' => "Bearer $token"];
        $company = factory(Company::class)->create();

        $payload = [
            'name' => 'Lorem',
            'description' => 'Ipsum',
        ];

        $response = $this->json('PUT', '/api/companies/' . $company->id, $payload, $headers)
            ->assertStatus(200)
            ->assertJson([
                'name' => 'Lorem',
                'description' => 'Ipsum',
            ]);
    }

    public function test_it_can_delete_a_company()
    {
        $user = factory(User::class)->create();
        $token = $user->generateToken();
        $headers = ['Authorization' => "Bearer $token"];
        $company = factory(Company::class)->create();

        $this->json('DELETE', '/api/companies/' . $company->id, [], $headers)
            ->assertStatus(200);
    }

    public function test_it_can_get_the_companies()
    {
        factory(Company::class)->create();

        $user = factory(User::class)->create();
        $token = $user->generateToken();
        $headers = ['Authorization' => "Bearer $token"];

        $response = $this->json('GET', '/api/companies', [], $headers)
            ->assertStatus(200)
            ->assertJsonStructure([
                '*' => [
                    'id',
                    'name',
                    'description',
                    'logo',
                    'documents',
                    'contacts',
                    'stands'
                ],
            ]);
    }

    public function test_it_can_get_a_company()
    {
        $company = factory(Company::class)->create();

        $user = factory(User::class)->create();
        $token = $user->generateToken();
        $headers = ['Authorization' => "Bearer $token"];

        $response = $this->json('GET', '/api/companies/' . $company->id, [], $headers)
            ->assertStatus(200)
            ->assertJsonStructure([
                'id',
                'name',
                'description',
                'logo',
                'documents',
                'contacts',
                'stands'
                ]);
    }
}
