<x-app-layout>
    <br><br><br><br>
    <div class="container mb-4">
        <div class="row">

            <div class="col-12 col-lg-6 pt-2">
                @livewire('all-requests-component')
            </div>

            <div class="col-12 col-lg-6 pt-2">
                @livewire('user-search-by-name-component')
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            // function hide(){
            //     let el = document.getElementById('hide');
            //     el.parentElement.remove();
            // }
        </script>
    @endpush
</x-app-layout>
