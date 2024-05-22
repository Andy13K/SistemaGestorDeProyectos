<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $table = 'usuarios';

    protected $fillable = [
        'nombre',
        'email',
        'password',
        'rol',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function proyectosLiderados()
    {
        return $this->hasMany(Proyecto::class, 'lider_id');
    }

    public function proyectos()
    {
        return $this->belongsToMany(Proyecto::class, 'asignacionrecursos', 'usuario_id', 'proyecto_id');
    }
}
