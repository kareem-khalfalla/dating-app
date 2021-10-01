@component('mail::message')
# Hello {{ $name }}

You didn't shown for a month ago we hope you're doing well,
Please <strong>Login</strong> as soon as possible.
.

@component('mail::button', ['url' => route('login')])
Login
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
