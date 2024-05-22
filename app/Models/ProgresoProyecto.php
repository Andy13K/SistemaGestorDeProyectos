<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgresoProyecto extends Model
{
    use HasFactory;

    protected $table = 'progreso_proyectos';

    protected $fillable = [
        'proyecto_id',
        'porcentaje',
        'descripcion',
    ];

    public function proyecto()
    {
        return $this->belongsTo(Proyecto::class, 'proyecto_id');
    }
}
