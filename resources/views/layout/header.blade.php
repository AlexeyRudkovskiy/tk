<!doctype html>
<html>
<head>
    <title>@yield('title', trans('frontend.website.name'))</title>

    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&amp;subset=cyrillic-ext" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend.style.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    <meta charset="utf-8" />

    @stack('header')
</head>