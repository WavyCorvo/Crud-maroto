<!doctype html>
<html lang="en">
  
  <head>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    
    
    <link rel="stylesheet" href="{{url('assets/bootstrap/css/bootstrap.min.css')}}">
    <title>@yield('title')</title>
      
  </head>
  <!--body style="background-color: #121111; color:#64db1a"-->
  <body>
    @yield('content')
  <main>
    @if (Session("success"))
    <p class="success">{{session("success")}}</p>
    @endif
  </main>
    <script src="{{url("assets\js\javascript.js")}}"></script>


   
  </body>



</html>