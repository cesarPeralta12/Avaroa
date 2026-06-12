<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class QuotationReceived extends Mailable
{
    use Queueable, SerializesModels;

    public $userEmail;

    public function __construct($userEmail)
    {
        $this->userEmail = $userEmail;
    }

    public function build()
    {
        return $this->subject('Tu solicitud ha sido recibida')
                    ->view('emails.quotation_received');
    }
}
