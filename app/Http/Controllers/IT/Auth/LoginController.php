<?php

namespace App\Http\Controllers\IT\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Http\Request;
use Auth;
use Session;

class LoginController extends Controller
{
    public function formLogin(Request $request)
    {
        $key = 'login-apps.'.$request->ip();
        // dd($data);
        return view('it.auth.login',[
            'key' => $key,
            'retries' => RateLimiter::retriesLeft($key,5),
            'seconds' => RateLimiter::availableIn($key)
        ]);
    }

    public function postLogin(Request $request)
    {
        $request->validate([

            'email' => 'required',
            'password' => 'required',

        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            RateLimiter::clear('login-apps.'.$request->ip());
            return redirect()->intended('dashboard')
                        ->withSuccess('You have Successfully loggedin');

        }

        return redirect()->route('it.formLogin')->withSuccess('Oppes! You have entered invalid credentials');
    }

    public function logout(Request $request) {

        Session::flush();

        Auth::logout();

        return redirect()->route('it.formLogin');

    }
}
