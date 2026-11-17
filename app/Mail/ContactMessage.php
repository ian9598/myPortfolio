<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMessage extends Mailable
{
    use Queueable, SerializesModels;

    public array $details;

    /**
     * Create a new message instance.
     */
    public function __construct(array $details)
    {
        $this->details = $details;
    }

    /**
     * Build the message.
     */
    public function build(): static
    {
        return $this->subject("Portfolio Contact: {$this->details['subject']}")
                    ->replyTo($this->details['email'], $this->details['name'])
                    ->markdown('emails.contact');
    }
}
