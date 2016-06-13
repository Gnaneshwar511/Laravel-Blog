<?php
/**
 * Created by PhpStorm.
 * User: gayanala
 * Date: 5/20/2016
 * Time: 11:46 AM
 */

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Create
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
        if (Auth::check()) {
            return $next($request);
        } else {
            return redirect()->route('articles.index');
        }
    }
}