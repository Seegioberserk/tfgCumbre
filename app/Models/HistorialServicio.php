<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistorialServicio extends Model
{
    use HasFactory;

    protected $table = 'historial_servicios';

    protected $fillable = [
        'fecha',
        'Descripcion',
        'id_servicio',
        'id_user',
    ];

    // Relaciones
    public function servicio()
    {
        return $this->belongsTo(Servicio::class, 'id_servicio');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
