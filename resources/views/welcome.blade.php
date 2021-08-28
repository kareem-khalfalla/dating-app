<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ Auth::user()->username }} | {{ Auth::user()->name }}</title>
</head>

<body class="antialiased">
    <ul>
        <h3>Localization</h3>
        @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
            <li>
                <a rel="alternate" hreflang="{{ $localeCode }}"
                    href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                    {{ $properties['native'] }}
                </a>
            </li>
        @endforeach
    </ul>
    <br>
    <hr>
    <br>
    <h3>
        <a href="{{ route('users.notifications', $user) }}">{{ count($user->unreadNotifications) }} unread
            notifications
        </a>
    </h3>
    @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
                <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">Home</a>
            @else
                <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                @endif
            @endauth
        </div>
    @endif
    <form action="{{ route('users.filter') }}" method="GET">
        <input type="search" name="query" placeholder="Search...">
    </form>
    {{-- <br>
    <hr>
    <br> --}}

</body>

</html>
