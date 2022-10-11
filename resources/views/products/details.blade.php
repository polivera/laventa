@extends('layouts.app')

@section('content')
    <div>
        <div> Foto </div>
        <div>
            <div><strong>nombre</strong> {{ $product->name }}</div>
            <div><strong>valor</strong>: {{ $product->getFormattedAmount() }}</div>
            <div><strong>descripción</strong>: {{ $product->description }} </div>
        </div>
    </div>
@endsection
