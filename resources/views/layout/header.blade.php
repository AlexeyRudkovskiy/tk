<!doctype html>
<html>
<head>
    <title>@yield('title', trans('frontend.website.name'))</title>

    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&amp;subset=cyrillic-ext" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend.style.css') }}" />
    <meta name="theme-color" content="#089148">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <meta charset="utf-8" />

    @stack('header')
</head>