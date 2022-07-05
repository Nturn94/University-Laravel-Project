@extends('layouts.master')
@section('title')
    Products
@endsection
@section('content')
<ul>
    @foreach ($products as $product)
        <li><a href="product/{{$product->id}}">{{ $product->name }}</a></li>
    @endforeach
</ul>

    @if(Auth::user())
        <a href="product/create"><li> Create new</li></a>
    @endif

@endsection