<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
   	<link rel="stylesheet" href="{{ asset('public/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/css/font-awesome.min.css') }}">
    <link href="{{ asset('public/assets/css/toastr.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('public/assets/css/style.css')}}">
</head>
<body>
@include('frontend.layouts.header')
<section class="content main-wrapper">
    @include('flash-message')
    @yield('content')
</section>
@include('frontend.layouts.footer')  
<script src="{{ asset('public/assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('public/assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('public/assets/js/toastr.min.js') }}"></script>
<script>
	jQuery(function($){
		setTimeout(function(){
            $('.alert').slideUp('slow');
    	}, 3000);
	})
</script>
@yield('after_footer')
</body>
</html>