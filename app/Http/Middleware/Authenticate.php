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
       if ( ! $request->expectsJson()) {

          if ( $request->routeIs('boutique.*')) {
            return route('boutique.login');
        }
        if ( $request->routeIs('store.*')) {
            return route('store.store_login');
        }

         if ( $request->routeIs('admin.*')) {
                return route('admin.admin_login');
            }

                 // return route('login');
        }


    }
}
