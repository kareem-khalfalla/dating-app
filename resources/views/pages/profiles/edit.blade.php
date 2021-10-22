<x-app-layout>
      @section('title')
        {{ __('navbar.title_settings') }}
    @endsection
    <div class="container container_settings col-sm-10 col-md-11 col-lg-10 p-1 pt-4 pb-1 mb-4">
        <div style="margin: auto 0; padding: 8rem 0;">
            @livewire('profile-component')
        </div>
    </div>
</x-app-layout>
