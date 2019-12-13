<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="apple-icon.png">
    <link rel="icon" type="ico" href="favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name'))</title>

    @include('layouts.partials.header')

    @yield('head')

</head>

<body class="">

<div class="wrapper ">

    @include('layouts.partials.sidebar')

    <div class="main-panel">
        <!-- Navbar -->
        @include('layouts.partials.navbar')
        <!-- End Navbar -->
        <div class="content">
            @yield('content')
        </div>
        @include('layouts.partials.footer')
    </div>
</div>

@include('layouts.partials.jsFile')

@yield('footer')

</body>
</html>
