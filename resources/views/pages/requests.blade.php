<x-app-layout>
       @section('title')
        {{ __('navbar.title_requests') }}
    @endsection
    <br><br><br><br>
    <div class="container mb-4">
        <div class="row">
            @if (app('router')->getRoutes()->match(app('request')->create(url()->previous()))->getName() != 'results')
                <div class="col-12 col-lg-6 pt-2">
                    @livewire('all-requests-component')
                </div>
            @endif

            <div class="col-12 col-lg-6 pt-2">
                @livewire('user-search-by-username-component', ['usersResults' => session('usersResults')])
            </div>
        </div>
    </div>
</x-app-layout>
