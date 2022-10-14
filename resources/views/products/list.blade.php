@extends('layouts.app')

@section('content')
    <div class="flex flex-row flex-wrap gap-[15px] px-[15px]">
        @foreach ($products as $product)
            @include('products.list-item')
        @endforeach
    </div>
    <div class="py-6 px-[15px]">
    {{ $products->links('pagination') }}
    </div>
@endsection

