<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

use App\ThreadReply;
use App\Http\Requests\ThreadRequest;
use App\DataTables\ThreadDataTable;
use App\Events\ThreadReplyReceived;

/**
 * Class ThreadReplyController
 * @package App\Http\Controllers
 */
class ThreadReplyController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $reply = ThreadReply::create([
            'user_id' => auth()->user()->id,
            'thread_id' => $request->thread_id,
            'body' => $request->body,
        ]);

        event(new ThreadReplyReceived($reply));

        return redirect()->action('ThreadController@view', $request->thread_id);
    }
}
