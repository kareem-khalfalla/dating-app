<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>@yield('title', config('app.name'))</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#1D2625" />
    <meta name="msapplication-navbutton-color" content="#1D2625" />
    <meta name="apple-mobile-web-app-status-bar-style" content="#1D2625" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('theme/css/main_h.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/responsive.css') }}">
    <!-- Font Awesome Library -->
    <link rel="stylesheet" href="{{ asset('theme/css/all.min.css" ') }}">


    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@200;300;400;500;600;700;800&#038;display=swap"
        rel="stylesheet" />

    @toastr_css
</head>

<body>

    <!-- Start Nave Bar !-->
    <nav style="background-color: #111" class="navbar navbar-expand-md navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="../">
                <strong><span>Islam</span><span class="last_link">heiraten</span></strong>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item nav_home">
                        <a class="nav-link hover-bar" href="index.html"><i class="fa fa-home fa-lg p-1"></i>home<span
                                class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item nav_signup">
                        <a class="nav-link hover-bar" href="{{ route('register') }}"><i
                                class="fa fa-user-plus fa-lg p-1"></i>signup</a>
                    </li>

                    <li class="nav-item nav_login">
                        <a class="nav-link hover-bar" href="{{ route('login') }}"><i
                                class="fas fa-sign-in-alt fa-lg p-1"></i>login</a>
                    </li>

                    <li class="nav-item nav_login">
                        <a class="nav-link hover-bar" href="about.html">About</a>
                    </li>

                    <li class="nav-item nav_login">
                        <a class="nav-link hover-bar" href="privacy-policy.html">Privacy policy</a>
                    </li>


                    <li dir="ltr" class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle hover-bar" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                class="fa fa-language fa-lg p-1"></i>language
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="?lang=arb">english</a>
                            <a class="dropdown-item" href="?lang=arb">arabic</a>
                            <a class="dropdown-item" href="?lang=alm">germane</a>
                        </div>
                    </li>

                </ul>

            </div>
        </div>
    </nav>
    <!-- End Nave bar !-->

    @if ($errors->any())
        <ul class="alert alert-danger" style="width: 50%; margin: 0 auto; margin-top: 6rem;" role="alert">
            @foreach ($errors->all() as $error)
                <li style="margin-left: 2rem;">{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    @yield('content')

    <br><br>
    <footer class="bg-light text-center text-white">
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
            <a class="text-white" href="https://islam-heiraten.com/">islam-heiraten.com</a>
        </div>
        <!-- Copyright -->
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="{{ asset('theme/js/scripts.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"
        integrity="sha512-RXf+QSDCUQs5uwRKaDoXt55jygZZm2V++WUZduaU/Ui/9EGp3f/2KZVahFZBKGH0s774sd3HmrhUy+SgOFQLVQ=="
        crossorigin="anonymous"></script>

    @toastr_js
    @toastr_render
</body>

</html>
