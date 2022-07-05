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


<a href="product/create"><li> Create new</li></a>

@endsection