<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegistrationMail extends Mailable
{
    use Queueable, SerializesModels;
    public $name;
    public $surname;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name,$surname)
    {
        $this->name = $name;
        $this->surname = $surname;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Sign Up email on NFTBriks.com')->view('mail.signup');
    }
}
