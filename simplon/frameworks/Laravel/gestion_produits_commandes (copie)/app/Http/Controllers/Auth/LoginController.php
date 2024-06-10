<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function create() {
        return view('auth.login');
    }

    public function store(LoginRequest $request) {
        if (auth()->attempt($request->validated())) {
            $user = auth()->user();
            if ($user->role === 'admin') {
                $request->session()->regenerate();
                return redirect()->intended(route('admin.index'));
            } else {
                // Stocker les informations de l'utilisateur dans la session
                Session::put('user', $user);
                $request->session()->regenerate();
                return redirect()->intended(route('index'));
            }
        }

        return back()
            ->withInput($request->only('email'))
            ->withErrors([
                'email' => 'L\'email saisie ne correspond pas.',
            ]);
    }
}
