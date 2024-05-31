<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
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



