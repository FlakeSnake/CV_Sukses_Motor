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
        var random= Math.floor(Math.random() * 10) + 0;
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
    ];
        document.querySelector("body").style.backgroundImage=bigSize[random];
      }
      </script>

</head>

<body style="padding-top: 10%; background-size: cover;" onload="randombg()">
    @yield('content')
    <div class="container">

    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('assets/js/sb-admin-2.min.js') }}"></script>

</body>

</html>
