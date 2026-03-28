<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use Illuminate\Http\Request;

class tareasController extends Controller
{
    public function index()
    {
        return Tarea::with(['grupo','maestro'])->get();
    }

    public function show($id)
    {
        return Tarea::with(['grupo','maestro','entregas'])->findOrFail($id);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'grupo_id' => 'required|exists:grupos,id',
            'usuario_id' => 'required|exists:usuarios,id',
            'titulo' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'fecha_entrega' => 'required|date',
        ]);

        return Tarea::create($validated);
    }

    public function update(Request $request, $id)
    {
        $tarea = Tarea::findOrFail($id);
        $tarea->update($request->all());
        return $tarea;
    }

    public function destroy($id)
    {
        Tarea::destroy($id);
        return response()->noContent();
    }
}
