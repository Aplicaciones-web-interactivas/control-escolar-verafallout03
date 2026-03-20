<?php

namespace App\Http\Controllers;

use App\Models\grupos;
use App\Models\horarios;
use Illuminate\Http\Request;

class gruposController extends Controller
{

    public function index()
    {
        $grupos = grupos::with('horario')->get();
        return response()->json($grupos);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'horario_id' => 'required|exists:horarios,id'
        ]);

        $grupo = grupos::create($request->all());
        return response()->json($grupo, 201);
    }

    public function show(string $id)
    {
        $grupo = grupos::with('horario')->findOrFail($id);
        return response()->json($grupo);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre' => 'sometimes|string|max:255',
            'horario_id' => 'sometimes|exists:horarios,id'
        ]);

        $grupo = grupos::findOrFail($id);
        $grupo->update($request->all());
        
        return response()->json($grupo);
    }


    public function destroy(string $id)
    {
        $grupo = grupos::findOrFail($id);
        $grupo->delete();
        
        return response()->json(['message' => 'Grupo eliminado correctamente']);
    }
}