@extends('layouts.app')

@section('title', 'Detalle de Inscripción')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Detalle de la inscripción</h1>

    <div class="bg-white shadow-md rounded-lg p-6 space-y-4">
        <div>
            <h2 class="text-lg font-semibold text-gray-700">Grupo</h2>
            <p class="text-gray-600">{{ $inscripcion->grupo->nombre ?? '—' }}</p>
        </div>

        <div>
            <h2 class="text-lg font-semibold text-gray-700">Materia</h2>
            <p class="text-gray-600">{{ $inscripcion->grupo->horario->materia->nombre ?? ($inscripcion->grupo->materia->nombre ?? '—') }}</p>
        </div>

        <div>
            <h2 class="text-lg font-semibold text-gray-700">Alumno</h2>
            <p class="text-gray-600">{{ $inscripcion->alumno->nombre ?? '—' }}</p>
        </div>

        <div>
            <h2 class="text-lg font-semibold text-gray-700">Fecha de inscripción</h2>
            <p class="text-gray-600">{{ $inscripcion->created_at->format('d/m/Y H:i') }}</p>
        </div>

        <div>
            <h2 class="text-lg font-semibold text-gray-700">Estado</h2>
            <p class="text-gray-600">Inscrito</p>
        </div>
    </div>

    <div class="flex justify-end space-x-3 mt-6">
        <a href="{{ route('inscripciones.index') }}" class="bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400 transition">Volver</a>
    </div>
</div>
@endsection
