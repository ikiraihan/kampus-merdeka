<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class KampusMerdeka
{
    public function handle(Request $request, Closure $next)
    {
        abort_if($request->key != config('app.kmKey'),403);

        return $next($request);
    }
}
