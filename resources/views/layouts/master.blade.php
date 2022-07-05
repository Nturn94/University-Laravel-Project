<!DOCTYPE html>
<html>
<head>
  <title>@yield('title')</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="{{asset('css/styles.css')}}">




</head>

<body>
<a href="{{url('/')}}">Home</a>
  @auth <!--- user is logged in --->
    Welcome, {{Auth::user()->name}}
    Your rank is: {{Auth::user()->rank}}
    <form method="POST" action= "{{url('/logout')}}">
      {{csrf_field()}}
      <input type="submit" value="Logout">
    </form>
  @else <!--- user is not logged in --->
    <a href="{{route('login')}}">Login</a>
    <a href="{{route('register')}}">Register</a>
  @endauth
  <a href="{{url('documentation')}}">Documentation</a>


  @yield('content')
</body>
</html>
