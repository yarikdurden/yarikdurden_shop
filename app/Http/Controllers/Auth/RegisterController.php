<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function show()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'last_name'   => 'required|string|max:100',
            'first_name'  => 'required|string|max:100',
            'middle_name' => 'nullable|string|max:100',
            'login'       => 'required|string|max:50|unique:users,login',
            'email'       => 'required|email|unique:users,email',
            'phone'       => 'required|string|max:20|unique:users,phone',
            'password'    => 'required|string|min:6|confirmed',
        ]);

        $user = User::create([
            'name'        => "{$data['last_name']} {$data['first_name']}",
            'last_name'   => $data['last_name'],
            'first_name'  => $data['first_name'],
            'middle_name' => $data['middle_name'] ?? null,
            'login'       => $data['login'],
            'email'       => $data['email'],
            'phone'       => $data['phone'],
            'password'    => Hash::make($data['password']),
        ]);

        Auth::login($user);
        return redirect()->route('catalog');
    }
}