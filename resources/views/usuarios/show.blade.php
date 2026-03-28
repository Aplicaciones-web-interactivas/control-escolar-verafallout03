@extends('layouts.app')

@section('title', 'Detalle Usuario')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Detalle del usuario</h1>

    <div class="bg-white shadow-md rounded-lg p-6 space-y-4">
        <div>
            <h2 class="text-lg font-semibold text-gray-700">Nombre</h2>
            <p class="text-gray-600">{{ $usuario->nombre }}</p>
        </div>

        <div>
            <h2 class="text-lg font-semibold text-gray-700">Clave institucional</h2>
            <p class="text-gray-600">{{ $usuario->clave_institucional }}</p>
        </div>

        <div>
            <h2 class="text-lg font-semibold text-gray-700">Rol</h2>
            <p class="text-gray-600">{{ $usuario->rol }}</p>
        </div>

        <div>
            <h2 class="text-lg font-semibold text-gray-700">Estado</h2>
            <p class="text-gray-600">{{ $usuario->activo ? 'Activo' : 'Inactivo' }}</p>
        </div>

        <div>
            <h2 class="text-lg font-semibold text-gray-700">Fecha de creación</h2>
            <p class="text-gray-600">{{ $usuario->created_at->format('d/m/Y') }}</p>
        </div>
    </div>

    <div class="flex justify-end space-x-3 mt-6">
        <a href="{{ route('usuarios.index') }}" class="bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400 transition">Volver</a>
        <a href="{{ route('usuarios.edit', $usuario->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 transition">Editar</a>
    </div>
</div>
@endsection
