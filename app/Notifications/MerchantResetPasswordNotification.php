<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Auth\Notifications\ResetPassword;

class MerchantResetPasswordNotification extends ResetPassword
{
    public function toMail($notifiable)
    {
        $url = route('merchant.password.reset', [
            'token' => $this->token,
            'email' => $notifiable->email,
        ]);

        return (new MailMessage)
            ->subject('إعادة تعيين كلمة المرور')
            ->line('لقد استلمنا طلب إعادة تعيين كلمة المرور لحسابك.')
            ->action('إعادة تعيين كلمة المرور', $url)
            ->line('إذا لم تطلب إعادة تعيين كلمة المرور، فلا داعي لاتخاذ أي إجراء.');
    }
}
