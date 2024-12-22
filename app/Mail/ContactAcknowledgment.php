<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactAcknowledgment extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $message;

    public function __construct($message)
    {
        $this->message = $message;
    }

    public function build()
    {
        return $this->view('emails.contact-acknowledgment');
    }


    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Contact Acknowledgment',
        );
    }

   
    public function content(): Content
    {
        return new Content(
            view: 'view.name',
        );
    }

  
    public function attachments(): array
    {
        return [];
    }
}
