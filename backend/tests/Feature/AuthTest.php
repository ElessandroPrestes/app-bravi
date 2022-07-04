<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Database\Eloquent\Factories\Factory;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AuthTest extends TestCase
{

    use DatabaseMigrations;

    /**@test */
    public function required_fields_for_registration()
    {
        $this->json('POST', 'api/register', ['Accept' => 'application/json'])
        ->assertStatus(422)
            ->assertJson([
                "message" => "The given data was invalid.",
                "errors" => [
                    "name" => ["The name field is required."],
                    "email" => ["The email field is required."],
                    "password" => ["The password field is required."],
                ]
            ]);
    }

    /**@test */
    public function repeat_password()
    {
        $data = [
            "name" => "Thor Borson",
            "email" => "thor@marvel.com",
            "password" => "vingadormaisforte",
        ];

        $this->json('POST', 'api/register', $data, ['Accept' => 'application/json'])
            ->assertStatus(422)
            ->assertJson([
                "message" => "The given data was invalid.",
                "errors" => [
                    "password" => ["The password confirmation does not match."]
                ]
        ]);
    }

    /** @test */
    public function successful_registration()
    {
        $data = [
            "name" => "Thor Borson",
            "email" => "thor@marvel.com",
            "password" => "vingadormaisforte",
        ];

        $this->json('POST', 'api/register', $data, ['Accept' => 'application/json'])
        ->assertStatus(201)
            ->assertJsonStructure([
                'user' => [
                    'id',
                    'name',
                    'email',
                    'created_at',
                    'updated_at',
                ],
                "access_token",
                "message"
            ]);
    }

    /** @test */
    public function must_enter_email_and_password()
    {
        $this->json('POST', 'api/login')
        ->assertStatus(422)
            ->assertJson([
                "message" => "The given data was invalid.",
                "errors" => [
                    'email' => ["The email field is required."],
                    'password' => ["The password field is required."],
                ]
            ]);
    }

    /** @test */
    public function successful_login()
    {

        $user = User::factory()->create([
            'email' => 'thor@marvel.com',
            'password' => bcrypt('vingadormaisforte'),
        ]);
        
        $login = ['email' => 'thor@marvel.com', 'password' => 'vingadormaisforte'];

        $this->json('POST', 'api/login', $login, ['Accept' => 'application/json'])
        ->assertStatus(200)
            ->assertJsonStructure([
                "user" => [
                    'id',
                    'name',
                    'email',
                    'email_verified_at',
                    'created_at',
                    'updated_at',
                ],
                "access_token",
                "message"
            ]);

        $this->assertAuthenticated();
    }
}
