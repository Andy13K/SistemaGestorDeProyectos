<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    use HasFactory;

    protected $table = 'proyectos';

    protected $fillable = [
        'nombre',
        'descripcion',
        'categoria_id',
        'lider_id',
        'cliente_id',
        'fecha',
        'num_computadoras',
        'presupuesto',
        'fecha_limite',
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }

    public function lider()
    {
        return $this->belongsTo(Usuario::class, 'lider_id');
    }

    public function recursosAsignados()
    {
        return $this->belongsToMany(Usuario::class, 'asignacionrecursos', 'proyecto_id', 'usuario_id');
    }

    public function progreso()
    {
        return $this->hasMany(ProgresoProyecto::class, 'proyecto_id');
    }
}
