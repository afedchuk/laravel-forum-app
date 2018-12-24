<?php

namespace App\Listeners;

use Mail;
use Illuminate\Mail\Mailable;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Events\ThreadReplyReceived as Received;
use App\Mail\ThreadReplyMail;

class ThreadUserReplyReceived implements ShouldQueue
{
    /**
     * Handle the event.
     * @param Received $event
     */
    public function handle(Received $event)
    {
        $ownerThreadEmail = $event->thread->thread->creator->email;

        Mail::to($ownerThreadEmail, $ownerThreadEmail)
            ->queue(
                (new ThreadReplyMail($event))
            );
    }
}
