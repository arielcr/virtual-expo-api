<?php

namespace Tests\Feature;

use VirtualExpo\User;
use VirtualExpo\Contact;
use VirtualExpo\Company;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ContactTest extends TestCase
{
    public function test_it_can_create_a_contact()
    {
        $user = factory(User::class)->create();
        $token = $user->generateToken();
        $headers = ['Authorization' => "Bearer $token"];
        $company = factory(Company::class)->create();

        $payload = [
            'name' => 'Lorem',
            'email' => 'Ipsum@lorem.com',
            'telephone' => '1111-1111',
            'administrator' => 0,
            'company_id' => $company->id
        ];

        $this->json('POST', '/api/contacts', $payload, $headers)
            ->assertStatus(201)
            ->assertJson([
                'name' => 'Lorem',
                'email' => 'Ipsum@lorem.com',
                'telephone' => '1111-1111',
                'administrator' => 0,
                'company_id' => $company->id
            ]);
    }

    public function test_it_can_update_a_contact()
    {
        $user = factory(User::class)->create();
        $token = $user->generateToken();
        $headers = ['Authorization' => "Bearer $token"];
        $company = factory(Company::class)->create();

        $contact = factory(Contact::class)->create([
            'company_id' => $company->id
        ]);

        $payload = [
            'name' => 'Lorem',
            'email' => 'Ipsum@lorem.com',
        ];

        $response = $this->json('PUT', '/api/contacts/' . $contact->id, $payload, $headers)
            ->assertStatus(200)
            ->assertJson([
                'name' => 'Lorem',
                'email' => 'Ipsum@lorem.com',
            ]);
    }

    public function test_it_can_delete_a_contact()
    {
        $user = factory(User::class)->create();
        $token = $user->generateToken();
        $headers = ['Authorization' => "Bearer $token"];
        $company = factory(Company::class)->create();

        $contact = factory(Contact::class)->create([
            'company_id' => $company->id
        ]);

        $this->json('DELETE', '/api/contacts/' . $contact->id, [], $headers)
            ->assertStatus(200);
    }

    public function test_it_can_get_the_contacts()
    {
        $company = factory(Company::class)->create();

        factory(Contact::class)->create([
            'company_id' => $company->id
        ]);

        $user = factory(User::class)->create();
        $token = $user->generateToken();
        $headers = ['Authorization' => "Bearer $token"];

        $response = $this->json('GET', '/api/contacts', [], $headers)
            ->assertStatus(200)
            ->assertJsonStructure([
                '*' => [
                    'id',
                    'name',
                    'email',
                    'telephone',
                    'administrator',
                    'company_id',
                    'company'
                ],
            ]);

    }

    public function test_it_can_get_a_contact()
    {
        $company = factory(Company::class)->create();

        $contact = factory(Contact::class)->create([
            'company_id' => $company->id
        ]);

        $user = factory(User::class)->create();
        $token = $user->generateToken();
        $headers = ['Authorization' => "Bearer $token"];

        $response = $this->json('GET', '/api/contacts/' . $contact->id, [], $headers)
            ->assertStatus(200)
            ->assertJsonStructure([
                'id',
                'name',
                'email',
                'telephone',
                'administrator',
                'company_id',
                'company'
                ]);
    }
}
