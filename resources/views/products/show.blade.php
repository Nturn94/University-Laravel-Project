@extends('layouts.master')

@section('title')
    Details Page
@endsection

@section('content')
    <h1>Item Name: {{$product->name}}</h1>
    <p>Item Price: {{$product->price}}</p>
    <p>Item Manufacturer: {{$product->manufacturer}}</p>
    <p>Item Description: {{$product->description}}</p>
    <p>Link to product: <a href='{{$product->url}}'>{{$product->url}}</a></p>

    @if(Auth::user())
        @if(Auth::user()->rank == "moderator")
            <p><a href=' {{url("product/$product->id/edit")}}'>Edit</a></p>
            <p>
                <form method="POST" action= '{{url("product/$product->id")}}'>
                    {{csrf_field()}}
                    {{ method_field('DELETE') }}
                    <input type="submit" value="Delete">
                </form>
            </p>
        @endif
    @endif
    <br>
    <br>
    <h2> Reviews </h2>
    @if(Auth::user())
        Add Review: <a href='{{url("review/create")}}'>Here</a>
    @endif
    @if($reviews)
        @foreach ($reviews as $review)
            <h3>Entry:</h3>
            User ID: {{$review->user_id}}<br>
            Rating: {{$review->rating}}<br>
            Date modified: {{$review->updated_at}}<br>
            {{$review->review}}<br>

            @if(Auth::user())
                @if(Auth::user()->rank == "moderator" || Auth::user()->id == $review->user_id)
                    <a href=' {{url("review/$review->id/edit")}}'>Edit</a><br>
                    <form method="POST" action= '{{url("review/$review->id")}}'>
                        {{csrf_field()}}
                        {{ method_field('DELETE') }}
                        <input type="submit" value="Delete">
                    </form>
                    <br><br>
                @endif
            @endif

        @endforeach
    @endif

@endsection