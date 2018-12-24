<?php

namespace App\Events;

use App\ThreadReply;

class ThreadReplyReceived
{
    /**
     * @var
     */
    public $thread;

    /**
     * Create a new event instance.
     *
     */
    public function __construct(ThreadReply $thread)
    {
        $this->thread = $thread;
    }
}
