<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class usuariosController extends Controller
{
    public function index()
    {
        return Usuario::all();
    }

    public function show($id)
    {
        return Usuario::findOrFail($id);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'clave_institucional' => 'required|string|unique:usuarios',
            'contrasena' => 'required|string',
            'rol' => 'required|string',
            'activo' => 'boolean',
        ]);

        return Usuario::create($validated);
    }

    public function update(Request $request, $id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->update($request->all());
        return $usuario;
    }

    public function destroy($id)
    {
        Usuario::destroy($id);
        return response()->noContent();
    }
}
