<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle($request, Closure $next)
{
    if (auth()->user()->role !== 'admin') {
        return redirect('/');  // redirect ke halaman utama jika bukan admin
    }

    return $next($request);
}

}
