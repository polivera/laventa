@if ($paginator->hasPages())
    <div class="flex flex-row gap-4 justify-center my-6">
        @if ($paginator->currentPage() != 1)
            <a class="py-2 px-4 text-fg border border-gray-200 rounded-lg w-[120px] text-center"
                href="{{ $paginator->previousPageUrl() }}"> &lt;&lt; Anterior </a>
        @else
            <div class="w-[120px]"></div>
        @endif
        @foreach ($elements as $element)
            @if (is_string($element))
                <div class="hidden sm:block"> {{ $element }} </div>
            @else
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <div
                            class="py-2 px-4 text-blue-600 font-bold border border-blue-600 w-auto rounded-lg hidden sm:block">
                            {{ $page }}
                        </div>
                    @else
                        <a class="py-2 px-4 text-fg border border-gray-200 w-auto rounded-lg hidden sm:block"
                            href="{{ $url }}">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach
        @if ($paginator->currentPage() != $paginator->lastPage())
            <a class="p-2 text-fg border border-gray-200 rounded-lg w-[120px] text-center"
                href="{{ $paginator->nextPageUrl() }}"> Siguiente &gt;&gt;</a>
        @else
            <div class="w-[120px]"> </div>
        @endif
    </div>
@endif
