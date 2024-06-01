<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    protected $table = 'users';

    protected $fillable = [
        'name',
        'email',
        'password',
        'role', // Puedes remover 'role' si no lo necesitas directamente en el modelo
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
        return $this->belongsToMany(Proyecto::class, 'asignacionrecursos', 'user_id', 'proyecto_id');
    }
}
