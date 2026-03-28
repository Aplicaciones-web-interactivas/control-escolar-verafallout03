@extends('layouts.app')

@section('title', 'Inscribirme')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Inscribirme en un grupo</h1>

    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('inscripciones.store') }}" method="POST" class="bg-white shadow-md rounded-lg p-6 space-y-4">
        @csrf

        <div>
            <label for="grupo_id" class="block text-sm font-medium text-gray-700">Grupo</label>
            <select name="grupo_id" id="grupo_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                <option value="">-- Selecciona un grupo --</option>
                @foreach($grupos as $grupo)
                    <option value="{{ $grupo->id }}">{{ $grupo->nombre }} — {{ $grupo->horario->materia->nombre ?? 'Materia' }}</option>
                @endforeach
            </select>
        </div>

        <input type="hidden" name="usuario_id" value="{{ auth()->id() }}">

        <div class="flex justify-end space-x-3">
            <a href="{{ route('inscripciones.index') }}" class="bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400 transition">Cancelar</a>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Inscribirme</button>
        </div>
    </form>
</div>
@endsection
