<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResetPasswordEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $password ;
    public $name ;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name,$password)
    {
        $this->name = $name;
        $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('pages.email.resetPassword')
            ->subject('Réinitialisation du mot de passe')
            ->with(['name'=>$this->name,'password'=>$this->password]);
    }
}
