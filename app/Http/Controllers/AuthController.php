<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('users.login');

    }

    public function doLogin(AuthRequest $request)
    {
        $credentials = $request->validated();

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            // Vérifier si l'utilisateur a le rôle admin
            if (auth()->user()->hasRole('Administrateur')) {
                return redirect()->route('roles.index');
            }
            // Vérifier si l'utilisateur a le rôle product_manager
            elseif (auth()->user()->hasRole('Gestionnaire')) {
                return redirect()->route('employees.index');
            }
            elseif (auth()->user()->hasRole('Utilisateur Interne')) {
                return redirect()->route('listes.index');
            }

            // Redirection par défaut si le rôle n'est pas identifié
            return redirect()->route('users.login');
        }

        return redirect()->route('users.login')->withErrors([
            'message' => 'Invalid credentials',
        ]);
    }
}
