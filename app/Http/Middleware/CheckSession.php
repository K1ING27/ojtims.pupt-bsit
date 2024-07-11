<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class CheckSession
{
     /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Session::has('loginId')) {
            $user = User::find(Session::get('loginId'));
            
            if ($user) {
                Log::info('User role: ' . $user->role);

                switch ($user->role) {
                    case 0:
                        Log::info('Redirecting to student home');
                        return redirect()->route('student.home');
                    case 1:
                        Log::info('Redirecting to dashboard');
                        return redirect()->route('dashboard');
                    case 2:
                        Log::info('Redirecting to professor home');
                        return redirect()->route('professor_home');
                }
            } else {
                Log::warning('User not found with loginId: ' . Session::get('loginId'));
            }
        } else {
            Log::info('Session does not have loginId');
        }

        return $next($request);
    }
}
