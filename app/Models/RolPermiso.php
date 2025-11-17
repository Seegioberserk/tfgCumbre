<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolPermiso extends Model
{
    protected $fillable = [
        'id_rol',
        'id_permiso',
        
    ];

    protected $hidden = [
        'created_at',
    ];

    
    public function rol()
    {
        return $this->belongsTo(Rol::class, 'id_rol'); // Uno a muchos, solo tiene 1 rol
    }
    public function permiso()
    {
        return $this->belongsTo(Permiso::class, 'id_permiso'); // Uno a muchos, solo tiene 1 rol
    }

    public function toShow(): array
    {
        return [
            'name' => $this->username,
            'email' => $this->email,
            'foto' => $this->foto,
            'rol' => [
                'Nombre' => $this -> rol -> nombre ?? null, // Si no existe nombre, devuelve null
                'Descripcion' => $this -> rol -> descripcion ?? null,
            ],
            'permiso' => [
                'Nombre' => $this -> permiso -> nombre ?? null, // Si no existe nombre, devuelve null
                'Descripcion' => $this -> permiso -> descripcion ?? null,
            ],
        ];
    }
}
