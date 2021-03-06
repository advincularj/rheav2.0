<?php
/**
 * Created by PhpStorm.
 * User: Rae Jillian
 * Date: 2/5/2019
 * Time: 9:34 PM
 */

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Alert;


class Admin
{
    public function handle($request, Closure $next)
    {
        if (!Auth::user()) {
            return redirect('/signin');
        } else {
            if (Auth::user()->role_id != 1) {
                // user value cannot be found in session
                Alert::warning('Oops!', 'You need to be an Admin to access this page.');
                return redirect('/index');

            }
        }

        return $next($request);
    }



}