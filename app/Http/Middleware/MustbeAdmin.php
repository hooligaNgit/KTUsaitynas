<?php

namespace App\Http\Middleware;

use App\Models\Role;
use Closure;
use http\Env\Response;
use Illuminate\Http\Request;

class MustbeAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->user()->role_id != Role::IS_ADMIN)
        {
            abort(403);
        }
        return $next($request);
    }
}
