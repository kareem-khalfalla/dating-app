@extends('guest')

@section('title', 'Islam heiraten | Reset Password')

@section('content')


    <div id="layoutAuthentication" style="margin-top: 4rem !important;">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Password Recovery</h3>
                                </div>
                                <div class="card-body">
                                    <div class="small mb-3 text-muted">Enter your email address and we will send you a link
                                        to reset your
                                        password.</div>
                                    <form action="{{ route('password.update') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="token" value="{{ $request->route('token') }}">
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputEmailAddress">Email</label>
                                            <input class="form-control py-4" id="inputEmailAddress" type="email"
                                                aria-describedby="emailHelp" name="email" readonly
                                                value="{{ $request->email }}" />
                                        </div>
                                        <!-- => start input password  !-->
                                        <div class="input-group input-group-lg mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-lg"><i
                                                        class="fa fa-key" aria-hidden="true"></i></span>
                                            </div>
                                            <input id="rpassword" name="password" placeholder="password" type="password"
                                                class="form-control" aria-label="Large"
                                                aria-describedby="inputGroup-sizing-sm">
                                        </div>
                                        <!-- => End input password  !-->

                                        <!-- => start input cofirm password  !-->
                                        <div class="input-group input-group-lg mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-lg"><i
                                                        class="fa fa-key" aria-hidden="true"></i></span>
                                            </div>
                                            <input id="cpassword" name="password_confirmation" placeholder="cofirm password"
                                                type="password" class="form-control" aria-label="Large"
                                                aria-describedby="inputGroup-sizing-sm">
                                            <small id="passError" class="d-none text-danger col-12">password not
                                                much</small>
                                        </div>
                                        <!-- => End input cofirm password  !-->

                                        <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <a class="small" href="{{ route('login') }}">Return to login</a>
                                            <button class="btn btn-primary" type="submit">Update Password</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center">
                                    <div class="small"><a href="{{ route('register') }}">Need an account? Sign
                                            up!</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>

    </div>


@endsection
