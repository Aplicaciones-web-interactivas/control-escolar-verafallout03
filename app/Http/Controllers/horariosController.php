<?php

namespace App\Http\Controllers;

use App\Models\Horario;
use Illuminate\Http\Request;

class horariosController extends Controller
{
    public function index()
    {
        return Horario::with(['materia','usuario'])->get();
    }

    public function show($id)
    {
        return Horario::with(['materia','usuario'])->findOrFail($id);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'materia_id' => 'required|exists:materias,id',
            'usuario_id' => 'required|exists:usuarios,id',
            'horario_inicio' => 'required',
            'horario_fin' => 'required',
        ]);

        return Horario::create($validated);
    }

    public function update(Request $request, $id)
    {
        $horario = Horario::findOrFail($id);
        $horario->update($request->all());
        return $horario;
    }

    public function destroy($id)
    {
        Horario::destroy($id);
        return response()->noContent();
    }
}
