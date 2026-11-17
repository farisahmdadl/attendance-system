<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test that registration screen can be rendered.
     */
    public function test_registration_screen_can_be_rendered(): void
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
        $response->assertSee('Create account');
        $response->assertSee('Create workspace account');
    }

    /**
     * Test that new users can register.
     */
    public function test_new_users_can_register(): void
    {
        $response = $this->post('/register', [
            'name' => 'Sarah Connor',
            'email' => 'sarah@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ]);

        $this->assertAuthenticated();
        $this->assertDatabaseHas('users', [
            'name' => 'Sarah Connor',
            'email' => 'sarah@example.com',
        ]);
        $response->assertRedirect(route('home', absolute: false));
    }

    /**
     * Test that registration requires name, email, and password.
     */
    public function test_registration_requires_name_email_and_password(): void
    {
        $response = $this->from('/register')->post('/register', [
            'name' => '',
            'email' => '',
            'password' => '',
            'password_confirmation' => '',
        ]);

        $this->assertGuest();
        $response->assertRedirect('/register');
        $response->assertSessionHasErrors(['name', 'email', 'password']);
    }

    /**
     * Test that registration requires matching password confirmation.
     */
    public function test_registration_requires_matching_password_confirmation(): void
    {
        $response = $this->from('/register')->post('/register', [
            'name' => 'Sarah Connor',
            'email' => 'sarah@example.com',
            'password' => 'password123',
            'password_confirmation' => 'different-password',
        ]);

        $this->assertGuest();
        $response->assertSessionHasErrors('password');
    }

    /**
     * Test that registration rejects duplicate email address.
     */
    public function test_registration_rejects_duplicate_email(): void
    {
        User::factory()->create([
            'email' => 'sarah@example.com',
        ]);

        $response = $this->from('/register')->post('/register', [
            'name' => 'Sarah Connor',
            'email' => 'sarah@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ]);

        $this->assertGuest();
        $response->assertSessionHasErrors('email');
    }

    /**
     * Test that authenticated users are redirected from registration screen.
     */
    public function test_authenticated_users_are_redirected_from_registration_screen(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/register');

        $response->assertRedirect(route('home', absolute: false));
    }
}
