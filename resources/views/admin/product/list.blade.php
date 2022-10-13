@extends('layouts.app')

@section('content')
    <div> title here </div>
    <div> 
        <a class="text-blue-500" href="{{ url('/admin/productos/agregar') }}">new product link</a>
    </div>
    <div class="w-full">
        <table class="table-fixed w-full">
            <thead>
                <tr>
                    <th class="p-4 text-left border-b border-gray-300"> Nombre </th>
                    <th class="w-[30px] border-b border-gray-300"></th>
                    <th class="p-4 w-[100px] border-b border-gray-300"> Precio </th>
                    <th class="p-4 w-[200px] border-b border-gray-300"> Acciones </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td class="text-fg p-4">{{ $product->name }}</td>
                        <td class="text-center"> $ </td>
                        <td class="p-4 text-right text-stone-600"><strong>{{ $product->getFormattedAmount() }}</strong></td>
                        <td class="p-4 text-center">
                            <a href="{{ url('/admin/productos/' . $product->id) }}">EDIT</a>
                            <span class="px-2"> | </span>
                            <a href="{{ url('/admin/productos/' . $product->id) }}">DELETE</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
