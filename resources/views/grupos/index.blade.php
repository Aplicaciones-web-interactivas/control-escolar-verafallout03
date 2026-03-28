@extends('layouts.app')

@section('title', 'Listado de Grupos')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Listado de Grupos</h1>
        <a href="{{ route('grupos.create') }}" 
           class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
            + Crear nuevo grupo
        </a>
    </div>

    {{-- Mensajes de éxito --}}
    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    {{-- Tabla de grupos --}}
    <div class="overflow-x-auto bg-white shadow-md rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Nombre</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Materia</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Maestro</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($grupos as $grupo)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 text-sm text-gray-700">{{ $grupo->id }}</td>
                        <td class="px-6 py-4 text-sm text-gray-700">{{ $grupo->nombre }}</td>
                        <td class="px-6 py-4 text-sm text-gray-700">{{ $grupo->materia->nombre ?? 'Sin materia' }}</td>
                        <td class="px-6 py-4 text-sm text-gray-700">{{ $grupo->usuario->nombre ?? 'Sin maestro' }}</td>
                        <td class="px-6 py-4 text-sm">
                            <a href="{{ route('grupos.show', $grupo->id) }}" 
                               class="text-blue-600 hover:underline mr-2">Ver</a>
                            <a href="{{ route('grupos.edit', $grupo->id) }}" 
                               class="text-yellow-600 hover:underline mr-2">Editar</a>
                            <form action="{{ route('grupos.destroy', $grupo->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="text-red-600 hover:underline"
                                        onclick="return confirm('¿Seguro que deseas eliminar este grupo?')">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                            No hay grupos registrados.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
