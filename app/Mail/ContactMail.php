<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name , $email , $subject , $message)
    {
        //
        $this->name = $name;
        $this->email = $email;
        $this->subject = $subject;
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('site.mails.contact' ,[
            'username' => $this->name,
            'useremail' => $this->email,
            'usersubject' => $this->subject,
            'usermessage' => $this->message
        ])->from($this->email , $this->name)->subject('Contact us form')->bcc('elbiheiry2@gmail.com');
    }
}
