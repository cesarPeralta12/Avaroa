<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ComposeMail extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    public $content;
    public $name; // Add $name variable

    public function __construct($subject, $content, $name) // Include $name in the constructor
    {
        $this->subject = $subject;
        $this->content = $content;
        $this->name = $name; // Set $name
    }

    public function build()
    {
        return $this->markdown('emails.message')->with([
            'subject' => $this->subject,
            'content' => $this->content,
            'name' => $this->name // Pass $name to the markdown view
        ]);
    }
}
