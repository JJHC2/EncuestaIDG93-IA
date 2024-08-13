<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'app' => 'required|string|max:255',
            'apm' => 'required|string|max:255',
            'matricula' => 'required|string|unique:alumnos,matricula',
            'email' => 'required|email|unique:alumnos,email',
            'password' => 'required|string|confirmed|min:8',
        ]);

        // Crear el usuario
        User::create([
            'nombre' => $request->nombre,
            'app' => $request->app,
            'apm' => $request->apm,
            'matricula' => $request->matricula,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Redirigir con mensaje de éxito
        return redirect()->route('register')->with('success', 'Registro exitoso. Por favor, inicia sesión.');
    }
}
