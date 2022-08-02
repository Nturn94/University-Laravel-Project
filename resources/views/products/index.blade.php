@extends('layouts.master')
@section('title')
    Products
@endsection
@section('content')



<div class="wrapper">
    @foreach($products as $product)
        <div class="box">
            <p style="margin-left:'auto'; margin-right:'auto';color:#66FCF1">{{ $product->name }}</p>
            <img src="{{$product->image}}" style="height: 100px; width: 150px;">
            <p><a class="btn btn-secondary" href="product/{{$product->id}}" role="button">View details &raquo;</a></p>
        </div>
        @endforeach
</div>

<style>
body {
  margin: 40px;
}

.wrapper {
  display: grid;
  grid-template-columns: 300px 300px 300px 300px;
  grid-gap: 25px;
  background-color: #0B0C10;
  color: #444;
  column-rule: #0B0C10;
}

.box {
  background-color: #1F2833;
  color: White;
  border-radius: 5px;
  padding: 20px;
  font-size: 150%;
}

.button-41 {
  background-color: #0B0C10;
  background-image: linear-gradient(-180deg, #0B0C10, #1F2833);
  border-radius: 5px;
  box-shadow: rgba(0, 0, 0, 0.1) 0 2px 4px;
  color: #FFFFFF;
  cursor: pointer;
  display: inline-block;
  font-family: Inter,-apple-system,system-ui,Roboto,"Helvetica Neue",Arial,sans-serif;
  height: 44px;
  line-height: 44px;
  outline: 100;
  overflow: hidden;
  padding: 0 20px;
  pointer-events: auto;
  position: relative;
  text-align: center;
  touch-action: manipulation;
  user-select: none;
  -webkit-user-select: none;
  vertical-align: top;
  white-space: nowrap;
  width: 100%;
  z-index: 9;
  border: 10;
  border-color: #C5C6C7;
}

.button-41:hover {
  border-color: #45A29E;
  
}

</style>



<!-- HTML !-->
<br>
@if(Auth::user())
<a href="product/create">
    <input type="submit" value="Add new Item" class="button-41" role="button" />
</a>
@endif

@endsection


