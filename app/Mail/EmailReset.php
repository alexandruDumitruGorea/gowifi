<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailReset extends Mailable
{
    use Queueable, SerializesModels;

    private $user, $url;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $url)
    {
        $this->user = $user;
        $this->url = $url;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->to($this->user);
        return $this->view('emails.reset')->with(['user' => $this->user, 'url' => $this->url]);
    }
}
