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
                @auth
                    <li class="nav-item nav_home">
                        <a class="nav-link hover-bar" href="{{ route('results') }}"><i class="fas fa-search"></i><span
                                class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link hover-bar" href="{{ route('profile', Auth::user()->username) }}">
                            <img src="{{ asset('storage/' . Auth::user()->avatar) }}" class="img_icon_user"
                                alt="image tit">
                            {{ __('navbar.profile') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link hover-bar" href="{{ route('requests') }}"><i
                                class="fas fa-lg fa-user-plus p-1"></i>{{ __('navbar.requests') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link hover-bar" href="{{ route('chat') }}"><i
                                class="fas fa-lg fa-envelope p-1"></i>{{ __('navbar.Chat') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link hover-bar" href="{{ route('settings') }}"><i
                                class="fas fa-lg fa-cogs p-1"></i>{{ __('navbar.settings') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link hover-bar" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                                                                document.getElementById('logout-form').submit();"><i
                                class="fas fa-lg fa-sign-out-alt p-1"></i>{{ __('navbar.logout') }}</a>
                        <form action="{{ route('logout') }}" id="logout-form" method="post" style="display: none">@csrf
                        </form>
                    </li>


                @endauth
                @guest
                    <li class="nav-item nav_home">
                        <a class="nav-link hover-bar" href="{{ route('welcome') }}"><i
                                class="fa fa-home fa-lg p-1"></i>{{ __('navbar.home') }}</a>
                    </li>
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
                        <a class="nav-link hover-bar"
                            href="{{ route('privacy') }}">{{ __('navbar.Privacy policy') }}</a>
                    </li>
                @endguest
                <li dir="ltr" class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle hover-bar" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                            class="fa fa-lg fa-language "></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach (\App\Models\Language::allAvailable()->get() as $language)
                            <a class="dropdown-item" style="background: transparent" href="{{ route('locale', $language->code) }}">{{ $language->nativeName }}</a>
                        @endforeach
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
