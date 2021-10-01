<x-app-layout>
    @include('partials.hero')
    @include('partials.latest-users', ['users' => $users])
    @include('partials.contact-us')
</x-app-layout>