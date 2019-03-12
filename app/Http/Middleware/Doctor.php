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


class Doctor
{
    public function handle($request, Closure $next)
    {
        if (Auth::guest()) {
            return redirect('/signin');
        } else {
            if (Auth::user()->role_id != 2) {
                // user value cannot be found in session
                alert()->warning('Oops!', 'You need to be a Doctor to access this page.');
                return redirect('/index');

            }
        }

        return $next($request);
    }


}