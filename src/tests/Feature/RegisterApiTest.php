<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;

class RegisterApiTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function shouldRegisterUsers()
    {
        $data = [
            'name' => 'test username',
            'email' => 'test@gmail.com',
            'password' => 'password',
            'password_confirmation' => 'password'
        ];

        $response = $this-json('POST', route('register', $data));

        $user = User::first();
        $this->assertEquals($data['name'], $user->name);

        $response->assertStatus(201)
            ->assertJson(['name' => $user->name]);
    }
}
