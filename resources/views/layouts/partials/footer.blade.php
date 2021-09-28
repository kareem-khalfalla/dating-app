@if (!\Route::is('chat'))
    <br><br><br><br>
    <footer class="bg-light text-center text-white">
        <div class="" style=" background-color: var(--color-4);">
            <!-- Grid container -->
            <div class="container p-4 pb-0">
                <!-- Section: Social media -->
                <section class="mb-4">
                    <!-- Facebook -->
                    <a class="btn btn-primary btn-floating m-1" style="background-color: #3b5998;" href="#!"
                        role="button"><i class="fab fa-facebook-f"></i></a>

                    <!-- Twitter -->
                    <a class="btn btn-primary btn-floating m-1" style="background-color: #55acee;" href="#!"
                        role="button"><i class="fab fa-twitter"></i></a>

                    <!-- Google -->
                    <a class="btn btn-primary btn-floating m-1" style="background-color: #dd4b39;" href="#!"
                        role="button"><i class="fab fa-google"></i></a>

                    <!-- Instagram -->
                    <a class="btn btn-primary btn-floating m-1" style="background-color: #ac2bac;" href="#!"
                        role="button"><i class="fab fa-instagram"></i></a>

                    <!-- Linkedin -->
                    <a class="btn btn-primary btn-floating m-1" style="background-color: #0082ca;" href="#!"
                        role="button"><i class="fab fa-linkedin-in"></i></a>
                    <!-- Github -->
                    <a class="btn btn-primary btn-floating m-1" style="background-color: #333333;" href="#!"
                        role="button"><i class="fab fa-github"></i></a>
                </section>
                <!-- Section: Social media -->
            </div>
            <!-- Grid container -->

            <!-- Copyright -->
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                © 2021 Copyright:
                <a class="text-white" href="{{ config('app.url') }}">{{ config('app.name') }}</a>
            </div>
            <!-- Copyright -->
        </div>
    </footer>
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
