@extends('layouts.app')

@section('content')
    <div class="w-full">
        <div> some form title </div>
        <form class="flex flex-col gap-4" action="{{url('admin/productos/agregar')}}" method="post">
            @csrf
            <div class="flex flex-col">
                <label class="text-fg" for="name">Nombre: <span class="text-red-600">*</span></label>
                <input class="rounded-md border border-gray-300 px-4 pb-2 pt-1" type="text" name="name" id="name">
            </div>
            <div class="flex flex-col">
                <label for="amount">Precio: <span class="text-red-600">*</span></label>
                <input class="rounded-md border border-gray-300 px-4 pb-2 pt-1" type="number" step="0.01" name="amount" id="amount">
            </div>
            <div class="flex flex-col">
                <label for="description">Descripción: <span class="text-red-600">*</span></label>
                <textarea class="rounded-md border border-gray-300 px-4 pb-2 pt-1" id="description" name="description" rows="8"></textarea>
            </div>
            <div class="flex justify-end">
                <button class="bg-green-500 rounded-full py-2 px-4">Guardar Cambios</button>
            </div>
        </form>
    </div>
@endsection
