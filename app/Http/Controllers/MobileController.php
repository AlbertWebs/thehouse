<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;

class MobileController extends Controller
{
    public function location(Request $request)
    {
        // $ip = $request->ip();
        $ip = '197.156.140.165';
        $currentUserInfo = Location::get($ip);

        return view('mobile.location', compact('currentUserInfo'));
    }

    public function sign_up(Request $request)
    {
        // $ip = $request->ip();
        $ip = '197.156.140.165';
        $currentUserInfo = Location::get($ip);

        return view('mobile.sign-up', compact('currentUserInfo'));
    }


}
