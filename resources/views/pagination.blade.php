@if ($paginator->hasPages())
    <div class="flex flex-row gap-4 justify-center my-6">
        @if ($paginator->currentPage() != 1)
            <a class="py-2 px-4 text-fg border border-gray-200 w-auto rounded-lg w-[120px] text-center" href="{{ $paginator->previousPageUrl() }}"> &lt;&lt; Anterior </a>
        @else
            <div class="w-[120px]"></div>
        @endif
        @foreach ($elements[0] as $page => $url)
            @if ($page == $paginator->currentPage())
                <div class="py-2 px-4 text-blue-600 font-bold border border-blue-600 w-auto rounded-lg"> {{ $page }} </div>
            @else
                <a class="py-2 px-4 text-fg border border-gray-200 w-auto rounded-lg" href="{{ $url }}">{{ $page }}</a>
            @endif
        @endforeach
        @if ($paginator->currentPage() != $paginator->lastPage())
            <a class="p-2 text-fg border border-gray-200 w-auto rounded-lg w-[120px] text-center" href="{{ $paginator->nextPageUrl() }}"> Siguiente &gt;&gt;</a>
        @else
            <div class="w-[120px]"> </div>
        @endif
    </div>
@endif
