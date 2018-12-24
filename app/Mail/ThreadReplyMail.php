<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Events\ThreadReplyReceived;

class ThreadReplyMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var
     */
    private $event;

    /**
     * ThreadReplyMail constructor.
     * @param ThreadReplyReceived $event
     */
    public function __construct(ThreadReplyReceived $event)
    {
        $this->event = $event;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('support@lar.com', 'Laravel Forum')
            ->view('emails.thread-reply')
            ->with(
                [
                    'threadReply' => $this->event->thread,
                ]
            );
    }
}
