<!DOCTYPE html>
<html>
  <head>
    <title>@yield('title')</title>
    <link rel="stylesheet" type="text/css" href={{ asset("assets/css/bootstrap.min.css") }}>
    <link rel="stylesheet" type="text/css" href={{ asset("assets/css/custom.css") }}>
    <link rel="stylesheet" type="text/css" href={{ asset("assets/font-awesome/css/font-awesome.min.css")}}>
    <script src={{ asset('assets/js/jquery-3.2.1.min.js') }}></script>
    <script src={{ asset('assets/js/popper.min.js') }}></script>
    <script src={{ asset('assets/js/bootstrap.min.js')}}></script>
    <script type="text/javascript">
      $(function () {
      $('[data-toggle="tooltip"]').tooltip()
    });
    </script>    
  </head>