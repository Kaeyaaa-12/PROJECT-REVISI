<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Lang;

class AdminResetPasswordNotification extends Notification
{
    use Queueable;

    public $token;

    public function __construct($token)
    {
        $this->token = $token;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        // [INI BAGIAN PENTING] Menggunakan route 'admin.password.reset'
        $url = url(route('admin.password.reset', [
            'token' => $this->token,
            'email' => $notifiable->getEmailForPasswordReset(),
        ], false));

        return (new MailMessage)
            ->subject('Notifikasi Reset Password')
            ->greeting('Halo Admin!')
            ->line('Kami menerima permintaan untuk mereset password akun Anda.')
            ->action('Reset Password Sekarang', $url)
            ->line('Link reset password ini hanya berlaku selama: ' . config('auth.passwords.admins.expire') . ' Menit.')
            ->line('Jika Anda tidak meminta reset password, abaikan email ini. Tetap jaga keamanan akun Anda!');
    }
}