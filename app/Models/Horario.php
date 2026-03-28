<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    use HasFactory;

    protected $table = 'horarios';

    protected $fillable = [
        'materia_id',
        'usuario_id',
        'horario_inicio',
        'horario_fin',
    ];

    // Relaciones
    public function materia()
    {
        return $this->belongsTo(Materia::class);
    }

    public function profesor()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }

    public function grupos()
    {
        return $this->hasMany(Grupo::class);
    }
}
