<?php

namespace App\Http\Middleware;

use Closure;
use Gate;

class AclControl
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $permission)
    {

        if(Gate::denies($permission)){
            throw new \L5Admin\Exceptions\NotAuthorizedException('You are not authorized to proceed.');
        }

        return $next($request);
    }
}
