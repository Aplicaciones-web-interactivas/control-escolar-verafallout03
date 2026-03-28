@extends('layouts.app')

@section('title', 'Usuarios')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Listado de Usuarios</h1>
        <a href="{{ route('usuarios.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">+ Crear usuario</a>
    </div>

    <div class="overflow-x-auto bg-white shadow-md rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Nombre</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Clave institucional</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Rol</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Estado</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($usuarios as $usuario)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $usuario->nombre }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $usuario->clave_institucional }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $usuario->rol }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                            @if($usuario->activo)
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Activo</span>
                            @else
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Inactivo</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                            <a href="{{ route('usuarios.show', $usuario->id) }}" class="text-blue-600 hover:underline mr-3">Ver</a>
                            <a href="{{ route('usuarios.edit', $usuario->id) }}" class="text-yellow-600 hover:underline mr-3">Editar</a>
                            <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST" class="inline" onsubmit="return confirm('Eliminar usuario?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-gray-600">No hay usuarios.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
