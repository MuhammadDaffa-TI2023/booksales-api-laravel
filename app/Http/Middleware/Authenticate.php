<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    protected function redirectTo($request)
    {
        // Jangan redirect ke route login (API tidak butuh ini)
        if (!$request->expectsJson()) {
            return null;
        }
    }
}
