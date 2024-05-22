<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsignacionRecurso extends Model
{
    use HasFactory;

    protected $table = 'asignacionrecursos';

    protected $fillable = [
        'proyecto_id',
        'usuario_id',
        'num_computadoras',
        'presupuesto',
        'fecha_limite',
    ];

    public function proyecto()
    {
        return $this->belongsTo(Proyecto::class, 'proyecto_id');
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }
}
