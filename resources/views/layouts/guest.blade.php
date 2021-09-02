@include('partials.head', ['title' => $title])
<x-navbar />
{{ $slot }}
<br><br>
@include('partials.footer')
