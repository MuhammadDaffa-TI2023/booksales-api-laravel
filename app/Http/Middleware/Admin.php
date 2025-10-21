<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->user()->role !== 'admin') {
            return response()->json(['message' => 'Akses ditolak. Hanya admin yang dapat melakukan ini.'], 403);
        }

        return $next($request);
    }
}
