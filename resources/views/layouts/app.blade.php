@include('partials.head', ['title' => 'Profile'])
<x-navbar />
{{ $slot }}
<br><br>
@stack('scripts')
@include('partials.footer')
