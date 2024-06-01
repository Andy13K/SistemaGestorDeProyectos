<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'user_id',
        'status',  // Asegúrate de tener este campo
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

    public function tareas()
    {
        return $this->hasMany(Tarea::class, 'proyecto_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function calcularProgreso()
    {
        $totalTareas = $this->tareas()->count();
        $tareasCompletadas = $this->tareas()->where('estado', 'Entregado')->count();

        if ($totalTareas === 0) {
            return 0;
        }

        return ($tareasCompletadas / $totalTareas) * 100;
    }




}
