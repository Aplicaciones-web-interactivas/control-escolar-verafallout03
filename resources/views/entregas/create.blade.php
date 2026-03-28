@extends('layouts.app')

@section('title', 'Subir Entrega')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Subir entrega</h1>

    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('entregas.store') }}" method="POST" enctype="multipart/form-data" class="bg-white shadow-md rounded-lg p-6 space-y-4">
        @csrf

        <input type="hidden" name="tarea_id" value="{{ request('tarea_id', $tarea->id ?? '') }}">
        <input type="hidden" name="usuario_id" value="{{ auth()->id() }}">

        <div>
            <label for="archivo_pdf" class="block text-sm font-medium text-gray-700">Archivo (PDF)</label>
            <input type="file" name="archivo_pdf" id="archivo_pdf" accept="application/pdf" required class="mt-1 block w-full">
        </div>

        <div class="flex justify-end space-x-3">
            <a href="{{ route('entregas.index') }}" class="bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400 transition">Cancelar</a>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Subir</button>
        </div>
    </form>
</div>
@endsection
