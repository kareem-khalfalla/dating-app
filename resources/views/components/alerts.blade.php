@push('scripts')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        addEventListener('swal:modal', event => {
            console.log('fire...');
            swal({
                title: event.detail.title,
                text: event.detail.text,
                timer: event.detail.timer,
                icon: event.detail.type,
            });
        });

        addEventListener('swal:confirm', event => {
            swal({
                title: event.detail.title,
                text: event.detail.text,
                icon: event.detail.type,
                buttons: true,
                dangerMode: true
            }).then((willDelete) => {
                if (willDelete) {
                    window.livewire.emit('destroy', event.detail.id);
                }
            });
        });
    </script>
@endpush
