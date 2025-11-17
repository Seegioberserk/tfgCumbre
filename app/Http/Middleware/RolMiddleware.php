<?php

namespace App\Http\Middleware;

use App\Models\RolPermiso;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\Response;

class RolMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    //Creamos nuestro propio meddle para dar permiso  de acceso
    public function handle(Request $request, Closure $next): Response
    {
       $user = Cache::get ('persona');
       //Sino existe el usuario vuelve al login
       if (!$user){
        return redirect()->route('login');
       }

       $permisos = RolPermiso::where('id_rol', $user->id_rol)->select('id_permiso')->get();
       foreach ($permisos as $key => $permiso) {
          if ($permiso->id_permiso == 1){
            return $next($request);
          } 
       }
       
      return redirect()->route('paginas.panel')->with('error', 'No tienes permisos para acceder a este módulo.');
    
  } 
}

