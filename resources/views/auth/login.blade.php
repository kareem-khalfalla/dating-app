@extends('guest')

@section('title', 'Islam heiraten | Login')

@section('content')


    <div style="margin-top: 4rem !important;" class="container container_form col-12 col-sm-8 col-md-7 col-lg-5 pt-5">

        <div class="card card-body shadow">
            <h1>Login</h1>

            <form id="login-form" class="signup col-12 m-auto" method="post" action="{{ route('login') }}">
                @csrf
                <div id="logAlert"></div>

                <!-- => start input email  !-->
                <div class="input-group input-group-lg mb-3 mt-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-lg"><i class="fa fa-email"></i></span>
                    </div>
                    <input required name="email" placeholder="email" type="email" class="form-control"
                        aria-label="Large" aria-describedby="inputGroup-sizing-sm">
                </div>
                <!-- => End input email  !-->

                <!-- => start input password  !-->
                <div class="input-group input-group-lg mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-lg"><i class="fa fa-key"
                                aria-hidden="true"></i></span>
                    </div>
                    <input required name="password" placeholder="password" type="password" class="form-control"
                        aria-label="Large" aria-describedby="inputGroup-sizing-sm">
                </div>
                <!-- => End input password  !-->


                <div class="mt-4">
                    <input name="login" id="login-btn" type="submit" class="btn btn_form_login btn-block p-2" value="login" style="background-color: #333; color: #fff;">
                </div>

                <br>

                <div>Forgot password?
                    <a href="{{ route('password.request') }}"><strong>reset now</strong></a>
                </div>
                <br>

                <div>don't have account?
                    <a href="{{ route('register') }}"><strong>create a new account now</strong></a>
                </div>

            </form>

        </div>
    </div>


@endsection
