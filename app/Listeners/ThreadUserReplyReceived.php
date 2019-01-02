<?php

namespace App\Listeners;

use Mail;
use Log;
use Illuminate\Mail\Mailable;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Events\ThreadReplyReceived as Received;
use App\Mail\ThreadReplyMail;

class ThreadUserReplyReceived implements ShouldQueue
{
    public function __construct()
    {
        Log::useFiles(
            storage_path(
                'logs' . DIRECTORY_SEPARATOR . env('MAIL_LOG_FILENAME', 'emails'). '.log'
            )
        );
    }

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
