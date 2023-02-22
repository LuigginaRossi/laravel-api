<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewContact extends Mailable
{
    use Queueable, SerializesModels;
    //variabile pubblica che creo per salvare i dati
    //public per passarla all'interno della view
    public $newContactData;

    /**
     * Create a new message instance.
     *
     * @return void
     */                  //dato che ricevo dal ContactController
    public function __construct($contactData)
    {
        $this->newContactData= $contactData;
    }

    /**
     * Get the message envelope. Info Message.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Il lead {$this->newContactData->userName} ti ha contattato dal tuo sito!',
        );
    }

    /**
     * Get the message content definition. Html =>view
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            // view: 'email.newContact',
            markdown: 'email.newContact',
            with: [
                 'url'=> route('admin.contact.show', $this->newContactData->id),
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
