<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;


class AuthUsuarios extends Controller
{
    // Mostrar vista de registro
    public function index()
    {
        return view('register');
    }
    
    // Guardar nuevo usuario
    public function store(Request $request)
    {
        // Validación de datos
        $request->validate([
            'name' => 'required',
            'last_name' => 'required',
            'user' => 'required',
            'email' => 'required|email|unique:usuarios,email',
            'password' => ['required', 'confirmed', Password::min(8)
                ->letters()
                ->mixedCase()
                ->numbers()
                ->symbols()
                ->uncompromised(),
            ],
        ]);
        
        // Crear instancia de Usuario y guardar en la base de datos
        $usuario = new Usuario();
        $usuario->name = $request->name;
        $usuario->last_name = $request->last_name;
        $usuario->user = $request->user;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request->password); // Encriptar la contraseña
        
        $validToken = rand(1000, 9999).'2022';;
        Log::info("valid token is".$validToken);
        $get_token = new Verifytoken();
        $get_token->token =  $validToken;
        $get_token->email =  $request['email'];
        $get_token->save();
        $get_user_email = $request['email'];
        $get_user_name = $request['name'];
        Mail::to($request['email'])->send(new WelcomeMail($get_user_email,$validToken,$get_user_name));

        
        $usuario->save();
        
        return redirect()->route('login')->with('success', 'Registro completado. Por favor, inicia sesión.');
    }

    // Mostrar vista de login
    public function login()
    {
        return view('login');
    }

    // Iniciar sesión y asignar token
    public function authenticate(Request $request)
    {
        // Validación de los campos de inicio de sesión
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Intento de autenticación
        if (Auth::attempt($credentials)) {
            // Generar token si la autenticación es exitosa
            $user = Auth::user();
            $token = $user->createToken('auth_token')->plainTextToken;

            // Retornar vista con el token
            return view('test')->with('access_token', $token);
        }

        // Retornar con errores si la autenticación falla
        throw ValidationException::withMessages([
            'email' => ['Las credenciales proporcionadas son incorrectas.'],
        ]);
    }

    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function inicio()
    {
        return view('test');
    }
}