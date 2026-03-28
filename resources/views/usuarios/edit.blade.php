@extends('layouts.app')

@section('title', 'Editar Usuario')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Editar usuario</h1>

    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST" class="bg-white shadow-md rounded-lg p-6 space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
            <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $usuario->nombre) }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div>
            <label for="clave_institucional" class="block text-sm font-medium text-gray-700">Clave institucional</label>
            <input type="text" name="clave_institucional" id="clave_institucional" value="{{ old('clave_institucional', $usuario->clave_institucional) }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div>
            <label for="contrasena" class="block text-sm font-medium text-gray-700">Contraseña (dejar en blanco para mantener)</label>
            <input type="password" name="contrasena" id="contrasena" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div>
            <label for="rol" class="block text-sm font-medium text-gray-700">Rol</label>
            <select name="rol" id="rol" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                <option value="admin" {{ old('rol', $usuario->rol) === 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="maestro" {{ old('rol', $usuario->rol) === 'maestro' ? 'selected' : '' }}>Maestro</option>
                <option value="alumno" {{ old('rol', $usuario->rol) === 'alumno' ? 'selected' : '' }}>Alumno</option>
            </select>
        </div>

        <div class="flex items-center space-x-3">
            <label class="flex items-center space-x-2">
                <input type="checkbox" name="activo" value="1" {{ $usuario->activo ? 'checked' : '' }} class="h-4 w-4 text-blue-600">
                <span class="text-sm text-gray-700">Activo</span>
            </label>
        </div>

        <div class="flex justify-end space-x-3">
            <a href="{{ route('usuarios.index') }}" class="bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400 transition">Cancelar</a>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Guardar</button>
        </div>
    </form>
</div>
@endsection
