<x-app-layout>
    <br><br><br><br>
    <div class="container mb-4">
        <div class="row">

            <div class="col-12 col-lg-6 pt-2">
                @livewire('all-requests-component')
            </div>

            <div class="col-12 col-lg-6 pt-2">
                @livewire('user-search-by-name-component') </div>
        </div>
    </div>

</x-app-layout>
