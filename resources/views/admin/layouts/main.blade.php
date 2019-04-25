<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name') }}</title>
    <meta name="description" content="Bawabeen">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="">
    <link rel="shortcut icon" href="">
    <link rel="stylesheet" href="{{asset('public/admin/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/admin/assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/admin/assets/css/style.css')}}">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{asset('public/admin/assets/css/jquery.dataTables.min.css')}}">
    <link href="{{ asset('public/assets/css/toastr.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('public/admin/assets/css/admin-app.css')}}">
</head>
<body>
    @include('admin.layouts.sidebar')
    @include('admin.layouts.header')
    <section class="content">
        @include('flash-message')
        @yield('content')
    </section>
    <script src="{{ asset('public/assets/js/jquery.min.js') }}"></script>
    <script src="{{asset('public/admin/assets/js/popper.min.js') }}"></script>
    <script src="{{asset('public/admin/assets/js/plugins.js')}}"></script>
    <script src="{{asset('public/admin/assets/js/main.js')}}"></script>
    <script src="{{asset('public/admin/assets/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('public/assets/js/toastr.min.js') }}"></script>
    @yield('after_footer')
</body>
</html>
