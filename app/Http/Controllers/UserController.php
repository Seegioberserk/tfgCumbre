<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Rol;
use App\Models\User;
use App\Models\Venta;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
// Spatie si lo usas
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    // ========================
    // MÉTODOS EXISTENTES
    // ========================
    
    public function index()
    {
        $datos = User::with('rol')->get(); // trae el rol relacionado
        return view('usuario.index', compact('datos'));
    }

    public function indexStore()
    {
        $roles = Rol::get();
        return view('usuario.crear', compact('roles'));
    }

    public function indexUpdate(Request $request)
    {
        $dato = User::find($request->id);
        $roles = Rol::get();
        return view('usuario.editar', compact('dato', 'roles'));
    }

    public function store(Request $request)
    {          
        try {
            $request->validate([
                'name' => 'required|string|max:30|unique:users,name',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string|min:8|max:50',
                'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
                'id_rol' => 'required|exists:rols,id',
            ], $this->rules);

            if ($request->file('foto')) {
                $nombre =  $request->name . ".jpg";
                $ubicacion = "storage/" . $request->file('foto')->storeAs('fotoUsurio', $nombre, 'public');
            }

            $nuevo = [
                "name" => $request->name,
                "email" => $request->email,
                "password" => bcrypt($request->password),
                "foto" => $request->foto ? $ubicacion : null,
                "id_rol" => $request->id_rol,
            ];

            $nuevo = User::create($nuevo);

        } catch (ValidationException $e) {
            $mensajes = collect($e->errors())->flatten()->join(' ');
            return back()->with('error', $mensajes);
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }

        return redirect()->route('index.usuario');
    }

    public function update(Request $request)
    {
        try {
            $modificar = $request->validate([
                'name' => 'sometimes|string|max:30|unique:users,name',
                'email' => 'sometimes|email|unique:users,email',
                'password' => 'sometimes|string|min:8|max:50',
                'foto' => 'sometimes|image|mimes:jpg,jpeg,png|max:2048',
                'id_rol' => 'sometimes|exists:rols,id',               
            ], $this->rules);  

            $dato = User::find($request->id);
            $dato->update($modificar);

        } catch (ValidationException $e) {
            $mensajes = collect($e->errors())->flatten()->join(' ');
            return back()->with('error', $mensajes);
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }

        return redirect()->route('index.usuario');
    }

    public function destroy(Request $request)
    {
        $datos = User::find($request->id);
        $datos->delete();
        return redirect()->route('index.usuario');
    }

    private $rules = [
        'name.required' => 'El nombre de usuario es obligatorio.',
        'name.string'   => 'El nombre de usuario debe ser texto válido.',
        'name.max'      => 'El nombre de usuario no puede superar los 30 caracteres.',

        'email.required'    => 'El correo electrónico es obligatorio.',
        'email.email'       => 'Debe ingresar un correo electrónico válido.',
        'email.unique'      => 'Este correo ya está registrado en el sistema.',

        'password.required' => 'La contraseña es obligatoria.',
        'password.string'   => 'La contraseña debe ser una cadena de texto.',
        'password.min'      => 'La contraseña debe tener al menos 8 caracteres.',
        'password.max'      => 'La contraseña no puede tener más de 50 caracteres.',

        'foto.image'        => 'El archivo debe ser una imagen.',
        'foto.mimes'        => 'Solo se permiten imágenes en formato JPG o PNG.',
        'foto.max'          => 'La imagen no puede pesar más de 2 MB.',

        'id_rol.required'   => 'Debe seleccionar un rol.',
        'id_rol.exists'     => 'El rol seleccionado no existe en la base de datos.',
    ];

    // ========================
    // NUEVO MÉTODO DASHBOARD
    // ========================
    public function dashboard()
    {
        $usuarios = User::count();

        // Si usas Spatie:
        // $roles = Role::count();
        // $permisos = Permission::count();

        // Si usas tu modelo Rol:
        $roles = Rol::count();

        $permisos = 0; // Por ahora, si no usas Spatie, puedes dejarlo en 0
        $ventas = Venta::count();

        return view('paginas.panel', compact('usuarios', 'roles', 'permisos', 'ventas'));
    }
}
