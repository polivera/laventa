<a href="{{ url('/producto/' . $product->id) }}"
    class="flex flex-col rounded-xl px-5 w-[300px] h-[350px] shadow-[0_2px_9px_-2px_rgba(0,0,0,0.25)]">
    <div class="h-[190px]">
        Photo Here
    </div>
    <div class="text-fg text-[1.2rem]">{{ $product->name }}</div>
    <div class="amount text-[1.5rem]">{{ number_format($product->amount / 100, 2) }}</div>
</a>
