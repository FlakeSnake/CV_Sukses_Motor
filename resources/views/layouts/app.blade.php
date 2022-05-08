<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CV Sukses Motor</title>

    <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">

    <link href="{{ asset('assets/fontawesome-free-5.15.3-web/css/all.css') }}" rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <link href="{{ asset('assets/startbootstrap-sb-admin-2-gh-pages/css/sb-admin-2.min.css') }}" rel="stylesheet" />

    <script>
        function randombg(){
        var random= Math.floor(Math.random() * 27) + 0;
        var bigSize = [
            "url( {{ asset('assets/image/1.jpg') }} )",
            "url( {{ asset('assets/image/2.jpg') }} )",
            "url( {{ asset('assets/image/3.jpg') }} )",
            "url( {{ asset('assets/image/4.jpg') }} )",
            "url( {{ asset('assets/image/5.jpg') }} )",
            "url( {{ asset('assets/image/6.jpg') }} )",
            "url( {{ asset('assets/image/7.jpg') }} )",
            "url( {{ asset('assets/image/8.jpg') }} )",
            "url( {{ asset('assets/image/9.jpg') }} )",
            "url( {{ asset('assets/image/10.jpg') }} )",
            "url( {{ asset('assets/image/11.jpg') }} )",
            "url( {{ asset('assets/image/12.jpg') }} )",
            "url( {{ asset('assets/image/13.jpg') }} )",
            "url( {{ asset('assets/image/14.jpg') }} )",
            "url( {{ asset('assets/image/15.jpg') }} )",
            "url( {{ asset('assets/image/16.jpg') }} )",
            "url( {{ asset('assets/image/17.jpg') }} )",
            "url( {{ asset('assets/image/18.jpg') }} )",
            "url( {{ asset('assets/image/19.jpg') }} )",
            "url( {{ asset('assets/image/20.jpg') }} )",
            "url( {{ asset('assets/image/21.jpg') }} )",
            "url( {{ asset('assets/image/22.jpg') }} )",
            "url( {{ asset('assets/image/23.jpg') }} )",
            "url( {{ asset('assets/image/24.jpg') }} )",
            "url( {{ asset('assets/image/25.jpg') }} )",
            "url( {{ asset('assets/image/26.jpg') }} )",
            "url( {{ asset('assets/image/27.jpg') }} )",
    ];
        document.querySelector("body").style.backgroundImage=bigSize[random];
      }
      </script>

</head>

<body style="padding-top: 10%; background-size: cover;" onload="randombg()">
    @yield('content')
    <div class="container">

        <!-- Outer Row -->
        {{-- <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form class="user">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <a href="index.html" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </a>
                                        <hr>
                                        <a href="index.html" class="btn btn-google btn-user btn-block">
                                            <i class="fab fa-google fa-fw"></i> Login with Google
                                        </a>
                                        <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                        </a>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="register.html">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div> --}}

    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('assets/js/sb-admin-2.min.js') }}"></script>

</body>

</html>
