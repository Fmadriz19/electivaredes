<?php

namespace App\Http\Controllers;
use App\Models\usuarios;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Models\Verifytoken;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Log;

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
            'email' => 'required | email | unique:usuarios',
            'password' => ['required', 'confirmed', Password::min(8)->letters()
            ->mixedCase()
            ->numbers()
            ->symbols()],
            'password_confirmation' => 'required',
        ]);
        
        
        
        $users = new usuarios;
        $users->name = $request->name;
        $users->last_name = $request->last_name;
        $users->user = $request->user;
        $users->email = $request->email;
        $users->password = $request->password;
        $users->password_confirmation = $request->password_confirmation;
        
        $validToken = rand(1000, 9999).'2022';;
        Log::info("valid token is".$validToken);
        $get_token = new Verifytoken();
        $get_token->token =  $validToken;
        $get_token->email =  $request['email'];
        $get_token->save();
        $get_user_email = $request['email'];
        $get_user_name = $request['name'];
        Mail::to($request['email'])->send(new WelcomeMail($get_user_email,$validToken,$get_user_name));

        $users->save();
        
        return back()->with('success', 'Registro completado');
    }
}