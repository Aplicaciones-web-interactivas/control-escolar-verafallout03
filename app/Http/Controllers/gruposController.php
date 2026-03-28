<?php

namespace App\Http\Controllers;

use App\Models\Grupo;
use Illuminate\Http\Request;

class gruposController extends Controller
{
    public function index()
    {
        return Grupo::with('horario')->get();
    }

    public function show($id)
    {
        return Grupo::with('horario')->findOrFail($id);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'horario_id' => 'required|exists:horarios,id',
        ]);

        return Grupo::create($validated);
    }

    public function update(Request $request, $id)
    {
        $grupo = Grupo::findOrFail($id);
        $grupo->update($request->all());
        return $grupo;
    }

    public function destroy($id)
    {
        Grupo::destroy($id);
        return response()->noContent();
    }
}
