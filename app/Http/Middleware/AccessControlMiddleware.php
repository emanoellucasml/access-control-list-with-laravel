<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Fluent;
use Illuminate\Support\Str;

class AccessControlMiddleware
{
    use AuthorizesRequests;

    public function handle(Request $request, Closure $next)
    {
        $this->authorize($request->route()->getName());
        return $next($request);
    }
}
