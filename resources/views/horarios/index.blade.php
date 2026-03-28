@extends('layouts.app')

@section('title', 'Listado de Horarios')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Listado de Horarios</h1>
        <a href="{{ route('horarios.create') }}" 
           class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
            + Crear horario
        </a>
    </div>

    {{-- Mensajes de éxito --}}
    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    {{-- Tabla de horarios --}}
    <div class="overflow-x-auto bg-white shadow-md rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Grupo</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Materia</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Maestro</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Hora</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($horarios as $horario)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 text-sm text-gray-700">{{ $horario->grupo->nombre }}</td>
                        <td class="px-6 py-4 text-sm text-gray-700">{{ $horario->materia->nombre }}</td>
                        <td class="px-6 py-4 text-sm text-gray-700">{{ $horario->usuario->nombre }}</td>
                        <td class="px-6 py-4 text-sm text-gray-700">{{ $horario->hora }}</td>
                        <td class="px-6 py-4 text-sm">
                            <a href="{{ route('horarios.show', $horario->id) }}" 
                               class="text-blue-600 hover:underline mr-2">Ver</a>
                            <a href="{{ route('horarios.edit', $horario->id) }}" 
                               class="text-yellow-600 hover:underline mr-2">Editar</a>
                            <form action="{{ route('horarios.destroy', $horario->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="text-red-600 hover:underline"
                                        onclick="return confirm('¿Seguro que deseas eliminar este horario?')">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                            No hay horarios registrados.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
