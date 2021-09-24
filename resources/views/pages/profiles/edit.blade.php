<x-app-layout>
    @if (!empty($successMessage))
        <div class="alert alert-success" id="success-alert" role="alert">
            <button class="close" data-dismiss="alert">x</button>
            {{ $successMessage }}
        </div>
    @endif

    <div class="container container_settings col-sm-10 col-md-11 col-lg-10 p-1 pt-4 pb-1 mb-4">

        @livewire('profile-component')
    </div>

</x-app-layout>
