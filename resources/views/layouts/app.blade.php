@include('partials.head', ['title' => ucfirst(\Request::route()->getName())])
<x-navbar />
{{ $slot }}
<br><br>
@stack('scripts')
@if (!\Route::is('chat'))
    @include('partials.footer')
@endif
