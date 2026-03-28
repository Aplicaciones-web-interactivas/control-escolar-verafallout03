@extends('layouts.app')

@section('title', 'Entregas')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Entregas</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="bg-white shadow-md rounded-lg p-4">
            <h2 class="text-lg font-semibold text-gray-700 mb-3">Tareas pendientes</h2>
            @if(isset($pendientes) && $pendientes->isNotEmpty())
                <ul class="space-y-2">
                    @foreach($pendientes as $tarea)
                        <li class="flex justify-between items-center">
                            <div>
                                <div class="text-sm font-medium text-gray-700">{{ $tarea->titulo }}</div>
                                <div class="text-xs text-gray-500">{{ $tarea->grupo->nombre ?? '' }} — Entrega: {{ optional($tarea->fecha_entrega)->format('d/m/Y') ?? $tarea->fecha_entrega }}</div>
                            </div>
                            <a href="{{ route('entregas.create', ['tarea_id' => $tarea->id]) }}" class="bg-blue-600 text-white px-3 py-1 rounded">Entregar</a>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="text-gray-600">No hay tareas pendientes.</p>
            @endif
        </div>

        <div class="bg-white shadow-md rounded-lg p-4">
            <h2 class="text-lg font-semibold text-gray-700 mb-3">Entregas realizadas</h2>
            @if($entregas->isNotEmpty())
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-600 uppercase">Tarea</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-600 uppercase">Archivo</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-600 uppercase">Fecha</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-600 uppercase">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($entregas as $entrega)
                            <tr>
                                <td class="px-4 py-3 text-sm text-gray-700">{{ $entrega->tarea->titulo ?? '—' }}</td>
                                <td class="px-4 py-3 text-sm text-gray-700"><a href="{{ asset('storage/' . $entrega->archivo_pdf) }}" target="_blank" class="text-blue-600 hover:underline">PDF</a></td>
                                <td class="px-4 py-3 text-sm text-gray-700">{{ $entrega->created_at->format('d/m/Y H:i') }}</td>
                                <td class="px-4 py-3 text-sm text-gray-700"><a href="{{ route('entregas.show', $entrega->id) }}" class="text-blue-600 hover:underline">Ver</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="text-gray-600">Aún no has enviado entregas.</p>
            @endif
        </div>
    </div>
</div>
@endsection
