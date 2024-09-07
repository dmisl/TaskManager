<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:16'],
            'password' => ['required', 'string'],
        ]);
        if(Auth::attempt($validated, 0))
        {
            return redirect()->route('home.index');
        } else
        {
            session(['error' => 'Користувача під таким іменем не знайдено або ж пароль введено неправильно']);
            return back()->withInput();
        }
    }
}
