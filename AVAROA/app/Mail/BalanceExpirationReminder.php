<?php

namespace App\Mail;

use App\Models\Wallet;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BalanceExpirationReminder extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public Wallet $wallet;
    public int $daysRemaining;

    /**
     * Create a new message instance.
     */
    public function __construct(Wallet $wallet, int $daysRemaining)
    {
        $this->wallet = $wallet;
        $this->daysRemaining = $daysRemaining;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: '⏳ Recordatorio: Tu saldo expira en ' . $this->daysRemaining . ' días',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.balance_reminder',
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
