<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('login');
        }
    }

//    public function handle($request, Closure $next, $guard = null)
  //  {
    //    $seg = $request->segment(3);
      //  if(!\Auth::guard($guard)->getToken()){
        //    $res['message'] = 'Unauthorised';
          //  return new Response($res, 401);
        //} 
        
       // return $next($request);
    //}
}
