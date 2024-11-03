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
            'name' => ['required', 'string', 'min:3', 'max:16'],
            'password' => ['required', 'string', 'min:6'],
        ]);
        if(Auth::attempt($validated, $request->remember ? 1 : 0))
        {
            return redirect()->route('home.index');
        } else
        {
            session(['error' => 'перевірте правильність паролю або логіну']);
            return back()->withInput();
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.index');
    }
}
