<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function logout(Request $request){
        //$request->user()->guard()->logout();

        $request->session()->invalidate();

        return redirect()->route('welcome');
    }
}
