<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EquipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('equipos')->insert([
            [
                'Marca' => 'HP',
                'Modelo' => '250 G7',
                'Serie' => 'HP250G7-001',
                'id_cliente' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Marca' => 'Dell',
                'Modelo' => 'Inspiron 15',
                'Serie' => 'DELLI15-002',
                'id_cliente' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Marca' => 'Lenovo',
                'Modelo' => 'ThinkPad X1',
                'Serie' => 'LENOVOX1-003',
                'id_cliente' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Marca' => 'Samsung',
                'Modelo' => 'Galaxy S21',
                'Serie' => 'SAMS21-004',
                'id_cliente' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Marca' => 'Apple',
                'Modelo' => 'MacBook Pro',
                'Serie' => 'MACPRO-005',
                'id_cliente' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
