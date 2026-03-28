<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use Illuminate\Http\Request;

class materiasController extends Controller
{
    public function index()
    {
        return Materia::all();
    }

    public function show($id)
    {
        return Materia::findOrFail($id);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'clave' => 'required|string|unique:materias',
        ]);

        return Materia::create($validated);
    }

    public function update(Request $request, $id)
    {
        $materia = Materia::findOrFail($id);
        $materia->update($request->all());
        return $materia;
    }

    public function destroy($id)
    {
        Materia::destroy($id);
        return response()->noContent();
    }
}
