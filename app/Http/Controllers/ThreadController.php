<?php

namespace App\Http\Controllers;

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
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('thread.list');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function view($id)
    {
        $thread = Thread::findOrFail($id);

        return view('thread.index', compact('thread'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Request $request, $id)
    {
        $thread = Thread::find($id);

        if (!auth()->user()->can('update', $thread)) {
            return redirect()->back();
        }

        return view('thread.form', compact('thread'));
    }

    /**
     * @param ThreadRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ThreadRequest $request, $id)
    {
        $thread = Thread::findOrFail($id);

        if (!auth()->user()->can('update', $thread)) {
            return redirect()->back();
        }

        $thread->fill($request->all());
        $thread->save();

        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'Thread successfully updated!');

        return redirect()->back();
    }


    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request, $id)
    {
        $thread = Thread::findOrFail($id);
        if (!auth()->user()->can('delete', $thread)) {
            return redirect()->back();
        }

        $thread->delete();
        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'Thread successfully removed!');

        return redirect()->action('ThreadController@index');
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $thread = new Thread();

        return view('thread.form', compact('thread'));
    }

    /**
     * @param ThreadRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ThreadRequest $request)
    {
        $thread = Thread::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'content' => $request->content,
        ]);

        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'Thread successfully created!');

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
