@extends('layouts.app')

@section('content')
    <div class="flex flex-col gap-[20px] py-[20px] p-2">
        <div> <a class="text-blue-500" href="{{url('/') }}">Listado</a> / <span class="text-fg">{{$product->name}}</span></div>
        <div class="flex flex-row gap-[20px]">
            <div class="flex-1 h-[562px] bg-red-500"> Foto </div>
            <div class="flex-1 flex flex-col gap-[10px]">
                <div class="text-[1.5rem] text-fg">{{ $product->name }}</div>
                <div class="text-[1.5rem]"><strong> $ {{ $product->getFormattedAmount() }}</strong></div>
                <hr />
                <div class="text-[1rem] text-fg"> {{ $product->description }} </div>
            </div>
        </div>
    </div>
@endsection
