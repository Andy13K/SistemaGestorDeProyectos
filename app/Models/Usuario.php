<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Usuario extends Authenticatable
{
    use HasFactory;

    protected $fillable = ['nombre', 'email', 'password', 'rol'];

    public function proyectosLider()
    {
        return $this->hasMany(Proyecto::class, 'lider_id');
    }

    public function proyectosCliente()
    {
        return $this->hasMany(Proyecto::class, 'cliente_id');
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user', 'usuario_id', 'role_id');
    }
}
