<?php

namespace App\Http\Middleware;

use App\Models\UserSession;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ValidateSessionToken
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
        if (Auth::check()) {

            $exists = UserSession::select(
                    'id',
                    'token'
                )
                ->where('user_id', Auth::id())
                ->where('token', $request->session()->get('token'))
                ->exists();

            if (!$exists) {

                return redirect('/logout');

            }

        }

        return $next($request);

    }
}
