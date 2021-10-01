<x-app-layout>
    <div class="container container_form col-12 col-sm-8 col-md-7 col-lg-5 pt-5">
        <div class="card card-body shadow">
            <h1 class="h_2">{{ __('login.Login') }}</h1>
            <form id="login-form" class="signup col-12 m-auto" method="post" action="{{ route('login') }}">
                @csrf
                <div id="logAlert"></div>
                <div class="input-group input-group-lg mb-3 mt-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-lg"><i class="fa fa-envelope"></i></span>
                    </div>
                    <input required name="email" value="{{ old('email') }}" placeholder="{{ __('login.email') }}" type="email"
                        class="form-control @error('email') is-invalid @enderror" aria-label="Large"
                        aria-describedby="inputGroup-sizing-sm">
                    @error('email')
                        <div class="invalid-feedback">
                            <small id="passError" class="text-danger col-12">{{ $message }}</small>
                        </div>
                    @enderror
                </div>
                <div class="input-group input-group-lg mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-lg"><i class="fa fa-key"
                                aria-hidden="true"></i></span>
                    </div>
                    <input required name="password" placeholder="{{ __('login.password') }}" type="password"
                        class="form-control @error('password') is-invalid @enderror" aria-label="Large"
                        aria-describedby="inputGroup-sizing-sm">
                    @error('password')
                        <div class="invalid-feedback">
                            <small id="passError" class="text-danger col-12">{{ $message }}</small>
                        </div>
                    @enderror
                </div>
                <div class="mt-4">
                    <input name="login" id="login-btn" type="submit" class="btn btn_form_login btn-block p-2"
                        value="{{ __('login.login') }}">
                </div>
                <br>
                <div>{{ __('login.Forgot password?') }}
                    <a href="{{ route('password.request') }}"><strong>{{ __('login.reset now') }}</strong></a>
                </div>
                <br>
                <div>{{ __('login.don\'t have account?') }}
                    <a href="{{ route('register') }}"><strong>{{ __('login.create a new account now') }}</strong></a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
