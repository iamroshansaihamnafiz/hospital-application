<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="copyright" content="MACode ID, https://macodeid.com/">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>One Health - @yield('title')</title>

    <!----------- Include Jquery File ---------->
    <script src="{{ asset('frontend/assets/js/jquery-3.5.1.min.js') }}"></script>

    <link rel="stylesheet" href="{{ asset('frontend/assets/css/maicons.css') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;500&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.css') }}">

    <link rel="stylesheet" href="{{ asset('frontend/assets/vendor/owl-carousel/css/owl.carousel.css') }}">

    <link rel="stylesheet" href="{{ asset('frontend/assets/vendor/animate/animate.css') }}">

    <link rel="stylesheet" href="{{ asset('frontend/assets/css/theme.css') }}">
</head>
