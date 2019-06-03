<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title')</title>

  <!-- Custom fonts for this template-->
  <link rel="stylesheet" href="{{ asset('admins/vendor/fontawesome-free/css/all.min.css')}}">

  <link rel="stylesheet" href="{{ asset('admins/vendor/datatables/dataTables.bootstrap4.css')}}">
  <!-- Page level plugin CSS-->

  <link rel="stylesheet" href="{{ asset('admins/css/sb-admin.css')}}">



  @yield('styles')
</head>
@yield('content')


  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('admins/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{ asset('admins/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ asset('admins/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  <!-- Page level plugin JavaScript-->
  <script src="{{ asset('admins/vendor/chart.js/Chart.min.js')}}"></script>
  <script src="{{ asset('admins/vendor/datatables/jquery.dataTables.js')}}"></script>
  <script src="{{ asset('admins/vendor/datatables/dataTables.bootstrap4.js')}}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ asset('admins/js/sb-admin.min.js')}}"></script>

  <!-- Demo scripts for this page-->
  <script src="{{ asset('admins/js/demo/datatables-demo.js')}}"></script>
  <script src="{{ asset('admins/js/demo/chart-area-demo.js')}}"></script>
  <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>


@yield('scripts')
</html>
