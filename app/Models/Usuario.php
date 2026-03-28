<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use Notifiable;

    protected $table = 'usuarios';

    protected $fillable = [
        'nombre',
        'clave_institucional',
        'contrasena',
        'rol',
        'activo',
    ];

    protected $hidden = [
        'contrasena',
    ];


    public function getAuthPassword()
    {
        return $this->contrasena;
    }

    // Relaciones
    public function horarios()
    {
        return $this->hasMany(Horario::class);
    }

    public function inscripciones()
    {
        return $this->hasMany(Inscripcion::class);
    }

    public function tareas()
    {
        return $this->hasMany(Tarea::class);
    }

    public function entregas()
    {
        return $this->hasMany(Entrega::class);
    }
}
