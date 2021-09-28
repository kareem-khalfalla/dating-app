@include('layouts.partials.head')
@include('layouts.partials.navbar')
<div style="margin: auto 0; padding: 8rem 0;">
    {{ $slot }}
</div>

@include('layouts.partials.footer')
