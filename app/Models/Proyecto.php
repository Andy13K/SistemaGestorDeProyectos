<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Proyecto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'categoria_id',
        'lider_id',
        'cliente_id',
        'num_computadoras',
        'presupuesto',
        'fecha_limite',
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function lider()
    {
        return $this->belongsTo(User::class, 'lider_id');
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function auditorias()
    {
        return $this->hasMany(Auditoria::class);
    }

    public function tareas()
    {
        return $this->hasMany(Tarea::class, 'proyecto_id');
    }

    // Accesor para calcular los días restantes
    public function getDiasRestantesAttribute()
    {
        if (!$this->fecha_limite) {
            return 'Sin fecha límite';
        }
        $fechaLimite = Carbon::parse($this->fecha_limite);
        $fechaCreacion = Carbon::parse($this->created_at);
        return $fechaLimite->diffInDays(Carbon::now(), false);
    }
}

