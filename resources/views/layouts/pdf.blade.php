<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

  @section('styles')
  <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" type="text/css">
  <link rel="stylesheet" href="{{ asset('css/mdb.css') }}" type="text/css">
  <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}" type="text/css">
  <link rel="stylesheet" href="{{ asset('css/user/style.css') }}" type="text/css">
    @show
</head>
<body style="background:white !important;">
    <div id="app">
      @yield('content')
    </div>
@section('javascript')
  <script type="text/javascript" src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/popper.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/mdb.min.js') }}"></script>
   <script language="javascript">
 $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
 </script>
  @show
</body>
</html>
