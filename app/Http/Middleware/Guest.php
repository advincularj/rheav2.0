<?php
/**
 * Created by PhpStorm.
 * User: Rae Jillian
 * Date: 2/21/2019
 * Time: 5:11 AM
 */

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;


class Guest
{
    public function handle($request, Closure $next)
    {
        if (!Auth::user()) {
            return redirect('/log-in');
        } else {
            if (Auth::user()->role_id != 4) {
                // user value cannot be found in session

                return redirect('/index');

            }
        }

        return $next($request);
    }

}