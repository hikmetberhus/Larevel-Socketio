<?php

namespace App\Http\Middleware;

use Route;
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

            if(Route::is('teacher.*')){
                return route('teacher.login');
            }else if (Route::is('student.*')){
                return route('student.login');
            }
            
            return route('login');
            
        }
    }
}
