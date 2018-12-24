<?php

namespace App\DataTables;

use App\Thread;
use Yajra\Datatables\Services\DataTable;

/**
 * Class ThreadDataTable
 * @package App\DataTables
 */
class ThreadDataTable extends DataTable
{
    /**
     * Display ajax response.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', function ($item) {
                return  ' <a href="'
                    . action('ThreadController@edit', htmlspecialchars($item->id))
                    . '" class="btn btn-primary"  title="Update">Edit</a>'
                    . ' <a href="'
                    . action('ThreadController@view', htmlspecialchars($item->id))
                    . '" class="btn btn-info"  title="View">View</a>'
                    . '<form method="post" action="' . action('ThreadController@destroy', htmlspecialchars($item->id)) . '">'
                        . method_field('DELETE')
                        . csrf_field()
                        . ' <input class="btn btn-danger" type="submit" value="Delete">'
                    . '</form>';
            })
            ->editColumn('content', function ($query) {

                return substr($query->content, 0, 75);
            })
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $threads = Thread::query()
            ->leftJoin('users', 'users.id', '=', 'threads.user_id')
            ->select(
                'threads.*',
                'users.email as user'
            );

        return $this->applyScopes($threads);
    }
}
