<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $name;
    public $email;
    public $subject;
    public $message;
    public function __construct($name, $email, $subject, $message)
    {
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
        $e_name = $this->name;
        $e_email = $this->email;
        $e_subject = $this->subject;
        $e_message = $this->message;

        return $this->view('mail.mail', compact('e_name', 'e_email', 'e_subject', 'e_message'))
            ->replyTo($e_email, $e_name)
            ->subject($e_subject);
    }
}
