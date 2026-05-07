
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <title>
        Hệ thống dịch vụ
    </title>
    <base href="{{ asset('') }}">

    {{-- @yield('css') --}}

    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <!-- <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script> -->
    <link href="../clients/fontawesome/css/all.min.css" rel="stylesheet">
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="../assets/css/dashboard.css?v=2.0.4" rel="stylesheet" />

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    <style>
        .animate-charcter
            {
            text-transform: uppercase;
            background-image: linear-gradient( -225deg, #231557 0%, #44107a 29%, #13e1ff 67%, #231557 100% );
            background-size: auto auto;
            background-clip: border-box;
            background-size: 200% auto;
            color: #fff;
            background-clip: text;
            text-fill-color: transparent;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: textclip 2s linear infinite;
            display: inline-block;
            }

            @keyframes textclip {
            to {
                background-position: 200% center;
            }
        }
    </style>
</head>

<body class="">
    <!-- Navbar -->
    <nav
        class="navbar navbar-expand-lg position-absolute top-0 z-index-3 w-100 shadow-none my-3 navbar-transparent mt-5">
        <div class="container">
            <a class="navbar-brand font-weight-bolder ms-lg-0 ms-5 text-white" href="{{ url('/') }}">
                Trang chủ
            </a>
            <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse"
                data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon mt-2">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </span>
            </button>
            <div class="collapse navbar-collapse" id="navigation">
                
            </div>
        </div>
    </nav>
    
    <!-- End Navbar -->
    <!-- style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signup-cover.jpg'); background-position: top;height:800px" -->
    <main class="main-content  mt-0">
        <div class="page-header align-items-start min-vh-50 pt-5"
            style="background-image:url('../assets/images/background.jpg');background-position: top;height:100vh">
            
            <span class="mask bg-gradient-dark opacity-6"></span>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10 mx-auto">
                        <div class="col-md-12 text-center">
                            <h1 class="text-white mb-2 mt-5 animate-charcter">Welcome!</h1>
                        </div>
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>

    </main>
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https:/getContext/buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../assets/js/argon-dashboard.min.js?v=2.0.4"></script>
</body>

</html>
