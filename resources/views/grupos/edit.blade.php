@extends('layouts.app')

@section('title', 'Editar Grupo')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Editar grupo</h1>

    {{-- Mensajes de error --}}
    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('grupos.update', $grupo->id) }}" method="POST" 
          class="bg-white shadow-md rounded-lg p-6 space-y-4">
        @csrf
        @method('PUT')

        {{-- Nombre del grupo --}}
        <div>
            <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre del grupo</label>
            <input type="text" name="nombre" id="nombre" 
                   value="{{ old('nombre', $grupo->nombre) }}"
                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                   required>
        </div>

        {{-- Materia --}}
        <div>
            <label for="materia_id" class="block text-sm font-medium text-gray-700">Materia</label>
            <select name="materia_id" id="materia_id" 
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    required>
                <option value="">Selecciona una materia</option>
                @foreach($materias as $materia)
                    <option value="{{ $materia->id }}" 
                        {{ old('materia_id', $grupo->materia_id) == $materia->id ? 'selected' : '' }}>
                        {{ $materia->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Maestro --}}
        <div>
            <label for="usuario_id" class="block text-sm font-medium text-gray-700">Maestro</label>
            <select name="usuario_id" id="usuario_id" 
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    required>
                <option value="">Selecciona un maestro</option>
                @foreach($maestros as $maestro)
                    <option value="{{ $maestro->id }}" 
                        {{ old('usuario_id', $grupo->usuario_id) == $maestro->id ? 'selected' : '' }}>
                        {{ $maestro->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Botones --}}
        <div class="flex justify-end space-x-3">
            <a href="{{ route('grupos.index') }}" 
               class="bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400 transition">
                Cancelar
            </a>
            <button type="submit" 
                    class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                Actualizar grupo
            </button>
        </div>
    </form>
</div>
@endsection
