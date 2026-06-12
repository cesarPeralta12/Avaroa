<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\URL;
use App\Models\MailTemplate;

class VerifyEmailNotification extends Notification
{
    use Queueable;

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        $template = MailTemplate::where('alias', 'email_verification')->first();

        // ONLY THIS PART CHANGED — Simple & working URL
        $url = URL::temporarySignedRoute(
            'verify.email.simple',     // ← matches your working route
            now()->addHours(24),
            ['id' => $notifiable->id]
        );

        // Keep your template system (safe fallback)
        if (!$template) {
            return (new MailMessage)
                ->subject('Verify Your Email - F Standard')
                ->line('Click below to verify and log in:')
                ->action('Verify & Continue', $url);
        }

        return (new MailMessage)
            ->subject($template->subject ?? 'Verify Your Email')
            ->markdown('emails.default', [
                'body' => $template->body,
                'short_codes' => [
                    '{{link}}' => $url,
                    '{{website_name}}' => 'F Standard',
                ],
            ]);
    }
}
