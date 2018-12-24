<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

/**
 * Class Admin
 * @package App\Http\Middleware
 */
class Admin
{

    /**
     * @param $request
     * @param Closure $next
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|mixed
     */
    public function handle($request, Closure $next)
    {

        if ( Auth::check() && Auth::user()->isAdmin() )
        {
            return $next($request);
        }

        return redirect('/');

    }

}