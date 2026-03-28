@extends('layouts.app')

@section('title', 'Detalle del Horario')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Detalle del horario</h1>

    <div class="bg-white shadow-md rounded-lg p-6 space-y-4">
        <div>
            <h2 class="text-lg font-semibold text-gray-700">Grupo</h2>
            <p class="text-gray-600">{{ $horario->grupo->nombre }}</p>
        </div>

        <div>
            <h2 class="text-lg font-semibold text-gray-700">Materia</h2>
            <p class="text-gray-600">{{ $horario->materia->nombre }}</p>
        </div>

        <div>
            <h2 class="text-lg font-semibold text-gray-700">Maestro</h2>
            <p class="text-gray-600">{{ $horario->usuario->nombre }}</p>
        </div>

        <div>
            <h2 class="text-lg font-semibold text-gray-700">Hora</h2>
            <p class="text-gray-600">{{ $horario->hora }}</p>
        </div>

        <div>
            <h2 class="text-lg font-semibold text-gray-700">Fecha de creación</h2>
            <p class="text-gray-600">{{ $horario->created_at->format('d/m/Y') }}</p>
        </div>
    </div>

    {{-- Botones de acción --}}
    <div class="flex justify-end space-x-3 mt-6">
        <a href="{{ route('horarios.index') }}" 
           class="bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400 transition">
            Volver al listado
        </a>
        <a href="{{ route('horarios.edit', $horario->id) }}" 
           class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 transition">
            Editar
        </a>
        <form action="{{ route('horarios.destroy', $horario->id) }}" method="POST" class="inline">
            @csrf
            @method('DELETE')
            <button type="submit" 
                    class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 transition"
                    onclick="return confirm('¿Seguro que deseas eliminar este horario?')">
                Eliminar
            </button>
        </form>
    </div>
</div>
@endsection
