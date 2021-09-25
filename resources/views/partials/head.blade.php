<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>{{ ucfirst(\Request::route()->getName()) }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#1D2625" />
    <meta name="msapplication-navbutton-color" content="#1D2625" />
    <meta name="apple-mobile-web-app-status-bar-style" content="#1D2625" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link src="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/theme/main_h.css') }}">
    <link rel="stylesheet" href="{{ asset('css/theme/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('css/theme/all.min.css') }}" />
    @if (app()->getLocale() == 'ar')
        <link rel="stylesheet" href="{{ asset('css/theme/rtl.css') }}" />
    @endif
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@200;300;400;500;600;700;800&#038;display=swap"
        rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.0.1/css/all.css" rel="stylesheet">
    @stack('head')
    @stack('styles')
    @livewireStyles
</head>

<body>
    @include('partials.navbar')
