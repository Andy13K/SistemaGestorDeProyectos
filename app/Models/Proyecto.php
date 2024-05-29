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
        'fecha',
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
}
