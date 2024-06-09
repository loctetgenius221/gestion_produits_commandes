<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function create() {
        return view('auth.login');
    }

    public function store(LoginRequest $request) {

        if (auth()->attempt($request->validated())) {
            return redirect()->intended('/admin');
        }

        return back()
        ->withInput($request->only('email'))
        ->withErrors([
            'email' => 'L\'email saisie ne correspond pas.',
        ]);
    }
}
