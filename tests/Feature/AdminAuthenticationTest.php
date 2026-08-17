<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminAuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_can_view_login_page(): void
    {
        $this->get('/admin/login')
            ->assertOk()
            ->assertSee('Gérant')
            ->assertSee('Commercial')
            ->assertSee('Chef Chantier')
            ->assertSee('Facturation');
    }

    public function test_active_user_can_log_in_with_login_and_password(): void
    {
        $user = User::factory()->create([
            'login' => 'admin',
            'password' => 'secret-password',
        ]);

        $this->post('/admin/login', [
            'role' => 'manager',
            'login' => 'admin',
            'password' => 'secret-password',
        ])->assertRedirect(route('admin.dashboard'));

        $this->assertAuthenticatedAs($user);
    }

    public function test_inactive_user_cannot_access_admin(): void
    {
        User::factory()->create([
            'login' => 'blocked',
            'password' => 'secret-password',
            'status' => 'inactive',
        ]);

        $this->post('/admin/login', [
            'role' => 'manager',
            'login' => 'blocked',
            'password' => 'secret-password',
        ])->assertSessionHasErrors('login');

        $this->assertGuest();
    }

    public function test_user_cannot_log_in_with_wrong_role(): void
    {
        User::factory()->create([
            'login' => 'commercial-user',
            'password' => 'secret-password',
            'role' => 'commercial',
        ]);

        $this->post('/admin/login', [
            'role' => 'manager',
            'login' => 'commercial-user',
            'password' => 'secret-password',
        ])->assertSessionHasErrors('login');

        $this->assertGuest();
    }

    public function test_guest_is_redirected_from_dashboard(): void
    {
        $this->get('/admin')->assertRedirect('/admin/login');
    }

    public function test_authenticated_user_can_log_out(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->post('/admin/deconnexion')
            ->assertRedirect(route('login'));

        $this->assertGuest();
    }
}
