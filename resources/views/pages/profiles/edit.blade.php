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

    @push('scripts')
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script>
            addEventListener('swal:modal', event => {
                swal({
                    title: event.detail.title,
                    text: event.detail.text,
                    timer: event.detail.timer,
                    icon: event.detail.type,
                });
            })

            addEventListener('swal:confirm', event => {
                swal({
                    title: event.detail.title,
                    text: event.detail.text,
                    icon: event.detail.type,
                    buttons: true,
                    dangerMode: true
                }).then((willDelete) => {
                    if (willDelete) {
                        window.livewire.emit('delete', event.detail.id);
                    }
                });
            })
        </script>
    @endpush
</x-app-layout>
