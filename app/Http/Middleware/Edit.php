<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Edit
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
        if (Auth::user()->admin or Auth::user()->id == $request->route('articles')->user->id) {
            return $next($request);
        } else {
            return redirect()->route('articles.index');
        }
    }
}