<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

// Ruta para mostrar el formulario de inicio de sesión
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');

// Ruta para procesar el inicio de sesión
Route::post('login', [LoginController::class, 'login'])->name('login.post');

// Ruta para mostrar el formulario de registro
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');

// Ruta para procesar el registro
Route::post('register', [RegisterController::class, 'register'])->name('register.post');

// Ruta para cerrar sesión
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Ruta para el dashboard, accesible solo para usuarios autenticados
Route::get('dashboard', function () {
    return view('dashboard');
})->middleware('auth');



Route::get('password/reset', function (Request $request) {
    $token = $request->query('token');
    if ($token) {
        // Verificar si el token es válido
        $passwordReset = DB::table('password_resets')->where('token', $token)->first();
        if ($passwordReset) {
            return view('auth.reset', ['token' => $token]);
        } else {
            return redirect('/login')->with('error', 'Token de restablecimiento inválido.');
        }
    } else {
        return redirect('/login')->with('error', 'Token no proporcionado.');
    }
})->name('password.reset');

Route::post('password/reset', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'token' => 'required',
        'password' => 'required|confirmed|min:8',
    ]);

    // Buscar el token en la base de datos
    $passwordReset = DB::table('password_resets')->where('token', $request->input('token'))->first();

    if ($passwordReset) {
        // Actualizar la contraseña del usuario
        $user = User::where('email', $request->input('email'))->first();
        if ($user) {
            $user->password = Hash::make($request->input('password'));
            $user->save();

            // Eliminar el token
            DB::table('password_resets')->where('token', $request->input('token'))->delete();

            return redirect('/login')->with('status', 'Contraseña restablecida con éxito.');
        } else {
            return redirect('/login')->with('error', 'Usuario no encontrado.');
        }
    } else {
        return redirect('/login')->with('error', 'Token de restablecimiento inválido.');
    }
})->name('password.update');






Route::post('/password/email', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
    ]);

    // Generar un token único
    $token = Str::random(60);

    // Aquí deberías guardar el token en la base de datos asociado al usuario
    // Ejemplo (esto depende de tu estructura de base de datos):
    DB::table('password_resets')->updateOrInsert(
        ['email' => $request->input('email')],
        ['token' => $token, 'created_at' => now()]
    );

    // Enviar el correo electrónico con el token
    $response = Http::post(env('FLASK_SERVER_URL') . '/send-password-reset-email', [
        'email' => $request->input('email'),
        'token' => $token,
    ]);

    if ($response->successful()) {
        return view('email.sent')->with('message', 'Por favor revisa la bandeja de entrada de tu correo.');
    } else {
        return view('email.error')->with('message', 'Error al enviar el enlace de recuperación: ' . $response->body());
    }    
})->name('password.email');


