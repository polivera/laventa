@extends('layouts.app')

@section('content')
    <div class="w-full">
        <div class="mt-4"> <a class="text-blue-500" href="{{ url('/admin/productos') }}"> Volver </a> </div>
        @if (!empty($id))
            <div class="text-[1.1rem] py-4 text-fg"> Editando producto código: {{ $id }} </div>
        @else
            <div class="text-[1.1rem] py-4 text-fg"> Agregar nuevo producto </div>
        @endif
        <form class="flex flex-col gap-4" action="{{ url('admin/productos') }}" method="post">
            @csrf
            <input type="hidden" name="id" value="{{ $id }}" />
            <div class="flex flex-col">
                <label class="text-fg" for="name">Nombre: <span class="text-red-600">*</span></label>
                <input class="rounded-md border border-gray-300 px-4 pb-2 pt-1" type="text" name="name" id="name"
                    value="{{ old('name', $name) }}">
                @error('name')
                    <span class="text-red-600"> {{ $message }} </span>
                @enderror
            </div>
            <div class="flex flex-col">
                <label class="text-fg" for="amount">Precio: <span class="text-red-600">*</span></label>
                <input class="rounded-md border border-gray-300 px-4 pb-2 pt-1" type="number" step="0.01" name="amount"
                    id="amount" value="{{ old('amount', $amount) }}">
                @error('amount')
                    <span class="text-red-600"> {{ $message }} </span>
                @enderror
            </div>
            <div class="flex flex-col">
                <label class="text-fg" for="description">Descripción: <span class="text-red-600">*</span></label>
                <textarea class="rounded-md border border-gray-300 px-4 pb-2 pt-1" id="description" name="description" rows="8"> {{ old('description', $description) }}</textarea>
                @error('description')
                    <span class="text-red-600"> {{ $message }} </span>
                @enderror
            </div>
            <div class="flex justify-end">
                <button class="bg-green-500 rounded-full py-2 px-4">Guardar Cambios</button>
            </div>
        </form>
    </div>
@endsection
