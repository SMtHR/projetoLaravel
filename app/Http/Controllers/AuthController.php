<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function showRegister(){
        return view('auth.register');
    }

    public function showLogin() {
        return view('auth.login');
    }
    public function register(Request $request){
        $validado = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed'
        ]);
        $user = User::create($validado);
        Auth::login($user);

        return redirect()->route('lista.index');
    }

    public function login(Request $request) {
        $validado = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|'
        ]);

        if (Auth::attempt($validado)){
            $request->session()->regenerate();
            return redirect()->route('lista.index');
        }

        throw ValidationException::withMessages([
            'credentials' => 'Credenciais incorretas'
        ]);
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('show.login');
    }
}
