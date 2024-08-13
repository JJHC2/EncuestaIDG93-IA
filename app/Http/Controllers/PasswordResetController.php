<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\PasswordReset;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class PasswordResetController extends Controller
{
    public function sendResetLinkEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);
    
        $user = User::where('email', $request->input('email'))->first();
        if (!$user) {
            return response()->json(['message' => 'No encontramos una cuenta con ese correo'], 404);
        }
    
        // Generar un token de restablecimiento
        $token = Str::random(60);
    
        // Guardar el token en la base de datos
        DB::table('password_resets')->updateOrInsert(
            ['email' => $request->input('email')],
            ['token' => $token, 'created_at' => now()]
        );
    
        // Verificar el valor del token y del email
        Log::info('Enviando correo de restablecimiento', ['email' => $request->input('email'), 'token' => $token]);
    
        // Enviar el correo de restablecimiento al servidor Flask
        $response = Http::post(env('FLASK_SERVER_URL') . '/send-password-reset-email', [
            'email' => $request->input('email'),
            'token' => $token,
        ]);
    
        if ($response->successful()) {
            return response()->json(['message' => 'Enlace de recuperación enviado']);
        } else {
            Log::error('Error al enviar el enlace de recuperación', ['response' => $response->body()]);
            return response()->json(['message' => 'Error al enviar el enlace de recuperación: ' . $response->body()], 500);
        }
    }
    

    public function showResetForm($token)
    {
        return view('auth.reset_password', ['token' => $token]);
    }

    public function reset(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
            'token' => 'required'
        ]);

        // Validar el token
        $passwordReset = DB::table('password_resets')->where([
            'email' => $request->input('email'),
            'token' => $request->input('token')
        ])->first();

        if (!$passwordReset) {
            return back()->withErrors(['email' => 'Token de restablecimiento inválido o expirado.']);
        }

        // Enviar solicitud de restablecimiento de contraseña al servidor Flask
        $response = Http::post(env('FLASK_SERVER_URL') . '/reset-password', [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'token' => $request->input('token'),
        ]);

        if ($response->successful()) {
            // Eliminar el token de la base de datos después de restablecer la contraseña
            DB::table('password_resets')->where([
                'email' => $request->input('email'),
                'token' => $request->input('token')
            ])->delete();

            return redirect()->route('login')->with('status', 'Contraseña restablecida con éxito. Puedes iniciar sesión ahora.');
        } else {
            return back()->withErrors(['email' => 'Error al restablecer la contraseña: ' . $response->body()]);
        }
    }
}
