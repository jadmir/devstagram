<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        //modificar el request
        $request->request->add(['username' => Str::slug($request->username)]);

        //validacion
        $this->validate($request, [
            'name' => 'required|max:30',
            'username' => 'required|unique:users|min:3|max:20',
            'email' => 'required|unique:users|email|max:60',
            'password' => 'required|confirmed|min:6',
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make( $request->password)
        ]);

        //Autenticar usuario
        //Auth::attempt([
        //    'email' => $request->email,
        //    'password' => $request->password,
        //]);

        //Otra forma de autenticar
        Auth::attempt($request->only('email', 'password'));

        //redirigiendo
        // Redireccionar
        return redirect()->route('posts.index', auth()->user() );
    }
}
