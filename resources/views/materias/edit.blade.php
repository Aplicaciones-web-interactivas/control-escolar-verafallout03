@extends('layouts.app')

@section('title', 'Editar Materia')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Editar materia</h1>

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

    <form action="{{ route('materias.update', $materia->id) }}" method="POST" 
          class="bg-white shadow-md rounded-lg p-6 space-y-4">
        @csrf
        @method('PUT')

        {{-- Nombre de la materia --}}
        <div>
            <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre de la materia</label>
            <input type="text" name="nombre" id="nombre" 
                   value="{{ old('nombre', $materia->nombre) }}"
                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm 
                          focus:ring-blue-500 focus:border-blue-500"
                   required>
        </div>

        {{-- Descripción --}}
        <div>
            <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción</label>
            <textarea name="descripcion" id="descripcion" rows="3"
                      class="mt-1 block w-full border-gray-300 rounded-md shadow-sm 
                             focus:ring-blue-500 focus:border-blue-500">{{ old('descripcion', $materia->descripcion) }}</textarea>
        </div>

        {{-- Botones --}}
        <div class="flex justify-end space-x-3">
            <a href="{{ route('materias.index') }}" 
               class="bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400 transition">
                Cancelar
            </a>
            <button type="submit" 
                    class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                Actualizar materia
            </button>
        </div>
    </form>
</div>
@endsection
