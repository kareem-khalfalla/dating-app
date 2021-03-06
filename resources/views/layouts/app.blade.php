@php

$isAdmin = \Request::route()->getPrefix() == 'admin' && Auth::user()->role == 'admin';
$prevIsAdmin =
    app('router')
        ->getRoutes()
        ->match(app('request')->create(URL::previous()))
        ->getPrefix() == 'admin' && \Request::route()->getName() != 'welcome';
@endphp
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <title>
        Zawag | 
        @yield('title','Zawag')
    </title>
      <link rel="icon" href="{{ URL::asset('http://zawag.eu/img/avatar.svg') }}" type="image/x-icon" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#5f023a" />
    <meta name="msapplication-navbutton-color" content="#5f023a" />
    <meta name="apple-mobile-web-app-status-bar-style" content="#5f023a" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    
    <meta property="og:url"         content="http://zawag.eu" />
  <meta property="og:image"         content="http://zawag.eu/img/p.png" />
  <meta property="og:image" content="http://zawag.eu/img/p.png" />
  <meta property="og:image:secure_url" content="http://zawag.eu/img/p.png" />
  <meta property="og:image:type" content="image/png" />
  <meta property="og:image:width" content="400" />
  <meta property="og:image:height" content="300" />
  <meta name="description" content="وَمِنْ آيَاتِهِ أَنْ خَلَقَ لَكُم مِّنْ أَنفُسِكُمْ أَزْوَاجًا لِّتَسْكُنُوا إِلَيْهَا وَجَعَلَ بَيْنَكُم مَّوَدَّةً وَرَحْمَةً ۚ إِنَّ فِي ذَٰلِكَ لَآيَاتٍ لِّقَوْمٍ يَتَفَكَّرُونَ">

    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
        integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@200;300;400;500;600;700;800&#038;display=swap"
        rel="stylesheet" />
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

    @if ($isAdmin || $prevIsAdmin)
    {{-- {{ dd() }} --}}
        <link href="{{ asset('admin/css/styles.css') }}" rel="stylesheet" />
    @else
        <link src="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/theme/main_h.css') }}">
        <link rel="stylesheet" href="{{ asset('css/theme/responsive.css') }}">
        <link rel="stylesheet" href="{{ asset('css/theme/all.min.css') }}" />
    @endif
    @if (\Route::currentRouteName() == 'admin.user.chat')
        <link href="{{ asset('admin/css/chat-style.css') }}" rel="stylesheet">
    @endif

    @if (app()->getLocale() == 'ar' && !$isAdmin && \Route::currentRouteName() != 'chat')
        <link rel="stylesheet" href="{{ asset('css/theme/rtl.css') }}" />
    @endif
    @stack('head')
    @stack('styles')
    @livewireStyles
</head>

<body class="{{ $isAdmin || $prevIsAdmin ? 'sb-nav-fixed' : '' }}">
    @if ($isAdmin || $prevIsAdmin)
        @include('layouts.partials.admin.navbar')
        <div id="layoutSidenav">
            @include('layouts.partials.admin.aside')
            <div id="layoutSidenav_content">
                <main>
                    {{ $slot }}
                </main>
            </div>
        </div>
        @include('layouts.partials.admin.footer')
    @else
        @include('layouts.partials.navbar')

        {{ $slot }}

        @include('layouts.partials.footer')
    @endif

    @if ($isAdmin)
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
                integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
                crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
        </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css"
            href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
        <script type="text/javascript"
                src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.js">
        </script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('admin/assets/demo/datatables-demo.js') }}"></script>
        <script src="{{ asset('admin/js/scripts.js') }}"></script>
    @else
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/scripts.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"
                integrity="sha512-RXf+QSDCUQs5uwRKaDoXt55jygZZm2V++WUZduaU/Ui/9EGp3f/2KZVahFZBKGH0s774sd3HmrhUy+SgOFQLVQ=="
                crossorigin="anonymous"></script>
    @endif

    <x-alerts />

    @stack('scripts')
    @livewireScripts
</body>

</html>
