<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use App\Models\Withdrawal;

class WithdrawalStatusChanged extends Notification
{
    use Queueable;

    protected $withdrawal;
    protected $action;

    public function __construct(Withdrawal $withdrawal, string $action)
    {
        $this->withdrawal = $withdrawal;
        $this->action = $action;
    }

    public function via($notifiable)
    {
        return ['database']; // You can add 'mail' later
    }

    public function toArray($notifiable)
    {
        $statusText = match($this->action) {
            'approved'  => 'approved',
            'rejected'  => 'rejected',
            'processed' => 'processed successfully',
            default     => 'updated',
        };

        return [
            'withdrawal_id' => $this->withdrawal->id,
            'amount'        => $this->withdrawal->final_amount,
            'status'        => $statusText,
            'message'       => "Your withdrawal request #{$this->withdrawal->id} (₹{$this->withdrawal->final_amount}) has been {$statusText}.",
            'icon'          => match($this->action) {
                'approved'  => 'check-circle',
                'rejected'  => 'times-circle',
                'processed' => 'check-double',
                default     => 'info-circle',
            }
        ];
    }

    // Optional: Email version
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Withdrawal Status Update #' . $this->withdrawal->id)
            ->greeting('Hello ' . $notifiable->name . '!')
            ->line("Your withdrawal request of ₹{$this->withdrawal->final_amount} has been **{$this->action}**.")
            ->action('View Withdrawal History', route('user.withdrawals.history'))
            ->line('Thank you for using our platform!');
    }
}
