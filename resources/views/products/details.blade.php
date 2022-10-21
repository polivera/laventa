<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalle de producto') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="flex flex-col gap-[20px] py-[20px] p-2">
                        <div> <a class="text-blue-500" href="{{ url('/') }}">Listado</a> / <span
                                class="text-fg">{{ $product->name }}</span></div>
                        <div class="flex flex-row gap-[20px]">
                            <div class="flex-1 flex justify-center flex-col">
                                @if ($product->images)
                                    @foreach ($product->images as $image)
                                        <img src="{{ url('image/' . $image->name) }}" />
                                    @endforeach
                                @endif
                            </div>
                            <div class="flex-1 flex flex-col gap-[10px]">
                                <div class="text-[1.5rem] text-fg">{{ $product->name }}</div>
                                <div class="text-[1.5rem]"><strong> $ {{ $product->getFormattedAmount() }}</strong>
                                </div>
                                <hr />
                                <div class="text-[1rem] text-fg"> {{ $product->description }} </div>
                                <div class="flex justify-end py-8">
                                    <a href="" class="bg-blue-500 text-white rounded-full py-2 px-4"> Reservar </a>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
