<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => ['required', 'email', 'unique:users,email'],
            'login' => ['required', 'string', 'unique:users,name'],
            'pass' => ['required', 'string', 'confirmed'],
        ]);
        $user = User::create([
            'email' => $validated['email'],
            'name' => $validated['login'],
            'password' => $validated['pass'],
        ]);
        Auth::login($user);
        return redirect()->route('welcome.index');
    }
}