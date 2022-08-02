@extends('layouts.master')

@section('title')
    Edit Page
@endsection




@section('content')
    <form method="POST" action= '{{url("product/$product->id")}}'>
        {{csrf_field()}}
        {{ method_field('PUT') }}
        <!-- <input type="hidden" name="id" value="{{$product->id}}" -->
        </p><label>Name</label>
        <input type="text" name="name" value="{{$product->name}}"></p>
        <p><label>Price</label>
        <input type="text" name="price" value="{{$product->price}}"><br></p>
        <input type="text" name="manufacturer" value="{{$product->manufacturer}}"><br></p>
        <input type="text" name="description" value="{{$product->description}}"><br></p>
        <input type="text" name="url" value="{{$product->url}}"><br></p>
        <input type="text" name="image" value="{{$product->image}}"><br></p>

        <input type="submit" value="Update">
    </form>
@endsection