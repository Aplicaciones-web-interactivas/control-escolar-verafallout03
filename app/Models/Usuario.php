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
        'clave_institucional',
        'contrasena',
        'rol',
        'activo',
    ];

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
