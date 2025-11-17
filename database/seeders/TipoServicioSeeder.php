<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoServicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tipo_servicios')->insert([
            [
                'Nombre' => 'Reparación',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Nombre' => 'Mantenimiento',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Nombre' => 'Instalación de Software',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Nombre' => 'Limpieza Interna',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Nombre' => 'Actualización de Sistema',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
