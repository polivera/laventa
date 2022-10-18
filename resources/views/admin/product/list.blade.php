<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Administrador de Productos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="bg-green-500 block">
                        <a class="text-blue-500 float-left" href="{{ url('/admin/productos/agregar') }}">Agregar Producto</a>
                    </div>

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
                                    <td class="p-4 text-right text-stone-600">
                                        <strong>{{ $product->getFormattedAmount() }}</strong>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $products->links('pagination') }}

                </div>
            </div>
        </div>
    </div>


</x-app-layout>
