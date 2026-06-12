<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class QuotationMail extends Mailable {
    use Queueable, SerializesModels;

    public $quotation;

    public function __construct($quotation) {
        $this->quotation = $quotation;
    }

    public function build() {
        return $this->subject('Nuevo pedido de cotización')
                    ->view('emails.quotation')
                    ->with(['quotation' => $this->quotation]);
    }
}
