<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

        <title>
            @section('title')

            @show
        </title>


        <link rel="stylesheet" href="/css/vendor/normalize.css">
        {{-- <link rel="stylesheet" href="/css/vendor/responsiveslides.css" charset="utf-8"> --}}
        <link rel="stylesheet" href="/css/main.min.css">
        @yield('styles')

        <link rel="icon" type="image/png" href="/img/favicon.png">

        @section('meta')
            <meta name="csrf_token" content="{{ csrf_token() }}">
        @show
    </head>
    <body>
        @yield('main')

        {{-- @include('blocks.analytics') --}}

        @section('scripts')
            <script src="/js/vendor/jquery.min.js"></script>
            <script src="/js/vendor/jquery.maskedinput.js"></script>

            {{-- <script src="//static.liqpay.com/libjs/checkout.js" async></script> --}}
            {{-- <script src="http://vk.com/js/api/openapi.js" type="text/javascript"></script> --}}
            {{-- <script type="text/javascript" src="//vk.com/js/api/openapi.js?126"></script> --}}

            <script src="/js/index.js"></script>
        @show
    </body>
</html>
