@extends('layouts.master')

@section('title')
    Add new
@endsection



@section('content')
    <h1>Create a new Review</h1>
    @if (count($errors) > 0)
        <div class="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="review">
        
        {{csrf_field()}}
        {{ method_field('PUT') }}

        <p><label>Rating (out of 5): </label><input type="text" name="rating" value="{{old('rating') }}"></p>
        <p><label>Review: </label><input type="text" name="review" value="{{ old('review')}}"></p>
        <p><select name="product_id">
        @foreach ($products as $product)
            @if($product->id == old('product'))
                <option value="{{$product->id}}" selected="selected">{{$product->name}}</option>
            @else
                <option value="{{$product->id}}">{{$product->name}}</option>
            @endif
        @endforeach
        </select></p>
        <input type="submit" value="Create">
    </form>
@endsection
