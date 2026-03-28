<?php

namespace App\Http\Controllers;

use App\Models\Entrega;
use Illuminate\Http\Request;

class entregasController extends Controller
{
    public function index()
    {
        return Entrega::with(['tarea','alumno'])->get();
    }

    public function show($id)
    {
        return Entrega::with(['tarea','alumno'])->findOrFail($id);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tarea_id' => 'required|exists:tareas,id',
            'usuario_id' => 'required|exists:usuarios,id',
            'archivo_pdf' => 'required|mimes:pdf|max:2048',
        ]);

        $path = $request->file('archivo_pdf')->store('entregas', 'public');
        $validated['archivo_pdf'] = $path;

        return Entrega::create($validated);
    }

    public function update(Request $request, $id)
    {
        $entrega = Entrega::findOrFail($id);
        $entrega->update($request->all());
        return $entrega;
    }

    public function destroy($id)
    {
        Entrega::destroy($id);
        return response()->noContent();
    }
}
