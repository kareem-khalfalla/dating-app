@if (!\Route::is('chat'))
    <x-footer />

@endif
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/scripts.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"
integrity="sha512-RXf+QSDCUQs5uwRKaDoXt55jygZZm2V++WUZduaU/Ui/9EGp3f/2KZVahFZBKGH0s774sd3HmrhUy+SgOFQLVQ=="
crossorigin="anonymous"></script>
@livewireScripts

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

@stack('scripts')

</body>

</html>
