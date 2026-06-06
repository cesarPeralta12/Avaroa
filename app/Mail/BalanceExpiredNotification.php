<?php

namespace App\Mail;

use App\Models\Wallet;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BalanceExpiredNotification extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public Wallet $wallet;
    public float $expiredAmount;

    /**
     * Create a new message instance.
     */
    public function __construct(Wallet $wallet, float $expiredAmount)
    {
        $this->wallet = $wallet;
        $this->expiredAmount = $expiredAmount;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: '⚠️ Tu saldo ha expirado por inactividad',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.balance_expired',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
