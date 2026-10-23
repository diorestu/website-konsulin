<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Inertia\Testing\AssertableInertia as Assert;
use Tests\TestCase;

class AdminPanelTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_accounts_are_created_only_through_the_console(): void
    {
        $this->artisan('admin:create', ['--name' => 'Admin Konsulin', '--email' => 'admin@konsulingroup.com'])
            ->expectsQuestion('Password (minimal 12 karakter, mengandung huruf dan angka)', 'Strong-Passphrase-2026!')
            ->expectsQuestion('Ulangi password', 'Strong-Passphrase-2026!')
            ->assertExitCode(0);
        $admin = User::where('email', 'admin@konsulingroup.com')->firstOrFail();
        $this->assertTrue($admin->is_admin);
        $this->assertTrue(Hash::check('Strong-Passphrase-2026!', $admin->password));
        $this->post('/admin/register', [])->assertNotFound();
    }

    public function test_guests_cannot_read_or_modify_admin_data(): void
    {
        foreach (['/admin', '/admin/services', '/admin/settings', '/admin/consultations', '/admin/account'] as $path) {
            $this->get($path)->assertRedirect('/admin/login');
        }
        $this->put('/admin/settings', [])->assertRedirect('/admin/login');
    }

    public function test_regular_users_cannot_access_the_panel_or_sign_in_as_admin(): void
    {
        $user = User::factory()->create();
        $this->post('/admin/login', ['email' => $user->email, 'password' => 'password'])->assertSessionHasErrors('email');
        $this->assertGuest();
        $this->actingAs($user)->get('/admin')->assertForbidden();
        $this->put('/admin/settings', [])->assertForbidden();
    }

    public function test_admin_can_log_in_and_out(): void
    {
        $this->withoutVite();
        $admin = User::factory()->create(['is_admin' => true]);
        $this->get('/admin/login')->assertOk()->assertInertia(fn (Assert $page) => $page->component('Admin/Login'));
        $this->post('/admin/login', ['email' => $admin->email, 'password' => 'password'])->assertRedirect('/admin');
        $this->assertAuthenticatedAs($admin);
        $this->get('/admin')->assertOk()->assertInertia(fn (Assert $page) => $page->component('Admin/Dashboard'));
        $this->post('/admin/logout')->assertRedirect('/admin/login');
        $this->assertGuest();
    }

    public function test_failed_login_is_rate_limited(): void
    {
        for ($i = 0; $i < 5; $i++) {
            $this->post('/admin/login', ['email' => 'unknown@example.test', 'password' => 'incorrect'])->assertSessionHasErrors('email');
        }
        $this->post('/admin/login', ['email' => 'unknown@example.test', 'password' => 'incorrect'])->assertStatus(429);
    }

    public function test_admin_can_filter_read_and_update_consultations(): void
    {
        $this->withoutVite();
        $this->actingAs(User::factory()->create(['is_admin' => true]));
        $id = DB::table('consultation_requests')->insertGetId([
            'name' => 'Calon Klien', 'email' => 'client@example.test', 'service' => 'perpajakan',
            'message' => 'Butuh pembahasan pajak bulanan.', 'consented_at' => now(), 'status' => 'new',
            'created_at' => now(), 'updated_at' => now(),
        ]);
        $this->get('/admin/consultations?search=Calon')->assertOk()->assertInertia(fn (Assert $page) => $page
            ->has('consultations.data', 1)->where('consultations.data.0.name', 'Calon Klien'));
        $this->get('/admin/consultations/'.$id)->assertOk()->assertInertia(fn (Assert $page) => $page
            ->where('consultation.message', 'Butuh pembahasan pajak bulanan.'));
        $this->patch('/admin/consultations/'.$id, ['status' => 'completed'])->assertSessionHasNoErrors();
        $this->assertDatabaseHas('consultation_requests', ['id' => $id, 'status' => 'completed']);
        $this->patch('/admin/consultations/'.$id, ['status' => 'invalid'])->assertSessionHasErrors('status');
        $this->get('/admin/consultations?status=new')->assertInertia(fn (Assert $page) => $page->has('consultations.data', 0));
    }

    public function test_password_change_requires_the_current_password(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);
        $this->actingAs($admin)->put('/admin/account/password', [
            'current_password' => 'incorrect', 'password' => 'Strong-Passphrase-2026!', 'password_confirmation' => 'Strong-Passphrase-2026!',
        ])->assertSessionHasErrors('current_password');
        $this->put('/admin/account/password', [
            'current_password' => 'password', 'password' => 'Strong-Passphrase-2026!', 'password_confirmation' => 'Strong-Passphrase-2026!',
        ])->assertSessionHasNoErrors();
        $this->assertTrue(Hash::check('Strong-Passphrase-2026!', $admin->fresh()->password));
    }
}
