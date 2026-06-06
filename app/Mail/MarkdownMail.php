<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MarkdownMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;     // Data to pass to the view
    public $view;     // View name
    public $subject;  // Subject of the email

    public function __construct($view, $subject, $data = [])
    {
        $this->data = $data;
        $this->view = $view;
        $this->subject = $subject; // Set the subject
    }

    public function build()
    {
        return $this->subject($this->subject)
                    ->markdown($this->view)
                    ->with($this->data);
    }
}
