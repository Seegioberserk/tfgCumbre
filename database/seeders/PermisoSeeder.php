<?php

namespace Database\Seeders;

use App\Models\Permiso;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermisoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permiso::create([
            'Nombre' => 'rol',
            'Descripcion' => 'Controla todo el sistema y la configuración total.'
        ]);
        Permiso::create([
            'Nombre' => 'permiso',
            'Descripcion' => 'Controla acceso a ventas y servicios.'
        ]);
        Permiso::create([
            'Nombre' => 'usuario',
            'Descripcion' => 'Controla acceso a ventas y servicios.'
        ]);
    }
}