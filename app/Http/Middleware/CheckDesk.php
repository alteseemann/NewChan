<?php

namespace App\Http\Middleware;

use App\Http\Controllers\DeskController;
use Closure;
use Illuminate\Http\Request;


class CheckDesk
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
        $id_param = explode('_', $request->url());
        $desk_id = array_pop($id_param);
        if (!is_numeric($desk_id) || $desk_id==0) {
            return redirect(route('welcome'));
        }
        return $next($request);
    }
}
