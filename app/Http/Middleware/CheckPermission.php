<?php

namespace App\Http\Middleware;

use Closure;
use App\Helpers\Helper;

class CheckPermission
{
    public function handle($request, Closure $next, $permission)
    {
        if (!Helper::permissionCheck($permission)) {
            return redirect()->route('task_list')->with('error','Acess Denied! You do not have permission to access this page.');
        }

        return $next($request);
    }
}