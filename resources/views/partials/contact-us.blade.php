<section id="contact">
    <div class="row contact container col-12 m-auto">
        <h2 class="text-center col-12 h_2 mb-4">{{ __('welcome.Contact Us') }}</h2>
        <div class="col-12 col-md-6 m-auto pt-3">
            <div class="card">
                <div class="card-header">
                    <h3>{{ __('welcome.Send message') }}</h3>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @else
                        <form action="{{ route('contactStore') }}" method="POST">
                            @csrf
                            <input name="name" class="form-control form-lg mb-2 @error('name') is-invalid @enderror"
                                placeholder="{{ __('welcome.Name') }}">
                            @error('name')
                                <div class="invalid-feedback">
                                    <small id="passError" class="text-danger col-12">{{ $message }}</small>
                                </div>
                            @enderror
                            <input name="email" class="form-control form-lg mb-2 @error('email') is-invalid @enderror"
                                placeholder="{{ __('welcome.Email') }}">
                            @error('email')
                                <div class="invalid-feedback">
                                    <small id="passError" class="text-danger col-12">{{ $message }}</small>
                                </div>
                            @enderror
                            <textarea name="message" placeholder="{{ __('welcome.Message here') }}..."
                                class="form-control @error('message') is-invalid @enderror" cols="30"
                                rows="5"></textarea>
                            @error('message')
                                <div class="invalid-feedback">
                                    <small id="passError" class="text-danger col-12">{{ $message }}</small>
                                </div>
                            @enderror
                            <button class="btn h_btn5 btn-block mt-3">{{ __('welcome.Send') }}</button>
                        </form>
                    @endif
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
                    <p class="lead"><b>{{ __('welcome.Email') }} : </b> {{ env('MAIL_FROM_ADDRESS') }}
                    </p>
                    <br><br><br>
                    <div class="pb-0">
                        <section class="mb-4 pb-3">
                            <a class="btn btn-primary btn-floating m-1" style="background-color: #3b5998;" href="#!"
                                role="button"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-primary btn-floating m-1" style="background-color: #55acee;" href="#!"
                                role="button"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-primary btn-floating m-1" style="background-color: #dd4b39;" href="#!"
                                role="button"><i class="fab fa-google"></i></a>
                            <a class="btn btn-primary btn-floating m-1" style="background-color: #ac2bac;" href="#!"
                                role="button"><i class="fab fa-instagram"></i></a>
                            <a class="btn btn-primary btn-floating m-1" style="background-color: #0082ca;" href="#!"
                                role="button"><i class="fab fa-linkedin-in"></i></a>
                            <a class="btn btn-primary btn-floating m-1" style="background-color: #333333;" href="#!"
                                role="button"><i class="fab fa-github"></i></a>
                        </section>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
