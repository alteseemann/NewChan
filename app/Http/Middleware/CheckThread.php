<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckThread
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $making_parts = explode('/', $request->url());
        $desk_part = $making_parts[4];
        $thread_part=$making_parts[6];
        $desk_arr = explode('_', $desk_part);
        $thread_arr = explode('_', $thread_part);
        $desk_id = array_pop($desk_arr);
        $thread_id = array_pop($thread_arr);
        if (!is_numeric($desk_id) || $desk_id==0) {
            return redirect(route('welcome'));
        }
        if (!is_numeric($thread_id) || $thread_id==0) {
            return redirect(route('welcome'));
        }
        return $next($request);
    }
}
