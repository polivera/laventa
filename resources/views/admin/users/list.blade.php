<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Administrador de Usuarios') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="bg-green-500 block">
                        <a class="text-blue-500 float-left" href="{{ url('/admin/usuarios/agregar') }}">Agregar Usuario</a>
                    </div>

                    <table class="table-fixed w-full">
                        <thead>
                            <tr>
                                <th class="p-4 text-left border-b border-gray-300"> Nombre </th>
                                <th class="p-4 border-b border-gray-300 text-left"> Email </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr class="hover:bg-gray-200 cursor-pointer"
                                    onclick="location.href='{{ url("admin/usuarios/$user->id") }}'">
                                    <td class="text-fg p-4">{{ $user->name }}</td>
                                    <td class="text-fg p-4">{{ $user->email }}</td>
                               </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $users->links('pagination') }}

                </div>
            </div>
        </div>
    </div>

</x-app-layout>
