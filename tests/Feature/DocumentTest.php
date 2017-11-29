<?php

namespace Tests\Feature;

use VirtualExpo\User;
use VirtualExpo\Document;
use VirtualExpo\Company;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DocumentTest extends TestCase
{
    public function test_it_can_create_a_document()
    {
        $user = factory(User::class)->create();
        $token = $user->generateToken();
        $headers = ['Authorization' => "Bearer $token"];
        $company = factory(Company::class)->create();

        $payload = [
            'name' => 'Lorem',
            'path' => 'documents/marketing.txt',
            'company_id' => $company->id
        ];

        $this->json('POST', '/api/documents', $payload, $headers)
            ->assertStatus(201)
            ->assertJson([
                'name' => 'Lorem',
                'path' => 'documents/marketing.txt',
                'company_id' => $company->id
            ]);
    }

    public function test_it_can_update_a_document()
    {
        $user = factory(User::class)->create();
        $token = $user->generateToken();
        $headers = ['Authorization' => "Bearer $token"];
        $company = factory(Company::class)->create();

        $document = factory(Document::class)->create([
            'company_id' => $company->id
        ]);

        $payload = [
            'name' => 'Lorem',
            'path' => 'Ipsum',
        ];

        $response = $this->json('PUT', '/api/documents/' . $document->id, $payload, $headers)
            ->assertStatus(200)
            ->assertJson([
                'name' => 'Lorem',
                'path' => 'Ipsum',
            ]);
    }

    public function test_it_can_delete_a_document()
    {
        $user = factory(User::class)->create();
        $token = $user->generateToken();
        $headers = ['Authorization' => "Bearer $token"];
        $company = factory(Company::class)->create();

        $document = factory(Document::class)->create([
            'company_id' => $company->id
        ]);

        $this->json('DELETE', '/api/documents/' . $document->id, [], $headers)
            ->assertStatus(200);
    }

    public function test_it_can_get_the_documents()
    {
        $company = factory(Company::class)->create();

        factory(Document::class)->create([
            'company_id' => $company->id
        ]);

        $user = factory(User::class)->create();
        $token = $user->generateToken();
        $headers = ['Authorization' => "Bearer $token"];

        $response = $this->json('GET', '/api/documents', [], $headers)
            ->assertStatus(200)
            ->assertJsonStructure([
                '*' => [
                    'id',
                    'name',
                    'path',
                    'company_id',
                    'company'
                ],
            ]);

    }

    public function test_it_can_get_a_document()
    {
        $company = factory(Company::class)->create();

        $document = factory(Document::class)->create([
            'company_id' => $company->id
        ]);

        $user = factory(User::class)->create();
        $token = $user->generateToken();
        $headers = ['Authorization' => "Bearer $token"];

        $response = $this->json('GET', '/api/documents/' . $document->id, [], $headers)
            ->assertStatus(200)
            ->assertJsonStructure([
                'id',
                'name',
                'path',
                'company_id',
                'company'
                ]);
    }
}
