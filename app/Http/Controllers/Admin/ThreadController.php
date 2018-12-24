<?php

namespace App\Http\Controllers\Admin;

use App\ThreadReply;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

use DataTables;
use App\Thread;
use App\Http\Requests\ThreadRequest;
use App\DataTables\ThreadDataTable;

/**
 * Class ThreadController
 * @package App\Http\Controllers
 */
class ThreadController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('thread.list');
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request, $id)
    {
        $thread = Thread::findOrFail($id);
        $thread->delete();
        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'Thread successfully removed!');

        return redirect()->action('ThreadController@index');
    }

    /**
     * Method called via AJAX for loading new aircraft models requests
     *
     * @param ThreadDataTable $dataTable
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAjax(ThreadDataTable $dataTable)
    {
        return $dataTable->ajax();
    }
}
