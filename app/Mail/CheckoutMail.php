<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CheckoutMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($firstname , $email ,$lastname ,$phone ,$address, $country , $city ,$id)
    {
        //
        $this->firstname = $firstname;
        $this->email = $email;
        $this->lastname = $lastname;
        $this->phone = $phone;
        $this->address = $address;
        $this->country = $country;
        $this->city = $city;
        $this->id = $id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('site.mails.checkout', [
            'first_name' => $this->firstname,
            'last_name' => $this->lastname,
            'useremail' => $this->email,
            'userphone' => $this->phone,
            'useraddress' => $this->address,
            'usercountry' => $this->country,
            'usercity' => $this->city,
            'checkoutid' => $this->id
        ])->from($this->email , $this->firstname)->subject('New order message')->bcc('elbiheiry2@gmail.com');
    }
}
