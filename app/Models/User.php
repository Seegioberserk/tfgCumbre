<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable

{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'foto',
        'id_rol',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function rol()
    {
        return $this->belongsTo(Rol::class, 'id_rol'); // Uno a muchos, solo tiene 1 rol
    }

    public function toShow(): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'foto' => $this->foto,
            'rol' => [
                'Nombre' => $this -> rol -> nombre ?? null, // Si no existe nombre, devuelve null
                'Descripcion' => $this -> rol -> descripcion ?? null,
            ],
        ];
    }
}
