<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="image/x-icon" href="../clients/img/LogoFinTop_notbg.jpg">

    <title>
        FinTop Tài chính - đầu tư
    </title>
    <!--     Fonts and icons     -->
    <base href="{{ asset('') }}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script> -->
    <link href="../clients/fontawesome/css/all.min.css" rel="stylesheet">
    <!-- CSS Files -->
    <link href="../assets/css/dashboard.css?v=2.0.4" rel="stylesheet" />
    <!-- message aler (Thông báo) -->
    <link rel="stylesheet" href="../assets/css/sweetalert2.min.css"/>
    <script src="../assets/js/sweetalert2.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.min.css">
    <link rel="stylesheet" href="../assets/chosen/chosen.min.css">
    <link rel="stylesheet" href="../assets/datepicker/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="../assets/css/toast.min.css">
    @yield('css')

    <script src="../assets/js/croppie.js"></script>
    <link rel="stylesheet" href="https://fintopdata.vn/assets/css/croppie.css">
    <script src="../assets/js/croppie.min.js"></script>
    <script type="text/jscript" src="../assets/js/CoreTable.js"></script>
    <script src="../clients/js/jquery.min.js"></script>
    <script type="text/javascript" src="{{ URL::asset('assets\js\NclLibrary.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('dist\js\backend\pages\JS_System_Security.js') }}"></script>

    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

</head>
<style>
    .cke_dialog_container label{
        color: #000;
    }
</style>
@php
use Modules\System\Dashboard\ApprovePayment\Models\ApprovePaymentModel;
use Modules\System\Dashboard\Users\Models\UserModel;

$data = ApprovePaymentModel::where('status',0)->count();
$arrdData = ApprovePaymentModel::where('status',0)->get()->toArray();

@endphp
    @if ($_SESSION['color_view'] == 1)
        <body id="addMenu" class="g-sidenav-show dark-version ">
    @else
        <body id="addMenu" class="g-sidenav-show bg-white ">
    @endif
    <div id="imageLoading">
            <div class="loader_bg">
                <div class="loader"><img src="../assets/images/loading.gif" alt="#" /></div>
            </div>
        </div>
        
    <!-- <div class="min-height-300 bg-primary position-absolute w-100"></div> -->
    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 ps " id="sidenav-main" style="background:#1d2440 !important">
    <div style="margin-left: 90%;color:white" class="btn_closeMenu" id="btn_closeMenu">
        <span onclick="Js_Main.remoteMenu(this)" >X</span>
    </div>
        <div class="sidenav-header">
        <i class="fas fa-times cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <!-- target="_blank" -->
        <a class="navbar-brand m-0" href="{{url('/')}}">
            <img src="../clients/img/LogoFinTop_red.png" class="navbar-brand-imgh-120" alt="main_logo" style="width:80%;padding-left:20%">
            <span class="ms-1 font-weight-bold"></span>
        </a>
        </div>
        <hr class="horizontal dark mt-7">
        <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main" >
            <ul class="navbar-nav">
                <!-- sidebar -->
                @if(isset($_SESSION['sidebar']))
                    @foreach($_SESSION['sidebar'] as $value)
                        <li class="nav-item">
                            <a style="color:white" class="{{$value['a']}}" href="{{ URL::asset($value['href']) }}">
                                <i class="{{$value['icon']}}"></i>
                                <span class="nav-link-text ms-1" >{{$value['name']}}</span>
                            </a>
                        </li>
                    @endforeach
                @endif
                    <!-- <li class="nav-item">
                        <a style="color:white" class="nav-link " href="../pages/billing.html">
                            <i class="fas fa-user-cog"></i>
                            <span class="nav-link-text ms-1">Quản trị mã khuyến mại </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a style="color:white" class="nav-link " href="../pages/virtual-reality.html">
                            <i class="fas fa-money-check-alt"></i>
                            <span class="nav-link-text ms-1">Quản trị doanh thu</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a style="color:white" class="nav-link " href="../pages/rtl.html">
                            <i class="fas fa-hand-holding-usd"></i>
                            <span class="nav-link-text ms-1">Báo cáo</span>
                        </a>
                    </li> -->
            </ul>
        </div>
    </aside>
    <!-- style="background-color:#2a3352f0; padding:40px" -->
    <main class="main-content position-relative border-radius-lg "  >
            <!-- Content -->

            <div id="app">
            <center>
            <div id="btn_addMenu" class="navbar navbar-expand-md shadow-sm menu_layout">
               <button type="button" onclick="Js_Main.addMenu(this)" class="btn btn-light icon-menu-home" >Menu</button> 
               <ul class="navbar-nav ms-auto acc_auth">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Đăng nhập') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Đăng ký') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <!-- <span id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <img  src="{{url('/file-image/avatar/')}}/{{ Auth::user()->avatar }}" alt="Image" style="border-radius:50%;height: 30px;width: 30px;object-fit: cover;">
                                </span>    -->
                            <span id="navbarDropdown" class="dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <span>
                                {{ $_SESSION['name'] }}
                                </span>
                            </span>


                            <div class="dropdown-menu dropdown-menu-end"  aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ URL::asset('/system/userInfo/index') }}">
                                        <p>
                                            {{ __('Thông tin cá nhân') }}
                                        </p>
                                </a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        <p>
                                            {{ __('Đăng xuất') }}
                                        </p>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
            </center>
            <!-- style="background-color: #11112c5e; border-radius: 5px;" -->
                <nav class="navbar navbar-expand-md shadow-sm" >
                    <div class="container">
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <!-- Left Side Of Navbar -->
                            <ul class="navbar-nav me-auto">

                            </ul>
                            <span style="width:60%">
                            <marquee>
                            <span>
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
                            </span>
                                
                            </marquee>
                            </span>

                            <!-- Right Side Of Navbar -->
                            <ul class="navbar-nav ms-auto">
                                <!-- Authentication Links -->
                                @guest
                                    @if (Route::has('login'))
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('login') }}">{{ __('Đăng nhập') }}</a>
                                        </li>
                                    @endif

                                    @if (Route::has('register'))
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('register') }}">{{ __('Đăng ký') }}</a>
                                        </li>
                                    @endif
                                @else
                                    <li class="nav-item dropdown">
                                        <!-- <span id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                <img  src="{{url('/file-image/avatar/')}}/{{ Auth::user()->avatar }}" alt="Image" style="border-radius:50%;height: 30px;width: 30px;object-fit: cover;">
                                            </span>    -->
                                        <span id="navbarDropdown" class="dropdown-toggle" href="#" role="button"
                                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            <span>
                                            {{ $_SESSION['name'] }}
                                            </span>
                                        </span>


                                        <div class="dropdown-menu dropdown-menu-end"  aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ URL::asset('/system/userInfo/index') }}">
                                                    <p>
                                                        {{ __('Thông tin cá nhân') }}
                                                    </p>
                                            </a>
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                                    <p>
                                                        {{ __('Đăng xuất') }}
                                                    </p>
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                @endguest
                            </ul>
                            <li class="nav-item px-3 d-flex align-items-center">
                                <a href="javascript:;" class=" text-black p-0">
                                    <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
                                </a>
                            </li>
                            <li class="nav-item dropdown pe-2 d-flex align-items-center">
                                
                                @if($data > 0)
                                <a style="color:#ff8000" href="javascript:;" class=" text-black p-0" id="dropdownMenuButton"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-bell cursor-pointer"></i>
                                </a>
                                <sup style="color:red"><b>{{$data}}</b></sup>
                                @else
                                <a style="color:#00c101" href="javascript:;" class=" text-black p-0" id="dropdownMenuButton"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-bell cursor-pointer"></i>
                                </a>
                                @endif
                                <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4"
                                    aria-labelledby="dropdownMenuButton">
                                    @foreach($arrdData as $value)
                                    @php 
                                    $users = UserModel::find( $value['user_id']);
                                    @endphp
                                        <li class="mb-2">
                                            <a class="dropdown-item border-radius-md" href="javascript:;">
                                                <div class="d-flex py-1">
                                                    <div class="my-auto">
                                                        <img src="{{url('/file-image/avatar/')}}/{{$users['avatar']}}" class="avatar avatar-sm  me-3 ">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="text-sm font-weight-normal mb-1">
                                                            <span class="font-weight-bold">Tên khách hàng :</span> {{$users['name']}}
                                                            <br>
                                                            <span class="font-weight-bold">Gói đăng ký :</span> <span style="color:#ffa940">{{$value['role_client']}}</span>
                                                        </h6>
                                                        <p class="text-xs text-secondary mb-0">
                                                            <i class="fa fa-clock me-1"></i>
                                                            13 minutes ago
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        </div>
                    </div>
                </nav>

                <main class="py-4" >
                    @yield('content')
                </main>
            </div>
            @yield('body')
        </main>
    <!--   Core JS Files   -->
    <script src='../assets/js/jquery.js'></script>
    <script type="text/javascript" src="{{ URL::asset('..\assets\js\Js_Main.js') }}"></script>
        @if($_SESSION["color_view"] == 1)
        <script type="text/javascript">
            var Js_Main = new Js_Main(this);
            jQuery(document).ready(function ($) {
                Js_Main.darkMode(1);
            })
        </script>
        @else 
        <script type="text/javascript">
            var Js_Main = new Js_Main(this);
            jQuery(document).ready(function ($) {
                Js_Main.darkMode(2);
            })
            </script>

        @endif
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="../assets/js/plugins/chartjs.min.js"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }

        // var JS_System_Security = new JS_System_Security();
        //     $(document).ready(function($) {
        //         JS_System_Security.security();
        //     })
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    {{--<script src="../assets/js/dashboard.min.js?v=2.0.4"></script>--}}
    <!-- <script src="../assets/js/argon-dashboard.js"></script> -->
    <script type="text/jscript" src="../assets/chosen/chosen.min.js"></script>
    <script type="text/jscript" src="../assets/datepicker/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript" src="../assets/ckeditor/ckeditor.js"></script>
    <script type="text/jscript" src="../assets/js/toast.min.js"></script>
    <script>
        setTimeout(() => {
            $('#imageLoading').addClass("loader_bg_of");
        }, 2000)
    </script>
    @yield('js')
</body>
</html>
