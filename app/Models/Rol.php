<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $fillable =[ //Todos los atributos creados para crear
        'Nombre',
        'Descripcion',
    ];
    protected $hidden =[ //todos los  atributos que no queremos que se traigan  el get
       'created_at'
    ];
    public function  toshow():array {
        return[
            'Nombre' => $this-> Nombre,
            'Descripcion' =>$this-> Descripcion,
        ];
    }
}
