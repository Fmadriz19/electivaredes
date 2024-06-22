<?php

namespace App\Http\Controllers;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Validator;


class RegisterPersonal extends Controller
{
    // Mostrar vistas
    public function index(Request $request)
    {
        return view('register');
    }
    
    // Guardar personal
    public function store(Request $request)
    {
        # Validaciones antes de guardarlo
        $request->validate([
            'name' => 'required',
            'last_name' => 'required',
            'user' => 'required',
            'email' => 'required | email | unique:Usuario',
            'password' => ['required', 'confirmed', Password::min(8)->letters()
            ->mixedCase()
            ->numbers()
            ->symbols()],
            'password_confirmation' => 'required',
        ]);
        
        
        
        $users = new Usuario;
        $users->name = $request->name;
        $users->last_name = $request->last_name;
        $users->user = $request->user;
        $users->email = $request->email;
        $users->password = $request->password;
        $users->password_confirmation = $request->password_confirmation;
        
        $users->save();
        
        return back()->with('success', 'Registro completado');
    }
}