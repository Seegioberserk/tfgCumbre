<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Venta;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DashboardController extends Controller
{
    public function index()
    {
        // Contadores reales desde la base de datos
        $usuarios = User::count();
        $roles = Role::count();
        $permisos = Permission::count();
        $ventas = Venta::count();

        // Pasar datos a la vista
        return view('paginas.panel', compact('usuarios', 'roles', 'permisos', 'ventas'));
    }
}
