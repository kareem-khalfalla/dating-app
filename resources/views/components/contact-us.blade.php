<section id="contact">
    <br><br>
    <div class="row contact container col-12 m-auto">
        <h2 class="text-center col-12 h_2 mb-4">{{ __('welcome.Contact Us') }}</h2>

        <div class="col-12 col-md-6 m-auto pt-3">
            <div class="card">
                <div class="card-header">
                    <h3>{{ __('welcome.Send message') }}</h3>
                </div>
                <div class="card-body">
                    @livewire('contact-us-component')
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6 pt-3">
            <div class="card card-contact m-auto">
                <div class="card-header">
                    <h3>{{ __('welcome.Or contact with') }}</h3>
                </div>

                <div class="card-body">
                    <p class="lead"><b>{{ __('welcome.phone') }} : </b> {{ env('PHONE') }}</p>
                    <p class="lead"><b>{{ __('welcome.Email') }} : </b> {{ env('MAIL_FROM_ADDRESS') }}</p>

                    <br><br><br>
                    <!-- Grid container -->
                    <div class="pb-0">
                        <!-- Section: Social media -->
                        <section class="mb-4 pb-3">
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
                        <br>
                        <!-- Section: Social media -->
                    </div>


                </div>

            </div>
        </div>

    </div>
    <br><br>
</section>
