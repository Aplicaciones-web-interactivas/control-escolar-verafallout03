@extends('layouts.app')

@section('title', 'Detalle Entrega')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Detalle de entrega</h1>

    <div class="bg-white shadow-md rounded-lg p-6 space-y-4">
        <div>
            <h2 class="text-lg font-semibold text-gray-700">Tarea</h2>
            <p class="text-gray-600">{{ $entrega->tarea->titulo ?? '—' }}</p>
        </div>

        <div>
            <h2 class="text-lg font-semibold text-gray-700">Alumno</h2>
            <p class="text-gray-600">{{ $entrega->alumno->nombre ?? '—' }}</p>
        </div>

        <div>
            <h2 class="text-lg font-semibold text-gray-700">Archivo</h2>
            <p class="text-gray-600"><a href="{{ asset('storage/' . $entrega->archivo_pdf) }}" target="_blank" class="text-blue-600 hover:underline">Descargar PDF</a></p>
        </div>

        <div>
            <h2 class="text-lg font-semibold text-gray-700">Fecha de subida</h2>
            <p class="text-gray-600">{{ $entrega->fecha_subida ?? $entrega->created_at->format('d/m/Y H:i') }}</p>
        </div>
    </div>

    <div class="flex justify-end space-x-3 mt-6">
        <a href="{{ route('entregas.index') }}" class="bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400 transition">Volver</a>
    </div>
</div>
@endsection
