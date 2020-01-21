<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="apple-icon.png">
    <link rel="icon" type="ico" href="favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name'))</title>

    @include('student.layouts.partials.header')

    @yield('head')

    <style>
        .student-panel{
            padding-top: 100px;
            margin-left: auto;
            margin-right: auto;
        }
    </style>

</head>

<body class="sidebar-mini">

<div class="wrapper ">
    <!-- Navbar -->
    @include('student.layouts.partials.navbar')
    <!-- End Navbar -->

    <div class="student-panel" >
        <div class="content " style="">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>

        @yield('questionNumberBar')
    </div>
</div>

@include('student.layouts.partials.jsFile')

@yield('footer')

</body>
</html>
