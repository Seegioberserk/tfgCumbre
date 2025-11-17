<?php

namespace Database\Seeders;   
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;


//use App\Models\Rol; 

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
                RolSeeder::class,
                UserSeeder::class,
                PermisoSeeder::class,
                RolPermisoSeeder::class,
                CategoriaSeeder::class, 
                ServicioSeeder::class,
                EquipoSeeder::class,
                ServicioSeeder::class,
         ]);
    }
}
