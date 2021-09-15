<x-app-layout>
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/theme/chat-style.css') }}">
    @endpush
    <div class="container-fluid h-100 pt-5">
        <div class="row justify-content-center h-100">

            <div class="col-md-4 col-xl-3 chat">
                @livewire('chat-list-component', ['users' => $users])
            </div>

            <div class="col-md-8 col-xl-6 chat">
                @if (count($users) > 0)
                    @livewire('chat-messages-component', ['user' => $users[0]->toArray()])
                @endif
            </div>
        </div>
</x-app-layout>
