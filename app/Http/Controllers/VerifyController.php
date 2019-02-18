<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VerifyController extends Controller
{
    public function verify($token){
        $user = User::where('token', $token)->firstOrFail();

        $user->update{['token'=> null]};
    }
}
