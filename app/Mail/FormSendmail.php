<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class FormSendmail extends Mailable
{
    use Queueable, SerializesModels;
    
    private $email;
    private $title;
    private $body;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($forms)
    {
        $this->email = $forms['email'];
        $this->title = $forms['title'];
        $this->body = $forms['body'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
                ->from('toru.fonn@gmail.com')
                ->subject('自動送信メール')
                ->view('contact.mail')
                ->with(['email' => $this->email,
                        'title' => $this->title,
                        'body' => $this->body,
                        ]);
    }
}
