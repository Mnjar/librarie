<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    // Menguji register
    public function test_user_can_register()
    {
        $response = $this->post('/register', [
            'name' => 'John Doe',
            'username' => 'John',
            'email' => 'john@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ], [
            'X-CSRF-TOKEN' => csrf_token(), // Menambahkan CSRF token
        ]);

        $response->assertStatus(302); // Redirect after successful registration
        $this->assertDatabaseHas('users', [
            'email' => 'john@example.com',
        ]);
    }

    public function test_user_can_login()
    {
        $user = User::factory()->create([
            'password' => bcrypt('password123'),
        ]);

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password123',
        ], [
            'X-CSRF-TOKEN' => csrf_token(), // Menambahkan CSRF token
        ]);

        $response->assertStatus(302); // Redirect after successful login
        $this->assertAuthenticatedAs($user);
    }


    // Menguji validasi input saat register
    public function test_register_requires_valid_data()
    {
        $response = $this->post('/register', [
            'name' => 'John Doe',
            'username' => 'John',
            'email' => 'invalid-email',
            'password' => 'short',
            'password_confirmation' => 'short',
        ]);

        $response->assertSessionHasErrors(['email', 'password']);
    }
}
