<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Grupo extends Model
{
    use HasFactory;

    public $fillable = [
        'nombre',
        'horario_id'
    ];

    public function horario()
    {
        return $this->belongsTo(Horario::class);
    }
}