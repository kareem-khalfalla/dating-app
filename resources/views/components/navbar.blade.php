<nav class="navbar navbar-expand-md navbar-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="/">
            <strong><span class="last_link">{{ config('app.name') }}</span></strong>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item nav_home">
                    <a class="nav-link hover-bar" href="{{ route('welcome') }}"><i class="fa fa-home fa-lg p-1"></i>{{ __('navbar.home') }}<span
                            class="sr-only">(current)</span></a>
                </li>
                @auth

                    <li class="nav-item">
                        <a class="nav-link hover-bar" href="{{ route('profile', Auth::user()->username) }}"><i
                                class="fas fa-lg fa-user p-1"></i>{{ __('navbar.profile') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link hover-bar" href="{{ route('users.requests') }}"><i
                                class="fas fa-lg fa-user-plus p-1"></i>{{ __('navbar.requests') }}</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link hover-bar" href="{{ url('/chatify') }}"><i
                                class="fas fa-lg fa-envelope p-1"></i>{{ __('navbar.Chat') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link hover-bar" href="{{ route('profile.edit') }}"><i
                                class="fas fa-lg fa-cogs p-1"></i>{{ __('navbar.settings') }}</a>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit" class="nav-link hover-bar" style="background-color: transparent;"><i
                                    class="fas fa-lg fa-sign-out-alt p-1"></i>{{ __('navbar.logout') }}</button>
                        </form>
                    </li>
                @endauth
                @guest
                    <li class="nav-item nav_signup">
                        <a class="nav-link hover-bar" href="{{ route('register') }}"><i
                                class="fa fa-user-plus fa-lg p-1"></i>{{ __('navbar.signup') }}</a>
                    </li>

                    <li class="nav-item nav_login">
                        <a class="nav-link hover-bar" href="{{ route('login') }}"><i
                                class="fas fa-sign-in-alt fa-lg p-1"></i>{{ __('navbar.login') }}</a>
                    </li>

                    <li class="nav-item nav_login">
                        <a class="nav-link hover-bar" href="{{ route('about') }}">{{ __('navbar.About') }}</a>
                    </li>

                    <li class="nav-item nav_login">
                        <a class="nav-link hover-bar" href="{{ route('privacy') }}">{{ __('navbar.Privacy policy') }}</a>
                    </li>
                @endguest
                <li dir="ltr" class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle hover-bar" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                            class="fa fa-lg fa-language p-1"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}"
                                href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                {{ $properties['native'] }}
                            </a>
                        @endforeach
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
