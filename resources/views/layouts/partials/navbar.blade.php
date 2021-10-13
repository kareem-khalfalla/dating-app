<style>

    .notifications {
        width: 300px;
        border-radius: 5px 0px 5px 5px;
        background-color: #fff;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)
    }

    .notifications h2 {
        font-size: 14px;
        padding: 10px;
        border-bottom: 1px solid #eee;
        color: #333;
    }

    .notifications h2 span {
        color: #f00
    }

    .notifications-item {
        display: flex;
        border-bottom: 1px solid #eee;
        padding: 6px 9px;
        margin-bottom: 0px;
        cursor: pointer
    }

    .notifications-item:hover {
        background-color: #eee
    }

    .notifications-item img {
        display: block;
        width: 50px;
        height: 50px;
        margin-right: 9px;
        border-radius: 50%;
        margin-top: 2px
    }

    .notifications-item .text h4 {
        color: #777;
        font-size: 16px;
        margin-top: 3px
    }

    .notifications-item .text p {
        color: #aaa;
        font-size: 12px
    }
    
    .navbar{
    width: 100%;
}

</style>

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
                        <a class="nav-link hover-bar" href="{{ route('results') }}"><i class="fas fa-search"
                                style='font-size: 30px ;'></i><span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link hover-bar" href="{{ route('profile', Auth::user()) }}">
                            <img src="{{ asset('storage/' . Auth::user()->avatar) }}" class="img_icon_user"
                                alt="{{ Auth::user()->username }}">
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link hover-bar" href="{{ route('requests') }}"><i class="fas fa-lg fa-user-plus p-1"
                                style='font-size: 30px ;'></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link hover-bar" href="{{ route('chat') }}"><i class="fas fa-lg fa-envelope p-1"
                                style='font-size: 30px ;'></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link hover-bar" href="{{ route('settings') }}"><i class="fas fa-lg fa-cogs p-1"
                                style='font-size: 30px ;'></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link hover-bar" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                                                                                                                                                                                document.getElementById('logout-form').submit();"><i
                                class="fas fa-lg fa-sign-out-alt p-1" style='font-size: 30px ;'></i></a>
                        <form action="{{ route('logout') }}" id="logout-form" method="post" style="display: none">@csrf
                        </form>
                    </li>

                    <li onclick="Livewire.emit('updateNotifications')" class="nav-item avatar dropdown">
                        <a class="nav-link dropdown-toggle waves-effect waves-light" id="navbarDropdownMenuLink-5"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            @php
                                $notifications = Auth::user()->notifications;
                            @endphp
                            <span
                                class="badge badge-danger ml-2"><span>{{ count(Auth::user()->unreadNotifications) }}</span>
                                <i class="fas fa-bell" style='font-size: 30px ;'></i>
                        </a>
                        @livewire('notification-component', ['notifications' => $notifications])
                    </li>

                    <li dir="ltr" class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle hover-bar" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                class="fa fa-lg fa-language " style='font-size: 30px ;'></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @foreach (\App\Models\Language::allAvailable()->get() as $language)
                                <a class="dropdown-item" style="background: transparent"
                                    href="{{ route('locale', $language->code) }}">{{ $language->nativeName }}</a>
                            @endforeach
                        </div>
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

                    <li dir="ltr" class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle hover-bar" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ __('navbar.others') }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" style="background: transparent"
                                href="{{ route('privacy') }}">{{ __('navbar.Privacy policy') }}</a>
                            <a class="dropdown-item" style="background: transparent"
                                href="{{ route('about') }}">{{ __('navbar.About') }}</a>
                        </div>
                    </li>

                    <li dir="ltr" class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle hover-bar" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                class="fa fa-lg fa-language "></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @foreach (\App\Models\Language::allAvailable()->get() as $language)
                                <a class="dropdown-item" style="background: transparent"
                                    href="{{ route('locale', $language->code) }}">{{ $language->nativeName }}</a>
                            @endforeach
                        </div>
                    </li>


                @endguest

            </ul>
        </div>
    </div>
</nav>
