@extends('layouts.app')

@section('title', 'Detalle Tarea')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">{{ $tarea->titulo }}</h1>

    <div class="bg-white shadow-md rounded-lg p-6 space-y-4">
        <div>
            <h2 class="text-lg font-semibold text-gray-700">Descripción</h2>
            <p class="text-gray-600">{{ $tarea->descripcion ?? 'Sin descripción' }}</p>
        </div>

        <div>
            <h2 class="text-lg font-semibold text-gray-700">Grupo</h2>
            <p class="text-gray-600">{{ $tarea->grupo->nombre ?? '—' }}</p>
        </div>

        <div>
            <h2 class="text-lg font-semibold text-gray-700">Fecha de entrega</h2>
            <p class="text-gray-600">{{ optional($tarea->fecha_entrega)->format('d/m/Y') ?? $tarea->fecha_entrega }}</p>
        </div>

        <div>
            <h2 class="text-lg font-semibold text-gray-700">Entregas</h2>
            @if($tarea->entregas->isNotEmpty())
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-600 uppercase">Alumno</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-600 uppercase">Archivo</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-600 uppercase">Fecha</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-600 uppercase">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($tarea->entregas as $entrega)
                            <tr>
                                <td class="px-4 py-3 text-sm text-gray-700">{{ $entrega->alumno->nombre ?? '—' }}</td>
                                <td class="px-4 py-3 text-sm text-gray-700"><a href="{{ asset('storage/' . $entrega->archivo_pdf) }}" target="_blank" class="text-blue-600 hover:underline">PDF</a></td>
                                <td class="px-4 py-3 text-sm text-gray-700">{{ $entrega->created_at->format('d/m/Y H:i') }}</td>
                                <td class="px-4 py-3 text-sm text-gray-700"><a href="{{ route('entregas.show', $entrega->id) }}" class="text-blue-600 hover:underline">Ver</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="text-gray-600">Aún no hay entregas para esta tarea.</p>
            @endif
        </div>
    </div>

    <div class="flex justify-end space-x-3 mt-6">
        <a href="{{ route('tareas.index') }}" class="bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400 transition">Volver</a>
    </div>
</div>
@endsection
