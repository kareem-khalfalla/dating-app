<div class="ground">
    <div class="container container-index">
        <h1>{{ __('welcome.Welcome there') }}</h1>
        <p class="lead text-white m-0">{{ __('welcome.Lorem ipsum dolor sit, amet consectetur adipisicing elit. Rem non rerum ea
            animi harum molestias,') }}</p>
        <div class="row m-auto justify-content-center">
            @guest

                <div class="col-12 col-md-5 col-lg-4 pb-3">
                    <a href="{{ route('register') }}"><button class="btn btn-block btn_register"> <i
                                class="fas fa-plus-circle"></i>
                            {{ __('welcome.register') }}</button></a>
                </div>
                <div class="col-12 col-md-5 col-lg-4 pb-3">
                    <a href="{{ route('login') }}"><button class="btn btn-block btn_login"><i
                                class="fas fa-paper-plane"></i>
                            {{ __('welcome.login') }}</button></a>
                </div>
            @endguest

            {{-- @auth
                <div class="col-12 col-md-5 col-lg-4 pb-3">
                    <a href="{{ route('users.filter') }}"><button class="btn btn-block btn_login"><i
                                class="fas fa-search"></i>{{ __('welcome.search') }}</button></a>
                </div>
            @endauth --}}

        </div>
    </div>
</div>

<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
    <path fill="#1D2625" fill-opacity="1" d="M0,32L1440,192L1440,0L0,0Z"></path>
</svg>
