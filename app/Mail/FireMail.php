<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FireMail extends Mailable
{
    use Queueable;
    use SerializesModels;

    /**
     * @var string
     */
    public $subject;

    /**
     * @var string
     */
    public $text;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(string $subject, array $text)
    {
        $this->subject = $subject;
        $this->text = $text;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(): FireMail
    {
        return $this->to(env("MAIL_TO_ADDRESS"))
            ->from(env("MAIL_FROM_ADDRESS"))
            ->subject($this->subject)
            ->text('emails');
    }
}
