<a href="{{ url('/producto/' . $product->id) }}"
    class="flex flex-col rounded-xl px-5 w-[280px] h-[350px] shadow-[0_2px_9px_-2px_rgba(0,0,0,0.25)]">
    <div class="h-[190px]">
        @if ($product->images && $product->images->get(0))
            <img src="{{ url('image/' . $product->images->get(0)->name) }}" />
        @endif
    </div>
    <div class="text-fg text-[1.2rem] pt-[10px]">{{ $product->name }}</div>
    <div class="amount text-[1.5rem]">{{ $product->getFormattedAmount() }}</div>
</a>
