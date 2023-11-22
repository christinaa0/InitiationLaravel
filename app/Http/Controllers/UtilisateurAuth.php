<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UtilisateurAuth extends Controller
{
    public function form_inscription(){
        return view('inscription');
    }
    public function inscription(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    
        $user = User::create([
            'name' => $request->name,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'simple', // Définir le rôle à "simple"
        ]);
    
        Auth::login($user);
    
        return redirect(RouteServiceProvider::HOME);
    }
    
    public function form_connexion(){
        return view('connexion');
    }
    public function connexion(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect(RouteServiceProvider::HOME);
        }

        throw ValidationException::withMessages([
            'email' => ['Les informations d\'identification ne correspondent pas à nos enregistrements.'],
        ]);
    }

}
