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
        'user_id', // Cambiar de 'usuario_id' a 'user_id'
        'num_computadoras',
        'presupuesto',
        'fecha_limite',
    ];

    public function proyecto()
    {
        return $this->belongsTo(Proyecto::class, 'proyecto_id');
    }

    public function user() // Cambiar de 'usuario' a 'user'
    {
        return $this->belongsTo(User::class, 'user_id'); // Cambiar de 'usuario_id' a 'user_id'
    }
}
