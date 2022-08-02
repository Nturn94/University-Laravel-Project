<!DOCTYPE html>
<html>
<head>
  
  <title>@yield('title')</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="{{asset('css/styles.css')}}">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

</head>

<body>
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
            <a class="nav-link" href="{{url('/')}}">Home</a>
            </li>
            @auth <!--- user is logged in --->
            <b class="nav-link" style="color: white; display:flex;justify-content:center;align-items:center;">Welcome, {{Auth::user()->name}}.
            Your rank is: {{Auth::user()->rank}} </b>
            </div>
            <div>
              <form method="POST" action= "{{url('/logout')}}"id="someselector" >
                {{csrf_field()}}
                <li>

                  <input class="nav-link" type="submit" value="Logout" style="cursor:pointer;position:absolute;top:15px;right:15px;color:#C5C6C7; margin-left:auto;border: none;background: none;" >

                </li>
              </form>
            </div>
            @else <!--- user is not logged in --->
              <li class="nav-item active">
                <a class="nav-link" href="{{route('login')}}">Login</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('register')}}">Register</a>
              </li>
              </div>
            @endauth
        </ul>
    </nav>
    <main role="main">
    <div class="jumbotron">
        <div class="container">
          <br><br><br><br>
          @yield('content')
        </div>
      </div>
    
</body>

<footer>
<div style="position: absolute; left:0; bottom: 0px; background:#595959; color:white; width:100%; max-height:50px;background-position: center;">
    <span style="display:flex;justify-content:center;align-items:center;">Nathan Turnbull's University project </span>
</div>
</footer>


</html>

<style>
  body {
   margin:0;
   padding:0;
   height:100%;
   background-color: #0B0C10;
   color: #C5C6C7;
}
a:link {
  color: #C5C6C7;
  background-color: transparent;
  text-decoration: none;
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
a:visited {
  color: #C5C6C7;
  background-color: transparent;
  text-decoration: none;
}

input[type="button"], input[type="submit"] {
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

input[type="button"], input[type="submit"] {
  border-color: #45A29E;
  
}
#someselector {
  all: initial;
}

#someselector * {
  all: unset
}

</style>





