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
        'fecha',
        'fecha_limite',
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function lider()
    {
        return $this->belongsTo(Usuario::class, 'lider_id');
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}
