<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categorias')->insert([
            [
                'Nombre' => 'Laptops',
                'Descripcion' => 'Categoría de computadoras portátiles',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Nombre' => 'Celulares',
                'Descripcion' => 'Categoría de teléfonos móviles',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Nombre' => 'Accesorios',
                'Descripcion' => 'Categoría de accesorios y periféricos',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Nombre' => 'Repuestos',
                'Descripcion' => 'Categoría de piezas de repuesto para equipos',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Nombre' => 'Servicios',
                'Descripcion' => 'Categoría de servicios técnicos y mantenimiento',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
