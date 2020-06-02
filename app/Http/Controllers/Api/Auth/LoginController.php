<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Api\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //

    public function login(Request $request){

        $credentials = $request->only(['username','password']);
        return auth()->attempt($credentials);
    }
}
