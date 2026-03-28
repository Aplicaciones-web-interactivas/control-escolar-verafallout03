<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    use HasFactory;

    protected $table = 'tareas';

    protected $fillable = [
        'grupo_id',
        'usuario_id',
        'titulo',
        'descripcion',
        'fecha_entrega',
    ];

    // Relaciones
    public function grupo()
    {
        return $this->belongsTo(Grupo::class);
    }

    public function maestro()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }

    public function entregas()
    {
        return $this->hasMany(Entrega::class);
    }
}
