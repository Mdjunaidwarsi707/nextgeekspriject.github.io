<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            // return route('login');
            // change kar diye taki jab koi direct url se oprn karen to login pag eme na jaye shidha index page open ho .Aur agar backforword bhi karen to shidha index page open ho.
            return url('/');
            
        }
    }
}
