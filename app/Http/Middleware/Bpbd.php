<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Bpbd
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::user() == NULL)
        {
            return redirect('/login');
        }
        if(Auth::user()->status != 'bpbd')
        {
            return redirect('/proses_login_donatur');
        }
        return $next($request);
    }
}
