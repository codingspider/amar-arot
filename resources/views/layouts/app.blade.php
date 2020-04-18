<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0" />
    <title>@yield('pagetitle','Optima')</title>

    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{asset('content')}}/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link href="{{asset('content')}}/css/style.css" type="text/css" rel="stylesheet" media="screen,projection" />

    <!-- PWA Links -->

    <link rel="icon" href="{{asset('content')}}/img/favicon.ico" type="image/x-icon" />

    <!-- CODELAB: Add link rel manifest -->
    <link rel="manifest" href="{{asset('manifest.json')}}">
    <!-- CODELAB: Add iOS meta tags and icons -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Amar Bazaar">
    <link rel="apple-touch-icon" href="{{asset('content')}}/img/icons/icon-152x152.png">
    <!-- social media-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- CODELAB: Add description here -->
    <meta name="description" content="Amar Bazaar">
    <!-- CODELAB: Add meta theme-color -->
    <meta name="theme-color" content="#2F3BA2" />
</head>

<body>
    @include('layouts.partial.nav')
    @yield('contents')
    @include('layouts.partial.footer')
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="{{asset('content')}}/js/materialize.js"></script>
    <script src="{{asset('content')}}/js/install.js"></script>
    <script src="{{asset('content')}}/js/init.js"></script>

</body>

</html>
