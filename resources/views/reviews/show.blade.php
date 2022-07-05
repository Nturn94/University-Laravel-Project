@extends('layouts.master')

@section('title')
    Details Page
@endsection

@section('content')
    <h1>{{$product->name}}</h1>
    <p>{{$product->price}}</p>
    <p>{{$product->manufacturer->name}}</p>
    <p><a href=' {{url("product/$product->id/edit")}}'>Edit</a></p>
    <p>
        <form method="POST" action= '{{url("product/$product->id")}}'>
            {{csrf_field()}}
            {{ method_field('DELETE') }}
            <input type="submit" value="Delete">
        </form>
    </p>

    <br>
    <br>
    <h2> Reviews </h2>
    Add Review: <a href='{{url("review/create")}}'>Here</a>
    @if($reviews)
        @foreach ($reviews as $review)
            <h3>Entry:</h3>
            User ID: {{$review->user_id}}<br>
            Rating: {{$review->rating}}<br>
            {{$review->review}}<br>
            <a href=' {{url("review/$review->id/edit")}}'>Edit</a><br><br>

        @endforeach
    @endif

@endsection