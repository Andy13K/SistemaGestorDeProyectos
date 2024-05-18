<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre', 'descripcion', 'categoria', 'lider_id', 'cliente_id',
        'fecha', 'num_computadoras', 'presupuesto', 'fecha_limite'
    ];

    public function lider()
    {
        return $this->belongsTo(Usuario::class, 'lider_id');
    }

    public function cliente()
    {
        return $this->belongsTo(Usuario::class, 'cliente_id');
    }

    public function recursos()
    {
        return $this->hasMany(Asignacionrecurso::class);
    }

    public function auditorias()
    {
        return $this->hasMany(Auditoria::class);
    }

    public function tareas()
    {
        return $this->hasMany(Tarea::class);
    }
}
