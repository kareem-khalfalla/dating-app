<x-app-layout>
    @if ($errors->any())
    {{ dd($errors) }}
        @foreach ($errors->all() as $error)
            {{ $error }}
        @endforeach
    @endif
    @livewire('profile')
</x-app-layout>
