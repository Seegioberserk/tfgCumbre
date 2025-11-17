<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class Authcontroller extends Controller
{
    /**
     * Muestra la vista principal del sistema
     */
    public function welcome()
    {   
        //pagina de inicio principal login
        return view('paginas.panel'); // ✅ sintaxis correcta
    }

   
    public function loginView()
    {
        return view('login'); // ✅ usa la ruta correcta de la vista
    }
    public function login(Request $request){
            $request->validate(rules: [
                'name' => 'required|string',
                'password' => 'required|string',
            ]);
            //Consulta base de datos mediante elocuent
            $user = User::where('name', $request->name)->first();
            if(!$user){
            return back()->withErrors(['errorUser', 'El usuario no existe']);
            }   
        
            $credentials = $request->only('name', 'password');

            if (Auth::guard('web')->attempt($credentials)) {
                // Agrega los datos del usuario a la cache
                Cache::put('persona',$user);
                return redirect()->route('paginas.panel');
            } else {
                return back()->with('error', 'El password es incorrecto');
            }   
    
    }

    public function loginSalida(){
        Cache::fortget('persona');
        //retorna al login
        return redirect()->route('login');
    }

}