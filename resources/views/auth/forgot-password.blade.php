<x-app-layout>
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container mt-4 pt-4">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center h_3 text-primary">Password Recovery</h3>
                                </div>
                                <div class="card-body">
                                    <div class="small mb-3 text-muted">Enter your email address and we will send you a
                                        link
                                        to reset your
                                        password.</div>
                                    <form action="{{ route('password.request') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputEmailAddress">Email</label>
                                            <input class="form-control py-4" id="inputEmailAddress" type="email"
                                                aria-describedby="emailHelp" name="email" value="{{ old('email') }}"
                                                placeholder="Enter email address" />
                                        </div>
                                        <div
                                            class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <a class="small" href="{{ route('login') }}">Return to login</a>
                                            <button class="btn btn-primary" type="submit">Reset Password</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center">
                                    <div class="small"><a href="{{ route('register') }}">Need an account?
                                            Sign up!</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>


    </div>


    @if (session('status'))
        @php
            toastr('Reset password link sent');
        @endphp
    @endif
</x-app-layout>
