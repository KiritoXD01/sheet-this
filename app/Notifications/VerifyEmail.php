<?php

declare(strict_types=1);

namespace App\Notifications;

use App\Mail\EmailVerification;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

final class VerifyEmail extends Notification
{
    use Queueable;

    public function __construct(public string $verificationUrl) {}

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): EmailVerification
    {
        return new EmailVerification(
            $this->verificationUrl,
            $notifiable->email,
        );
    }
}
