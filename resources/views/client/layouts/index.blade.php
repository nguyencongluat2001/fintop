<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <base href="{{ asset('') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="../clients/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="../clients/img/LogoFinTop_notbg.jpg">
    <meta property="og:type" content="website">
    <meta property="og:url" content="@yield('og:url','https://fintopdata.vn')">
    <meta property="fb:app_id" content="2115022521881483">

    <meta property="og:image" content="@yield('og:image', 'https://fintopdata.vn/clients/img/LogoFinTop_notbg.jpg')" />
    <meta property="og:image:secure_url" content="@yield('og:image', 'https://fintopdata.vn/clients/img/LogoFinTop_notbg.jpg')" />

    <meta property="og:title" content="@yield('og:title','FinTop DATA | Dữ Liệu Chứng Khoán')">
    <meta property="og:description" content="@yield('og:title','FinTop DATA | Dữ Liệu Chứng Khoán')">
    <?php $current_url = Request::url(); ?>
    @if($current_url == 'https://fintopdata.vn' || $current_url == 'https://fintopdata.vn/' || $current_url == 'https://fintopdata.vn/client/home/index')
        <!-- <meta property="og:image" content="https://fintopdata.vn/clients/img/LogoFinTop_notbg.jpg" /> -->
        <!-- <meta property="og:image:width" content="640">
        <meta property="og:image:height" content="400"> -->
    @endif


    <!-- Load Require CSS -->
    {{-- @yield('css') --}}
    <!-- <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script> -->
    <link href="../clients/fontawesome/css/all.min.css" rel="stylesheet">

    <link href="../clients/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font CSS -->
    <link href="../clients/css/boxicon.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
    <!-- Load Tempalte CSS -->
    <link rel="stylesheet" href="../clients/css/templatemo.css?version=1.0.1">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../clients/css/custom.css">
    <link rel="stylesheet" href="../assets/chosen/chosen.min.css">
    <script src="https://unpkg.com/lightweight-charts@3.4.0/dist/lightweight-charts.standalone.production.js"></script>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <link rel="stylesheet" href="../assets/css/toast.min.css">
</head>
<style>
    /* b,
    span,
    strong {
        font-size: 14px;
    } */

    body {
        background-image: url("../clients/img/bgctys.jpg");
        /* background-repeat: no-repeat; */
        background-size: cover;
        position: relative;
        background-position: 40% -200px;
        background-attachment: fixed;
    }

    .bgs {
        /* background-image: url("../clients/img/background2.jpg") !important; */
        width: 100%;
        background: #700e13;

        /* Center and scale the image nicely */
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }

    .bgft {
        /* background-image: url("../clients/img/sequel-background-1.png") !important; */
        width: 100%;
        background: #731b1bde !important;
        /* Center and scale the image nicely */
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }

    .navbar-brand.header-logo {
        width: 7%;
    }

    #menuClient {
        position: -webkit-sticky;
        position: sticky;
        top: 0;
        left: 0;
        right: 0;
        z-index: 1000;
    }

    #navbar-toggler-success {
        text-align: center;
    }

    #menuClient {
        background-color: #700e13;
    }

    /* #menuClient .align-items-center{
        background:#700e13
    } */
    #menu-content {
        border-radius: 50%;
        margin: auto;
    }

    .btn_close {
        display: none;
    }

    @media (min-width: 992px) {
        /* #menuClient {
            display: block;
        } */

        .header-logo {
            margin-left: 10%;
        }

        #navbar-toggler-success {
            display: block;
        }

        .logo-title {
            font-size: 3rem;
        }

        .title-reponsive {
            width: 80%;
        }
    }

    @media (max-width: 768px) {
        .navbar-brand.header-logo {
            width: 10%;
        }

        .navbar-toggler-success {
            left: 30% !important;
            transform: translateX(-40%) !important;
        }

        .navbar-toggler-success h1 {
            padding-left: 22% !important;
        }

        .logo-title {
            font-size: 2.5rem;
        }
    }

    @media (max-width: 540px) {
        .logo-title {
            font-size: 2rem;
        }
    }

    @media (max-width: 450px) {
        body.no-scroll {
            overflow: hidden;
            /* Ngăn cuộn */
        }

        .logo-title {
            font-size: calc(1.375rem + 1.5vw);
        }

        .btn_close {
            display: block;
        }

        #menuClient #navbar-toggler-success {
            background: rgba(0, 0, 0, 0.7);
        }

        #menuClient #navbar-toggler-success #menu-content {
            border-radius: unset;
            margin: 0;
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
        }

        #menuClient #navbar-toggler-success #nav-menu-content {
            background-color: #700e13;
            bottom: 0;
            position: absolute;
            top: 0;
            right: 0;
            left: 0;
            animation: menu-show .5s;
        }

        @keyframes menu-show {
            0% {
                left: -200px;
            }

            100% {
                left: 0;
            }
        }

        #menu-content {
            width: 100%;
            background-color: #0000005c;
        }

        #nav-menu-content {
            width: 60%;
        }

        .align-self-center.title-reponsive h1 {
            font-size: 2rem !important;
        }

        #navbar-toggler-success {
            text-align: left;
        }
    }

    @media (max-width: 350px) {
        .align-self-center.title-reponsive h1 {
            font-size: 1.35rem !important;
        }
    }

    .navbar-toggler.border-0:focus {
        outline: none;
        box-shadow: none;
    }

    .loader_bg {
        position: fixed;
        z-index: 9999999;
        /* background: #fff; */
        width: 100%;
        height: 100%;
    }

    .loader {
        height: 100%;
        width: 100%;
        position: absolute;
        left: 0;
        top: 0;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .loader img {
        width: 100px;
    }

    .loader_bg_of {
        display: none;
    }

    .logo-title {
        font-size: 4.1em;
    }
</style>
<script src="../clients/js/jquery.min.js"></script>
<script type="text/javascript" src="{{ URL::asset('assets\js\NclLibrary.js') }}"></script>

<script type="text/javascript">
    $('.button').click(function() {
        $('.menu .items span').toggleClass('active');
        $('.menu .button').toggleClass('active');
    });

    $(document).ready(function() {
        // $('#textbox1').val(this.checked);
        $('#checkbox1').change(function() {
            if (this.checked) {
                $('#pDetails').removeClass("hidden");
                $('#pDetails').addClass("transform");
            } else {
                $('#pDetails').removeClass("transform");
                $('#pDetails').addClass("hidden");
            }

        });
    });
</script>

<body style="position: relative;" onload="loadBell()">
    <!-- <div id="imageLoading" class="loader_bg_of">
        <div class="loader_bg">
            <div class="loader"><img src="../assets/images/loading.gif" alt="#" /></div>
        </div>
    </div> -->
    <div class="header-one ">
        <div class="container header-one">
            <div class="date-header">
                <span id="time"></span>
            </div>
            <div class="marquee-header">
                <marquee style="color:white">
                    <!-- <span>
                    Cổ phiếu luôn là hình ảnh đại diện cho một công ty, do vậy bạn nên tìm hiểu kỹ chính sách kinh doanh của công ty trước khi quyết định đầu tư.
                    </span>
                    <span style="padding-left:200px">
                    Cổ phiếu luôn là hình ảnh đại diện cho một công ty, do vậy bạn nên tìm hiểu kỹ chính sách kinh doanh của công ty trước khi quyết định đầu tư.
                    </span>
                    <span style="padding-left:200px">
                    Thị trường chứng khoán thường xảy ra tình trạng lao dốc của những cổ phiếu, nhà đầu tư giỏi sẽ biết tìm kiếm cơ hội để mua cổ phiếu tiềm năng với giá rẻ.– Peter Lynch
                    </span>
                    <span style="padding-left:200px">
                    Những cổ phiếu thành công không nói cho bạn khi nào nên bán. Khi bạn cảm thấy thích khoe khoang, có lẽ đã đến lúc để bán.– John Neff
                    </span>
                    <span style="padding-left:200px">
                    Nếu bạn không sẵn sàng sở hữu một cổ phiếu trong mười năm, thậm chí đừng nghĩ đến việc sở hữu nó trong mười phút.– Warren Buffett
                    </span> -->
                    <span>Mọi thông tin phân tích chỉ mang tính chất tham khảo, nhà đầu tư tự ra quyêt định và chịu hoàn toàn trách nhiệm trước kết quả đầu tư của mình.</span>

                </marquee>
            </div>
            <div class="user-login-header">
                <!-- <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex" id="navbar-toggler-success"> -->
                <ul class="navbar-nav">
                    <!-- Authentication Links -->
                    @guest
                    <div style="display:flex;">
                        <div>
                            @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}" style="color:white;padding:0px"><span>{{ __('Đăng nhập') }}</span> </a>
                            </li>
                            @endif
                        </div>
                        <div style="padding-left:10px">
                            @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}" style="color:white;padding:0px"><span>{{ __('Đăng ký') }}</span> </a>
                            </li>
                            @endif
                        </div>
                    </div>
                    @else
                    <li class="nav-item dropdown">
                        <span id="navbarDropdown" class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <img src="{{url('/file-image/avatar/')}}/{{ Auth::user()->avatar }}" alt="Image" style="border-radius:50%;height: 30px;width: 30px;object-fit: cover;">
                            <span style="color:white">
                                {{ isset($_SESSION['name'])?$_SESSION['name']:'' }}
                            </span>
                        </span>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ URL::asset('/client/infor/index') }}">
                                <p>
                                    {{ __('Thông tin cá nhân') }}
                                </p>
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                <p>
                                    {{ __('Đăng xuất') }}
                                </p>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest
                    {{-- @if (!empty($_SESSION['id']))
                        <span id="navbarDropdown" class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <img src="{{url('/file-image/avatar/')}}/{{ !empty(Auth::user()->avatar)?Auth::user()->avatar:'' }}" alt="Image" style="border-radius:50%;height: 30px;width: 30px;object-fit: cover;">
                    <span style="color:white">
                        {{ isset($_SESSION['name'])?$_SESSION['name']:'' }}
                    </span>
                    </span>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ URL::asset('/client/infor/index') }}">
                            <p>
                                {{ __('Thông tin cá nhân') }}
                            </p>
                        </a>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            <p>
                                {{ __('Đăng xuất') }}
                            </p>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                    @else
                    <div style="display:flex;">
                        <div>
                            @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}" style="color:white;padding:0px"><span>{{ __('Đăng nhập') }}</span> </a>
                            </li>
                            @endif
                        </div>
                        <div style="padding-left:10px">
                            @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}" style="color:white;padding:0px"><span>{{ __('Đăng ký') }}</span> </a>
                            </li>
                            @endif
                        </div>
                    </div>
                    @endif--}}
                </ul>
                <!-- Right Side Of Navbar -->
            </div>
        </div>
    </div>
    <!-- bg-white -->
    <div class="bgs">
        <nav id="main_nav" class="navbar navbar-expand-lg  shadow" style="padding:0px !important">
            <div class="container d-flex justify-content-between align-items-center mt-3">
                <div class="navbar-brand h1 header-logo" href="#">
                    <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-toggler-success" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon text-white"><i class="fa fa-bars"></i></span>
                    </button>
                    <span id="logo">
                        <a @if(isset($_SESSION['role']) && !in_array($_SESSION['role'], ['USERS', 'USER' ])) href="{{ url('') . '/system/home/index' }}" @else href="" @endif>
                            <img class="card-img " src="../clients/img/LogoFinTop_notbg.jpg" alt="Card image">
                        </a>
                        <span class="logo-title-mobile">
                            Tài Chính & Đầu Tư
                        </span>
                    </span>
                    <span id="auth-search">
                        @if(!isset($_SESSION['id']))
                        <a href="{{ url('login') }}"><i class="fa fa-user"></i></a>
                        @else
                        <span id="navbarDropdown" class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <i class="fa fa-user"></i>
                        </span>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ URL::asset('/client/infor/index') }}">
                                <p>
                                    {{ __('Thông tin cá nhân') }}
                                </p>
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                <p>
                                    {{ __('Đăng xuất') }}
                                </p>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                        @endif

                        <span class="ms-1"><i class="fa fa-search"></i></span>
                    </span>
                </div>
                <div class="align-self-center title-reponsive navbar-collapse flex-fill d-lg-flex collapse show navbar-toggler-success" id="navbar-toggler-success" style="color: white; margin: auto; position: relative;display:flex !important;justify-content:center;">
                    <h1 class="logo-title" style="font-family: auto;font-weight: 500;color:#fff079;padding-left: 4%;">Tài Chính &amp; Đầu Tư</h1>
                </div>
                <div class="navbar-brand h1 header-logo" href="#"></div>
            </div>
            <div class="menu-mobile">
                <div class="menu-mobile-home" style="display: flex;"><a href="{{ url('client') }}/home/index"><i class="fas fa-home"></i></a></div>
                <div class="menu-mobile-list">
                    <ul>
                        @foreach($menuItems as $key => $value)
                        @if($key != 'home')
                        <li class="menu-link link-{{$key}}">
                            <a class="nav-link" href="{{ url('client') }}/{{$key}}/index">{{$value['name']}}</a>
                        </li>
                        @endif
                        @endforeach
                    </ul>
                </div>
            </div>
            @foreach($menuItems as $key => $value)
            @php if($_SERVER['REQUEST_URI'] == '/' || $_SERVER['REQUEST_URI'] == '') $_SERVER['REQUEST_URI'] = 'datafinancial'; @endphp
            @if(!empty($value['child']) && strpos($_SERVER['REQUEST_URI'], $key) !== false)
            <div class="menu-mobile">
                <div class="container d-flex justify-content-between align-items-center link-datafinancial active-menuClient active-menuClient-mobile">
                    <ul class="navbar-nav d-flex justify-content-between text-dark">
                        @foreach($value['child'] as $keyChild => $child)
                        <li class="nav-item" style="width: 100%">
                            <a class="nav-link ps-3 link-{{$keyChild}}" style="color:black;" href="{{ url('client') }}/{{$key}}/{{$keyChild}}"></i><i class="{{$child['icon']}}"></i> {{$child['name']}}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @endif
            @endforeach
            @if(str_contains($_SERVER['REQUEST_URI'], 'library'))
            <div class="menu-mobile">
                @include('client.Library.menuMobile')
            </div>
            @endif
            @if(str_contains($_SERVER['REQUEST_URI'], 'des/'))
            <div class="menu-mobile">
                @include('client.des.menuMobile')
            </div>
            @endif
        </nav>
    </div>
    <nav id="menuClient" class=" navbar-expand-lg  shadow">
        <div class="container d-flex justify-content-between align-items-center fixed-menu">
            <div class="align-self-center collapse navbar-collapse flex-fill d-lg-flex align-items-center" id="navbar-toggler-success">
                @include('client.layouts.menu')
            </div>
        </div>
    </nav>
    @yield('body-client')

    {{-- chat --}}
    {{-- @if(!empty(Auth::user()))
    @include('client.layouts.chat')
    @endif--}}
    @include('client.layouts.chat')
    {{-- end-chat --}}
    <!-- Start Footer -->
    @include('client.layouts.footer')
    <!-- End Footer -->
    <!-- Bootstrap -->
    <script src="../clients/js/bootstrap.bundle.min.js"></script>
    <!-- Load jQuery require for isotope -->
    <script src="../clients/js/jquery.min.js"></script>
    <!-- Isotope -->
    <script src="../clients/js/isotope.pkgd.js"></script>
    <!-- Page Script -->
    <script>
        $(window).load(function() {
            // init Isotope
            var $projects = $('.projects').isotope({
                itemSelector: '.project',
                layoutMode: 'fitRows'
            });
            $(".filter-btn").click(function() {
                var data_filter = $(this).attr("data-filter");
                $projects.isotope({
                    filter: data_filter
                });
                $(".filter-btn").removeClass("active");
                $(".filter-btn").removeClass("shadow");
                $(this).addClass("active");
                $(this).addClass("shadow");
                return false;
            });
        });
    </script>
    <script>
        //setTimeout(() => {
        //  $('#imageLoading').addClass("loader_bg_of");
        //}, 2000)

        function loadBell() {
            if ($("#icon-bell").hasClass('animate-slow')) {
                $("#icon-bell").removeClass('animate-slow');
            } else {
                $("#icon-bell").addClass('animate-slow');
            }
            setTimeout(() => {
                loadBell();
            }, 2000);
        }
    </script>
    <script type="text/javascript" charset="utf-8">
        let a;
        let time;
        var date = new Date().toLocaleDateString()
        var dayvn = new Date();
        // Lấy số thứ tự của ngày hiện tại
        var current_day = dayvn.getDay();
        // Biến lưu tên của thứ
        var day_name = '';

        // Lấy tên thứ của ngày hiện tại
        switch (current_day) {
            case 0:
                day_name = "Chủ nhật";
                break;
            case 1:
                day_name = "Thứ hai";
                break;
            case 2:
                day_name = "Thứ ba";
                break;
            case 3:
                day_name = "Thứ tư";
                break;
            case 4:
                day_name = "Thứ năm";
                break;
            case 5:
                day_name = "Thứ sau";
                break;
            case 6:
                day_name = "Thứ bảy";
        }
        setInterval(() => {
            a = new Date();
            time = day_name + ', ngày ' + date + ' ' + a.getHours() + ':' + a.getMinutes() + ':' + a.getSeconds();
            document.getElementById('time').innerHTML = time;
        }, 1000);
    </script>
    <script type="text/jscript" src="../assets/chosen/chosen.min.js"></script>
    <link rel="stylesheet" href="../assets/css/sweetalert2.min.css" />
    <script src="../assets/js/sweetalert2.min.js"></script>
    <!-- Templatemo -->
    <script src="../clients/js/templatemo.js"></script>
    <!-- Custom -->
    <script src="../clients/js/custom.js"></script>
    <script src="../assets/js/plugins/chartjs.min.js"></script>
    <script type="text/jscript" src="../assets/js/toast.min.js"></script>

    <script src="https://js.pusher.com/4.4/pusher.min.js"></script>
    <script type="text/javascript">
        var pusher = new Pusher("{{ env('PUSHER_APP_KEY', 'b53fd6585787820b39e9') }}", {
            encrypted: true,
            cluster: "ap1"
        });
        var channel = pusher.subscribe('NotificationEvent');
        channel.bind('send-message', function(data) {
            var newNotificationHtml = `<div class="card-body">
            <div class="d-flex flex-row justify-content-start mb-4 avatarMessage">
            <img src="https://vcdn.subiz-cdn.com/widget-v4/public/assets/img/default_avatar.5b74dc1.png" alt="avatar 1" style="width: 30px; height: 100%;">
            <div style="padding-left:5px">
            <div class="p-3 ms-3" style="border-radius: 15px; background-color: #e1ebe6;width:100%">
            <p style="font-size:14px;font-family:auto" class="small mb-0"></p>
            <h5>${data.title}</h5>
            <span>Giá mua: ${data.price_buy}</span><br>
            <span>Mục tiêu: ${data.target}</span><br>
            <span>Dừng lỗ: ${data.stop_loss}</span><br>
            <span>Thời gian: ` + formatDate(data.created_at) + `</span><br>
            <p></p>
            </div>
            </div>
            </div>
            <div id="messages-content"></div>
            </div>`;

            $('.testsss').prepend(newNotificationHtml);
            $("#alertNotifi").attr('class', 'form-control alertNotifi');
            $("#alertNotifi").html('Bạn có ' + data.count + ' thông báo mới');
            $("#alertNotifi").removeAttr('hidden');
            $("#icon-bell").addClass('animate');
        });

        function formatDate(date) {
            var d = new Date(date),
                month = '' + (d.getMonth() + 1),
                day = '' + d.getDate(),
                year = d.getFullYear(),
                hour = d.getHours(),
                minute = d.getMinutes(),
                second = d.getSeconds();

            if (month.length < 2) month = '0' + month;
            if (day.length < 2) day = '0' + day;

            return hour + ':' + minute + ':' + second + ' ' + day + '-' + day + '-' + day;
        }

        function readNotification() {
            var baseUrl = "{{ url('') }}";
            var url = baseUrl + '/client/readNotification';
            $.ajax({
                url: url,
                type: "GET",
                success: function() {
                    $("#alertNotifi").html('');
                    $("#alertNotifi").removeAttr('class');
                    $("#icon-bell").removeClass('animate');
                    window.location.href = baseUrl + '/client/datafinancial/recommendationsIndex';
                }
            });
        }
    </script>
    <script>
        $(".menu-close").click(function() {
            $("#navbar-toggler-success.navbar-collapse").removeClass('show');
        })
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const menuContainer = document.querySelector('.menu-mobile-list');
            const activeItem = document.querySelector('.menu-mobile-list .menu-link.active-menuClient');
            if (activeItem) {
                // Cuộn mục active ra giữa
                const containerWidth = menuContainer.offsetWidth;
                const itemLeft = activeItem.offsetLeft;
                const itemWidth = activeItem.offsetWidth;
                menuContainer.scrollLeft = itemLeft - (containerWidth - itemWidth) / 2;
            }
        });
    </script>
</body>

</html>