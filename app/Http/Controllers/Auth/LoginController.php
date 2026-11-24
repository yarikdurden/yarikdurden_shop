<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'identifier' => 'required|string',
            'password'   => 'required|string',
        ]);

        $identifier = $request->input('identifier');
        $password = $request->input('password');

        if (filter_var($identifier, FILTER_VALIDATE_EMAIL)) {
            $field = 'email';
        } elseif (preg_match('/^\+?[0-9]{10,15}$/', $identifier)) {
            $field = 'phone';
        } else {
            $field = 'login';
        }

        if (Auth::attempt([$field => $identifier, 'password' => $password])) {
            $request->session()->regenerate();
            return redirect()->intended(route('catalog'));
        }

        return back()->withErrors([
            'identifier' => 'Неверные данные для входа. Проверьте логин/email/телефон и пароль.',
        ])->onlyInput('identifier');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('catalog');
    }
}