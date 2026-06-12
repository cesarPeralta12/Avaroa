<?php

namespace App\Notifications;

use App\Models\Ticket;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TicketCreated extends Notification
{
    use Queueable;

    protected $ticket;

    /**
     * Create a new notification instance.
     *
     * @param  Ticket  $ticket
     * @return void
     */
    public function __construct(Ticket $ticket)
    {
        $this->ticket = $ticket;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Send mail to both admin and sender simultaneously.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        // Common subject for both the admin and the sender
        $subject = 'Ticket Creado';

        // If the notifiable is the admin (gen@negociosgen.com)
        if ($notifiable->email == 'gen@negociosgen.com') {
            // Admin email
            return (new MailMessage)
                ->subject($subject) // Set the subject in Spanish
                ->greeting('Hola,')
                ->line('Un nuevo ticket ha sido creado con el siguiente asunto: ' . $this->ticket->subject)
                ->line('Ticket creado por: ' . $this->ticket->name)
                ->line('Puedes ver el ticket y su progreso haciendo clic en el siguiente enlace:')
                ->action('Ver Ticket', url('/admin/support-ticket/show/' . $this->ticket->uuid))
                ->line('Gracias por usar nuestra aplicación!');
        }

        // If the notifiable is the ticket sender
        return (new MailMessage)
            ->subject($subject) // Set the subject in Spanish
            ->greeting('Hola ' . $this->ticket->name . ',')
            ->line('Gracias por crear un nuevo ticket. El asunto de tu ticket es: ' . $this->ticket->subject)
            ->line('Puedes ver el progreso de tu ticket haciendo clic en el siguiente enlace:')
            ->action('Ver Ticket', url('/show/' . $this->ticket->uuid))
            ->line('Gracias por usar nuestra aplicación!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'ticket_id' => $this->ticket->uuid,
            'subject' => $this->ticket->subject,
            'status' => $this->ticket->status,
        ];
    }
}
