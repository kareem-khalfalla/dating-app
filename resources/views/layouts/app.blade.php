@include('partials.head', ['title' => ucfirst(\Request::route()->getName())])
<x-navbar />
{{ $slot }}
<br><br>
@stack('scripts')
@if (!\Route::is('chatify'))
    @include('partials.footer')
@endif
