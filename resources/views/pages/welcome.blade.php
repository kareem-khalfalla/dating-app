<x-app-layout>
    @section('title')
        {{ __('navbar.title_welcome') }}
    @endsection
    @include('partials.hero')
    
    @include('partials.latest-users', ['users' => $users])
    @include('partials.contact-us')
    
</x-app-layout>