@extends('layouts.app')

@section('content')
    <div class="w-full mb-[10px]">
        <div class="mt-4"> <a class="text-blue-500" href="{{ url('/admin/productos') }}"> Volver </a> </div>
        @if (!empty($id))
            <div class="text-[1.1rem] py-4 text-fg"> Editando producto código: {{ $id }} </div>
        @else
            <div class="text-[1.1rem] py-4 text-fg"> Agregar nuevo producto </div>
        @endif
        <form class="flex flex-col gap-4" action="{{ url('admin/productos') }}" method="post" enctype="multipart/form-data">
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
                <label class="text-fg" for="category_id">Categoría: <span class="text-red-600">*</span></label>
                <select class="rounded-md border border-gray-300 px-4 pb-2 pt-1 bg-white" name="category_id"
                    id="category_id">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @if (old('category_id', $category_id) == $category->id) selected @endif>
                            {{ $category->name }}
                        </option>
                    @endforeach
                    <select>
            </div>
            <div class="flex flex-col">
                <label class="text-fg" for="description">Descripción: <span class="text-red-600">*</span></label>
                <textarea class="rounded-md border border-gray-300 px-4 pb-2 pt-1" id="description" name="description" rows="8"> {{ old('description', $description) }}</textarea>
                @error('description')
                    <span class="text-red-600"> {{ $message }} </span>
                @enderror
            </div>

            <div class="flex flex-row">
                @foreach ($images as $image)
                    <div>
                        <img src="{{ url('image/' . $image->name) }}" />
                    </div>
                @endforeach
            </div>

            <div class="flex flex-col">
                <label class="text-fg" for="image1">Imagen 1: </label>
                <input type="file" name="image1" id="image1" />
            </div>
            <div class="flex flex-col">
                <label class="text-fg" for="image2">Imagen 2: </label>
                <input type="file" name="image2" id="image2" />
            </div>
            <div class="flex flex-col">
                <label class="text-fg" for="image3">Imagen 3: </label>
                <input type="file" name="image3" id="image3" />
            </div>
            <div class="flex flex-col">
                <label class="text-fg" for="image4">Imagen 4: </label>
                <input type="file" name="image4" id="image4" />
            </div>

            <div class="flex justify-end gap-[20px]">
                <button class="bg-green-500 rounded-full py-2 px-4">Guardar</button>
                <a class="bg-red-500 rounded-full py-2 px-4" href="{{url('admin/productos/' . $id . '/borrar')}}">Borrar</a>
            </div>
        </form>
    </div>
@endsection
