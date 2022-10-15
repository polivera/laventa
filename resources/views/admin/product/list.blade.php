@extends('layouts.app')

@section('content')
    <div class="flex flex-row justify-between items-center pt-4">
        <div class="text-[1.5rem]"> Listado de Productos </div>
        <a class="text-blue-500" href="{{ url('/admin/productos/agregar') }}">Agregar Producto</a>
    </div>
    <div class="w-full">
        <table class="table-fixed w-full">
            <thead>
                <tr>
                    <th class="p-4 text-left border-b border-gray-300"> Nombre </th>
                    <th class="w-[30px] border-b border-gray-300"></th>
                    <th class="p-4 w-[100px] border-b border-gray-300"> Precio </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr class="hover:bg-gray-200 cursor-pointer"
                        onclick="location.href='{{ url("admin/productos/$product->id") }}'">
                        <td class="text-fg p-4">{{ $product->name }}</td>
                        <td class="text-center"> $ </td>
                        <td class="p-4 text-right text-stone-600"><strong>{{ $product->getFormattedAmount() }}</strong></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $products->links('pagination') }}
    </div>
@endsection
