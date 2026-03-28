<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Horario extends Model
{
    use HasFactory;

    public $fillable = [
        'materia_id',
        'usuario_id',
        'horario_inicio',
        'horario_fin'
    ];

    public $casts = [
        'horario_inicio' => 'datetime:H:i',
        'horario_fin' => 'datetime:H:i',
    ];

    public function materia()
    {
        return $this->belongsTo(Materia::class);
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    public function grupos()
    {
        return $this->hasMany(Grupo::class);
    }
}