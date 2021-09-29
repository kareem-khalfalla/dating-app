@push('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        addEventListener('show-delete-modal', event => {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('destroy');
                }
            })
        });

        addEventListener('deleted', event => {
            Swal.fire(
                'Deleted!',
                event.detail.message,
                'success'
            );
        });
    </script>
@endpush
