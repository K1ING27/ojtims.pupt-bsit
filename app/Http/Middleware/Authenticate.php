<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware

{   
    use Notifiable;
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        return $request->expectsJson() ? null : route('/');
    }

    /**
     * Handle an incoming request.
     */
    
}
