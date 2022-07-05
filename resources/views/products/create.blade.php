@extends('layouts.master')

@section('title')
    Add new
@endsection



@section('content')
    <h1>Create a new Product</h1>
    @if (count($errors) > 0)
        <div class="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="product">
        
        {{csrf_field()}}
        {{ method_field('PUT') }}
        
        <p><label>Name: </label><input type="text" name="name" value="{{old('name') }}"></p>
        <p><label>Price: </label><input type="text" name="price" value="{{ old('price')}}"></p>
        <p><label>Manufacturer: </label><input type="text" name="manufacturer" value="{{old('manufacturer') }}"></p>
        <p><label>Description: </label><input type="text" name="description" value="{{old('description') }}"></p>
        <p><label>URL: </label><input type="text" name="url" value="{{old('url') }}"></p>

        <input type="submit" value="Create">
    </form>
@endsection
