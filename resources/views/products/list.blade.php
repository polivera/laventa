<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Productos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 items-center">
                    <div class="flex flex-row flex-wrap gap-[15px]">
                        @foreach ($products as $product)
                            @include('products.list-item')
                        @endforeach
                    </div>
                    <div class="py-6 px-[15px]">
                        {{ $products->links('pagination') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
