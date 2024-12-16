<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;

class PasswordResetTest extends TestCase
{
    use RefreshDatabase;

    // public function test_reset_password_link_screen_can_be_rendered(): void
    // {
    //     $response = $this->get('/forgot-password');

    //     $response->assertStatus(200);
    // }

    // public function test_reset_password_link_can_be_requested()
    // {
    //     // Fake notifikasi agar tidak benar-benar mengirim email
    //     Notification::fake();

    //     // Membuat user untuk menguji reset password
    //     $user = User::factory()->create();

    //     // Mengirim permintaan reset password
    //     $response = $this->post('/forgot-password', ['email' => $user->email]);

    //     // Memastikan notifikasi ResetPassword dikirim ke user
    //     Notification::assertSentTo($user, ResetPassword::class);

    //     // Memastikan redirect atau status yang sesuai
    //     $response->assertStatus(302);
    //     $response->assertRedirect('/');
    // }

    // public function test_reset_password_screen_can_be_rendered(): void
    // {
    //     Notification::fake();

    //     $user = User::factory()->create();

    //     $this->post('/forgot-password', ['email' => $user->email]);

    //     Notification::assertSentTo($user, ResetPassword::class, function ($notification) {
    //         $response = $this->get('/reset-password/'.$notification->token);

    //         $response->assertStatus(200);

    //         return true;
    //     });
    // }

    // public function test_password_can_be_reset_with_valid_token()
    // {
    //     // Fake notifikasi
    //     Notification::fake();

    //     // Membuat user dan mengirim permintaan reset password
    //     $user = User::factory()->create();
    //     $this->post('/forgot-password', ['email' => $user->email]);

    //     // Mendapatkan token reset dari database
    //     $token = \DB::table('password_resets')->where('email', $user->email)->first()->token;

    //     // Mengirimkan data untuk mereset password
    //     $response = $this->post('/reset-password', [
    //         'token' => $token,
    //         'email' => $user->email,
    //         'password' => 'newpassword', // password baru
    //         'password_confirmation' => 'newpassword', // konfirmasi password baru
    //     ]);

    //     // Memastikan tidak ada error dan redirect ke halaman login
    //     $response->assertSessionHasNoErrors();
    //     $response->assertRedirect(route('login'));

    //     // Memastikan password baru disimpan dengan benar
    //     $this->assertTrue(\Hash::check('newpassword', $user->fresh()->password));
    // }
}
