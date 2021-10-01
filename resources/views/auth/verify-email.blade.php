<x-app-layout>
    <div style="margin-top: 4rem !important;" class="container container_form col-12 col-sm-8 col-md-7 col-lg-5 pt-5">
        <div class="card card-body shadow">
            <h1>Verification</h1>
            <p>You must verify your e-mail, Please check your e-mail for a verification link.</p>
            <form id="login-form" class="signup col-12 m-auto" method="post" action="{{ route('verification.send') }}">
                @csrf
                <div id="logAlert"></div>
                <div class="mt-4">
                    <input name="login" id="login-btn" type="submit" class="btn btn_form_login btn-block p-2"
                        value="Resend email" style="background-color: #333; color: #fff;">
                </div>
            </form>
        </div>
    </div>
    @if (session('status'))
        @php
            toastr('E-mail verification sent');
        @endphp
    @endif
</x-app-layout>
