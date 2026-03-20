<?php

namespace App\Http\Controllers;

use App\Models\horarios;
use App\Models\materias;
use App\Models\usuarios;
use Illuminate\Http\Request;

class horariosController extends Controller
{

    public function index()
    {
        $horarios = horarios::with(['materia', 'usuario'])->get();
        return response()->json($horarios);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $materias = materias::all();
        $usuarios = usuarios::all();
        return view('horarios.create', compact('materias', 'usuarios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'materia_id' => 'required|exists:materias,id',
            'usuario_id' => 'required|exists:usuarios,id',
            'horario_inicio' => 'required|date_format:H:i',
            'horario_fin' => 'required|date_format:H:i|after:horario_inicio'
        ]);

        $horario = horarios::create($request->all());
        
        if ($request->expectsJson()) {
            return response()->json($horario, 201);
        }
        
        return redirect()->route('horarios.index')
            ->with('success', 'Horario creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $horario = horarios::with(['materia', 'usuario'])->findOrFail($id);
        
        if (request()->expectsJson()) {
            return response()->json($horario);
        }
        
        return view('horarios.show', compact('horario'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $horario = horarios::findOrFail($id);
        $materias = materias::all();
        $usuarios = usuarios::all();
        
        return view('horarios.edit', compact('horario', 'materias', 'usuarios'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'materia_id' => 'sometimes|exists:materias,id',
            'usuario_id' => 'sometimes|exists:usuarios,id',
            'horario_inicio' => 'sometimes|date_format:H:i',
            'horario_fin' => 'sometimes|date_format:H:i|after:horario_inicio'
        ]);

        $horario = horarios::findOrFail($id);
        $horario->update($request->all());
        
        if ($request->expectsJson()) {
            return response()->json($horario);
        }
        
        return redirect()->route('horarios.index')
            ->with('success', 'Horario actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $horario = horarios::findOrFail($id);
        $horario->delete();
        
        if (request()->expectsJson()) {
            return response()->json(['message' => 'Horario eliminado correctamente']);
        }
        
        return redirect()->route('horarios.index')
            ->with('success', 'Horario eliminado exitosamente.');
    }

    /**
     * Get horarios by usuario
     */
    public function getByUsuario($usuario_id)
    {
        $horarios = horarios::with(['materia'])
            ->where('usuario_id', $usuario_id)
            ->get();
            
        return response()->json($horarios);
    }

    /**
     * Get horarios by materia
     */
    public function getByMateria($materia_id)
    {
        $horarios = horarios::with(['usuario'])
            ->where('materia_id', $materia_id)
            ->get();
            
        return response()->json($horarios);
    }
}