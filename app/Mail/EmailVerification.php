<?php

declare(strict_types=1);

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

final class EmailVerification extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public string $verificationUrl, public ?string $recipientEmail = null) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Verify Your Email Address',
            to: $this->recipientEmail ? [new Address($this->recipientEmail)] : null,
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'emails.verification',
            with: ['url' => $this->verificationUrl],
        );
    }
}
