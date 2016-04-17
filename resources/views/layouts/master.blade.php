<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title') - {{ trans('site.title') }}</title>
    <link rel="stylesheet" href="{{ elixir("css/lib.css") }}">
    <link rel="stylesheet" href="{{ elixir("css/app.css") }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:title" content="{{ trans('layouts.meta_title') }}"/>
    <meta property="og:image" content="{{ asset('img/logo.png') }}" />
    <meta property="og:description" content="@yield('description')" />
    <meta name="keywords" content="@yield('keywords', trans('layouts.meta_keywords'))">
    <meta name="author" content="{{ trans('layouts.meta_author') }}">

    @yield('head')
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.6.2/html5shiv.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.2.0/respond.js"></script>
    <![endif]-->
    @yield('style')
</head>
<body>

@include('layouts/partial/nav')

@yield('jumbotron')

@yield('content')

@include('layouts/partial/footer')

<script src="//cdn.bootcss.com/jquery/2.1.4/jquery.min.js"></script>
<script src="//cdn.bootcss.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
@yield('script')
@include('flashy::message')
@include('partials.analytics.baidu')
@include('partials.analytics.google')
</body>
</html>
