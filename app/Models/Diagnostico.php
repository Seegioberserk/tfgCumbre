<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnostico extends Model
{
    use HasFactory;

    protected $table = 'diagnosticos';

    protected $fillable = [
        'Descripcion',
        'CostoEstimado',
        'fecha',
        'id_servicio'
    ];

    // Relación con Servicio
    public function servicio()
    {
        return $this->belongsTo(Servicio::class, 'id_servicio');
    }
}
