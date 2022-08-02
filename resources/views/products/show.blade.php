@extends('layouts.master')

@section('title')
    Details Page
@endsection





@section('content')



<div class="wrapper">
        <div class="box">
            <h1 style="color:#66FCF1">Item Name: {{$product->name}}</h1>
            <p>Item Price: {{$product->price}}</p>
            <p>Item Manufacturer: {{$product->manufacturer}}</p>
            <p>Item Description: {{$product->description}}</p>
            <p>Link to product: <a href='{{$product->url}}'>{{$product->url}}</a></p>
            @if(Auth::user())
                @if(Auth::user()->rank == "moderator")
                <a href=' {{url("product/$product->id/edit")}}'>
                    <input type="submit" value="Edit Item" class="button-41" role="button" />
                </a>
                    <p>
                        <form method="POST" action= '{{url("product/$product->id")}}'>
                            {{csrf_field()}}
                            {{ method_field('DELETE') }}
                            <input type="submit" value="Delete">
                        </form>
                    </p>
                @endif
            @endif
        </div>
        <div class="box">
            <img src="{{$product->image}}" style="height: 400px; width: 600px;">
        </div>
        <div class="box">
            @if(Auth::user())
            <h5>Add Review: </h5>
            <form method="POST" action="{{route('review.store')}}">
            
                {{csrf_field()}}
                {{ method_field('PUT') }}

                <p><label>Rating (out of 5): </label><input type="text" name="rating" value="{{old('rating') }}"></p>
                <p><label>Review: </label><input type="text" name="review" value="{{ old('review')}}"></p>
                <input type="hidden" name="product_id" value="{{$product->id}}">
                
                <input type="submit" value="Create">
            </form>
            @else
                <h5> Log in to write a review </h5>
            @endif
        </div>
        @if($reviews)
        @foreach ($reviews as $review)
            <div class="box">
            User ID: {{$review->user_id}}<br>
                Rating: {{$review->rating}}/5.0<br>
                Date modified: {{$review->updated_at}}<br>
                {{$review->review}}<br>

                @if(Auth::user())
                    @if(Auth::user()->rank == "moderator" || Auth::user()->id == $review->user_id)
                    <p><a href=' {{url("review/$review->id/edit")}}'>
                        <input type="submit" value="Edit Review" class="button-41" role="button" />
                    </a></p>
                        <form method="POST" action= '{{url("review/$review->id")}}'>
                            {{csrf_field()}}
                            {{ method_field('DELETE') }}
                            <input type="submit" value="Delete">
                        </form>
                        <br><br>
                    @endif
                @endif
            </div>
        @endforeach
        @endif
            
</div>

<style>
    .wrapper {
    display: grid;
    grid-gap: 10px;
    grid-template-columns: 800px 800px;
    background-color: #0B0C10;
    color: #444;
  }

  .box {
    background-color: #444;
    color: #fff;
    border-radius: 5px;
    padding: 20px;
    font-size: 150%;

  }


</style>


@endsection