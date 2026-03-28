@extends('layouts.app')

@section('title', 'Tareas')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Tareas por Grupo</h1>
        <a href="{{ route('tareas.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">+ Crear tarea</a>
    </div>

    <div class="space-y-6">
        @php $grupos = $tareas->groupBy('grupo.nombre'); @endphp
        @forelse($grupos as $grupoNombre => $grupoTareas)
            <div class="bg-white shadow-md rounded-lg p-4">
                <h2 class="text-lg font-semibold text-gray-700 mb-3">{{ $grupoNombre ?? 'Sin grupo' }}</h2>
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-600 uppercase">Título</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-600 uppercase">Fecha límite</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-600 uppercase">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($grupoTareas as $tarea)
                            <tr>
                                <td class="px-4 py-3 text-sm text-gray-700">{{ $tarea->titulo }}</td>
                                <td class="px-4 py-3 text-sm text-gray-700">{{ 
                                    
                                    
                                    optional($tarea->fecha_entrega)->format('d/m/Y') ?? $tarea->fecha_entrega
                                }}</td>
                                <td class="px-4 py-3 text-sm text-gray-700">
                                    <a href="{{ route('tareas.show', $tarea->id) }}" class="text-blue-600 hover:underline">Ver</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @empty
            <div class="bg-white shadow-md rounded-lg p-6 text-center text-gray-600">No hay tareas registradas.</div>
        @endforelse
    </div>
</div>
@endsection
