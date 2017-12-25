<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Varuna Stock Management</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/bootstrap.min.css') }}">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/shop-item.css') }}">

    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="{{ asset('/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/bootstrap.bundle.min.js') }}"></script>

    {{-- NOTIFY --}}
    @include('notify::notify');
  </head>

  <body>
    
    <!-- NAVBAR -->
    @include('navbar')

    <!-- PAGE CONTENT -->
    @yield('content')

    <!-- FOOTER -->
    @include('footer')

    <!-- MODALS -->
    @include('addmodal')
    @include('editmodal')
    @include('deletemodal')
  </body>
</html>
