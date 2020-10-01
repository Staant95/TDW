<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    


    <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">
{{--    <link rel="stylesheet" href="css/something.css">--}}
     <link rel="stylesheet" href="{{ asset('css/something.css') }}">
     
</head>
<body>

@include('shared-components.header')

@yield('content')

@include('shared-components.footer')

<script src="{{ asset('js/app.js') }}"></script>
{{-- <a id="scrollUp" href="#top" style="display: none; position: fixed; z-index: 2147483647;"><span><i class="fa fa-angle-up"></i></span></a> --}}
</body>
</html>
