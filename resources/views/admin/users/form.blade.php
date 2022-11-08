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

                    <div class="w-full mb-[10px]">
                        <div class="mt-4">
                            <a class="text-blue-500" href="{{ url('/admin/usuarios') }}">Volver</a>
                        </div>
                        @if (!empty($id))
                            <div class="text-[1.1rem] py-4 text-fg"> 
                                Editando usuario: {{ $name }}
                            </div>
                        @else
                            <div class="text-[1.1rem] py-4 text-fg"> 
                                Agregar nuevo usuario 
                            </div>
                        @endif
                        <form class="flex flex-col gap-4" action="{{ url('admin/usuarios') }}" method="post"
                            >
                            @csrf
                            <input type="hidden" name="id" value="{{ $id }}" />
                            <div class="flex flex-col">
                                <label class="text-fg" for="name">Nombre: <span
                                        class="text-red-600">*</span></label>
                                <input class="rounded-md border border-gray-300 px-4 pb-2 pt-1" type="text"
                                    name="name" id="name" value="{{ old('name', $name) }}">
                                @error('name')
                                    <span class="text-red-600"> {{ $message }} </span>
                                @enderror
                            </div>
                            <div class="flex flex-col">
                                <label class="text-fg" for="email">Email: <span class="text-red-600">*</span></label>
                                <input class="rounded-md border border-gray-300 px-4 pb-2 pt-1" type="text"
                                    step="0.01" name="email" id="email" value="{{ old('email', $email) }}">
                                @error('email')
                                    <span class="text-red-600"> {{ $message }} </span>
                                @enderror
                            </div>
                            <div class="flex flex-col">
                                <label class="text-fg" for="password">Clave: <span class="text-red-600">*</span></label>
                                <input class="rounded-md border border-gray-300 px-4 pb-2 pt-1" type="text"
                                    step="0.01" name="password" id="password"
                                    value="{{ old('password', $password) }}">
                                @error('password')
                                    <span class="text-red-600"> {{ $message }} </span>
                                @enderror
                            </div>

                            <div class="flex justify-end gap-[20px]">
                                <button class="bg-green-500 rounded-full py-2 px-4">Guardar</button>
                                @if (old('id', $id))
                                    <a class="bg-red-500 rounded-full py-2 px-4"
                                        href="{{ url('admin/usuarios/' . $id . '/borrar') }}">Borrar</a>
                                @endif
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
