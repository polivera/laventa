@extends('layouts.app')

@section('content')
    <div class="flex flex-row flex-wrap gap-[15px] px-[15px] max-w-[1275px] mx-auto">
        @foreach ($products as $product)
            @include('products.list-item')
        @endforeach
    </div>
@endsection

