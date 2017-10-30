<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\ContactMessage;

class ContactFormCreated extends Mailable
{
    use Queueable, SerializesModels;

    //Passer des variables depuis le constructeur
    public $msg;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(ContactMessage $msg)
    {
        $this->msg = $msg;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.contacts.created');
    }
}