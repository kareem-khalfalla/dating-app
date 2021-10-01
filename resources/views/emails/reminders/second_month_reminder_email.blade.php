@component('mail::message')
# Hello {{ $name }}

You didn't shown for a two months ago we hope you're doing well,
Please <strong>Login</strong> as soon as possible,
to prevent your account and it's information from deleting permanently within the next few days.

@component('mail::button', ['url' => route('login')])
Login
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
