@extends('layouts.master')

@section('title')
    Edit Page
@endsection




@section('content')
    @if (count($errors) > 0)
            <div class="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    <form method="POST" action= '{{url("review/$review->id")}}'>
        {{csrf_field()}}
        {{ method_field('PUT') }}

        <p><label>Rating (out of 5):</label>
        <input type="text" name="rating" value="{{$review->rating}}"><br></p>
        </p><label>Review</label>
        <input type="text" name="review" value="{{$review->review}}"></p>
        <input type="submit" value="Update">
    </form>
@endsection