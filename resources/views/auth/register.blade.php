<x-guest-layout title="Register">
    <div class="container container_form col-12 col-sm-10 col-md-11 col-lg-10 pt-4 pb-1 my-4">
        <div class="card card-body shadow">
            <h1>Sign Up</h1>
            <form id="register-form" class="col-12 m-auto pt-3" method="post" action="{{ route('register') }}">
                @csrf
                <div id="regAlert"></div>
                <div class="row">
                    <div class="input-group input-group-lg mb-3 col-md-6">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-lg"><i class="fa fa-user"></i></span>
                        </div>
                        <input name="name" value="{{ old('name') }}" placeholder="fullname" type="text"
                            class="form-control @error('name') is-invalid @enderror" aria-label="Large"
                            aria-describedby="inputGroup-sizing-sm">
                        @error('name')
                            <div class="invalid-feedback">
                                <small id="passError" class="text-danger col-12">{{ $message }}</small>
                            </div>
                        @enderror
                    </div>
                    <div class="input-group input-group-lg mb-3 col-md-6">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-lg"><i
                                    class="fa fa-user-circle"></i></span>
                        </div>
                        <input name="username" value="{{ old('username') }}" placeholder="username" type="text"
                            class="form-control @error('username') is-invalid @enderror" aria-label="Large"
                            aria-describedby="inputGroup-sizing-sm">
                        @error('username')
                            <div class="invalid-feedback">
                                <small id="passError" class="text-danger col-12">{{ $message }}</small>
                            </div>
                        @enderror
                    </div>
                    <div class="input-group input-group-lg mb-3 col-md-6">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-lg"><i
                                    class="fa fa-envelope"></i></span>
                        </div>
                        <input name="email" value="{{ old('email') }}" placeholder="email" type="email"
                            class="form-control @error('email') is-invalid @enderror" aria-label="Large"
                            aria-describedby="inputGroup-sizing-sm">
                        <small id="emailHelp" class="form-text text-muted col-12">We'll never share your email with
                            anyone else.</small>
                        @error('email')
                            <div class="invalid-feedback">
                                <small id="passError" class="text-danger col-12">{{ $message }}</small>
                            </div>
                        @enderror
                    </div>
                    <div class="input-group input-group-lg mb-3 col-md-6">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-lg"><i class="fa fa-phone"
                                    aria-hidden="true"></i></span>
                        </div>
                        <input name="phone" value="{{ old('phone') }}" placeholder="phone" type="tel"
                            class="form-control @error('phone') is-invalid @enderror" aria-label="Large"
                            aria-describedby="inputGroup-sizing-sm">
                        @error('phone')
                            <div class="invalid-feedback">
                                <small id="passError" class="text-danger col-12">{{ $message }}</small>
                            </div>
                        @enderror
                    </div>

                    <div class="input-group input-group-lg mb-3 col-md-6">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-lg"><i class="fa fa-key"
                                    aria-hidden="true"></i></span>
                        </div>
                        <input id="rpassword" name="password" placeholder="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" aria-label="Large"
                            aria-describedby="inputGroup-sizing-sm">
                        @error('password')
                            <div class="invalid-feedback">
                                <small id="passError" class="text-danger col-12">{{ $message }}</small>
                            </div>
                        @enderror
                    </div>
                    <div class="input-group input-group-lg mb-3 col-md-6">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-lg"><i class="fa fa-key"
                                    aria-hidden="true"></i></span>
                        </div>
                        <input id="cpassword" name="password_confirmation" placeholder="cofirm password" type="password"
                            class="form-control @error('password_confirmation') is-invalid @enderror" aria-label="Large"
                            aria-describedby="inputGroup-sizing-sm">
                        @error('password_confirmation')
                            <div class="invalid-feedback">
                                <small id="passError" class="text-danger col-12">{{ $message }}</small>
                            </div>
                        @enderror
                    </div>
                    <!-- => End input cofirm password  !-->


                    <!-- => [ Start select box gender ] !-->
                    {{-- <div class="input-group input-group-lg mb-3 col-md-6">

                        <select name="lang" class="form-control form-control-lg ">
                            <option value="">language</option>
                            <option value="eng">arabic</option>
                            <option value="arb">English</option>
                            <option value="alm">German</option>
                        </select>
                    </div> --}}
                    <!-- => [ End select box gender ] !-->

                    <!-- => [ Start select box gender ] !-->
                    <div class="mt-2 mb-2 col-md-6 pr-2">
                        <label class="mr-3"><b>Gender</b></label>
                        <label class="radio-inline p-2"><input type="radio" name="gender"
                                {{ old('gender') ? 'checked' : '' }} value="male">&nbsp;Male</label>
                        <label class="radio-inline p-2"><input type="radio" name="gender"
                                {{ old('gender') ? 'checked' : '' }} value="female">&nbsp;Female</label>
                        @error('gender')
                            <div class="invalid-feedback">
                                <small id="passError" class="text-danger col-12">{{ $message }}</small>
                            </div>
                        @enderror
                    </div>
                    <div class="mt-2 mb-1 mt-4 ml-3">
                        <button id="register-btn" type="submit" class="btn btn_form_signup btn-block m-auto">Sign
                            Up</button>
                    </div>
                    <br>
                    <div class="col-12 pt-2">you have an account already?
                        <a href="{{ route('login') }}"><strong>Login from here</strong></a>
                    </div>
            </form>
        </div>
    </div>
</x-guest-layout>
