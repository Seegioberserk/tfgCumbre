<?php

namespace Database\Seeders;

use App\Models\Rol;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Rol::create([
            'Nombre' => 'Administrador',
            'Descripcion' => 'Controla todo el sistema y la configuración total.'
        ]);

        Rol::create([
            'Nombre' => 'Tecnico',
            'Descripcion' => 'Controla acceso a ventas y servicios.'
        ]);
    }
}
