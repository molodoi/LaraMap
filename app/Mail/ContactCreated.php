<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactCreated extends Mailable
{
    use Queueable, SerializesModels;

    //Passer des variables depuis le constructeur
    public $name;
    public $email;
    public $body;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $email, $body)
    {
        $this->name = $name;
        $this->email = $email;
        $this->body = $body;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.contacts.created');
                    //Passer des variables depuis la method with
                    /*->with([
                        'name' => 'Matthieu',
                        'email' => 'contact@ticme.fr',
                        'body' => 'Le message à envoyer'
                        ]);
                    */
                    //Ajouter une vue spécifique pour l'envoi plain text
                    //->text('email.contacts.created_plain_text');
    }
}
