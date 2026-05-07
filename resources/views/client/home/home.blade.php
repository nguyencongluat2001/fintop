@extends('client.layouts.index')
@section('body-client')
@php
use Carbon\Carbon;
@endphp
<title>TÀI CHÍNH & ĐẦU TƯ FINTOP</title>
<style>
    header {
        font-family: 'Lobster', cursive;
        text-align: center;
        font-size: 25px;
    }

    #info {
        font-size: 18px;
        color: #555;
        text-align: center;
        margin-bottom: 25px;
    }

    a {
        color: #074E8C;
    }

    .scrollbar_blog {
        /* float: left; */
        max-height: 800px !important;
        /* width: 65px; */
        /* background: #F5F5F5; */
        overflow-y: scroll;
        margin-bottom: 25px;
    }

    .force-overflow {
        min-height: 400px;
    }

    #wrapper {
        text-align: center;
        width: 500px;
        margin: auto;
    }

    /*
    *  STYLE 2
    */

    #style-2::-webkit-scrollbar-track {
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
        border-radius: 10px;
        background-color: #F5F5F5;
    }

    #style-2::-webkit-scrollbar {
        width: 12px;
        background-color: #F5F5F5;
    }

    #style-2::-webkit-scrollbar-thumb {
        border-radius: 10px;
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, .3);
        background-color: #D62929;
    }

    .tv-lightweight-charts {
        width: 100%;
        padding-right: var(--bs-gutter-x, 0.5rem) !important;
        padding-left: var(--bs-gutter-x, 0.5rem) !important;
        margin-right: auto !important;
        margin-left: auto !important;
    }

    /* .card {
        background: #ffffff26 !important;
    } */

    .blogReader {
        max-height: 100px;
        display: -webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 2;
        overflow: hidden;
        line-height: 1.5;
        height: calc(16px* 1.3* 2);
    }
    .blogReader * {
        font-size: 1rem;
        font-weight: normal;
        margin-bottom: 0;
    }

    /* {
    box-sizing: border-box;
    } */

    #myInput {
        background-image: url('/css/searchicon.png');
        background-position: 10px 10px;
        background-repeat: no-repeat;
        width: 100%;
        font-size: 16px;
        padding: 12px 12px 40px;
        border: 1px solid #ddd;
        margin-bottom: 12px;
    }

    #myTable {
        border-collapse: collapse;
        width: 100%;
        border: 1px solid #ddd;
        font-size: 18px;
    }

    #myTable th,
    #myTable td {
        text-align: left;
        padding: 12px;
    }

    #myTable tr {
        border-bottom: 1px solid #ddd;
    }

    #myTable tr.header,
    #myTable tr:hover {
        background-color: #f1f1f1;
    }

    @media (max-width: 450px) {
        #myTable img {
            width: 150px !important;
            height: 100px !important;
        }

        #myTable .title {
            max-height: 100px;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 3;
            overflow: hidden;
        }
    }
</style>

<!-- top cổ phiếu biến động -->
<section class="container">
    <div class="table-responsive">
        <!-- Màn hình danh sách top chỉ số tài chính-->
        <div id="table-container-loadListTop"></div>
    </div>
</section>
<!-- Start Banner Hero -->
<div class="banner-wrapper">
    <!-- Màn hình danh sách top chỉ số tài chính
    <div class="table-responsive">
        <div id="table-container-loadListTop"></div>
    </div> -->
    <!-- top cổ phiếu biến động -->
    <section class="container">
        <div class="table-responsive">
            <div id="table-container-loadListTop"></div>
        </div>
    </section>
    <!-- tra cứu cổ phiếu -->
    <section class="container pt-3" style="background:#b56c6cb5">
        <div class="mb-3 d-lg-flex gx-5" style="background-color: #fff;">
            <div class="col-md-8 pt-3" style="border-right: 1px solid #bdbdbd;">
                <div class="col-md-12 mb-3 row">
                    <span><b class="text-uppercase">tra cứu cổ phiếu</b></span>
                </div>
                <div class="row">@include('client.home.loadlist')</div>
            </div>
            <div class="col-md-4 pt-3">
                <div class="col-md-12 mb-3 row">
                    <span><b class="text-uppercase">Hội viên V.I.P</b></span>
                </div>
                <div class="row">
                    <div class="col-md-6 pt-sm-0 pt-3 px-xl-3 dangky-hoivien dangky-hoivien-home pb-2">
                        <div class="pricing-table card card-rounded shadow-sm border-0" style="box-shadow: 3px 3px 8px 0 rgba(0, 0, 0, 0.3) !important">
                            <div class="pricing-table-body card-body text-center">
                                <div class="bg-secondary" style="border-radius: 0.5em;">
                                    <img src="{{url('/clients/img/diamond.png')}}" alt="Image" style="height: 63px;width: 63px;" class="py-2">
                                    <h2 class="pricing-table-heading h5 semi-bold-600 pb-3" style="color:white"><div class="txt-first">HỘI VIÊN</div> <div class="txt-second pt-3">KIM CƯƠNG</div></h2>
                                </div>
                                <div class="pricing-table-footer pt-2">
                                    <a style="background: #165c38;color: #ffffff;font-weight: 500;" onclick="JS_UpgradeAcc.viewInfo('KIM_CUONG')" class="btn rounded-pill px-4 btn-outline-light light-300">Chọn</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 pt-sm-0 pt-3 px-xl-3 dangky-hoivien pb-2">
                        <div class="pricing-table card h-100 card-rounded shadow-sm border-0" style="box-shadow: 3px 3px 8px 0 rgba(0, 0, 0, 0.3) !important">
                            <div class="pricing-table-body card-body text-center">
                                <div class="bg-secondary" style="border-radius: 0.5em;">
                                    <i style="color:#ffbb2e" class="pricing-table-icon display-5 bx bx-package py-2"></i>
                                    <h2 class="pricing-table-heading h5 semi-bold-600 pb-3" style="color:white"><div class="txt-first">HỘI VIÊN</div> <div class="txt-second pt-3">VÀNG</div></h2>
                                </div>
                                <div class="pricing-table-footer pt-2">
                                    <a style="background: #165c38;color: #ffffff;font-weight: 500;" onclick="JS_UpgradeAcc.viewInfo('VIP2')" class="btn rounded-pill px-4 btn-outline-light light-300">Chọn</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 pt-sm-0 pt-3 px-xl-3 dangky-hoivien pb-2">
                        <div class="pricing-table card h-100 card-rounded shadow-sm border-0" style="box-shadow: 3px 3px 8px 0 rgba(0, 0, 0, 0.3) !important">
                            <div class="pricing-table-body card-body text-center">
                                <div class="bg-secondary" style="border-radius: 0.5em;">
                                    <i style="color:#f2f2f2" class="pricing-table-icon display-5 bx bx-package py-2"></i>
                                    <h2 class="pricing-table-heading h5 semi-bold-600 pb-3" style="color:white"><div class="txt-first">HỘI VIÊN</div> <div class="txt-second pt-3">BẠC</div></h2>
                                </div>
                                <div class="pricing-table-footer pt-2">
                                    <a style="background: #165c38;color: #ffffff;font-weight: 500;" onclick="JS_UpgradeAcc.viewInfo('VIP1')" class="btn rounded-pill px-4 btn-outline-light light-300">Chọn</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 pt-sm-0 pt-3 px-xl-3 dangky-hoivien pb-2">
                        <div class="pricing-table card h-100 card-rounded shadow-sm border-0" style="box-shadow: 3px 3px 8px 0 rgba(0, 0, 0, 0.3) !important">
                            <div class="pricing-table-body card-body text-center">
                                <div class="bg-secondary" style="border-radius: 0.5em;">
                                    <i style="color:#7ff3ff" class="pricing-table-icon display-5 bx bx-package py-2"></i>
                                    <h2 class="pricing-table-heading h5 semi-bold-600 pb-3" style="color:white"><div class="txt-first">HỘI VIÊN</div> <div class="txt-second pt-3">TIÊU CHUẨN</div></h2>
                                </div>
                                <div class="pricing-table-footer pt-2">
                                    <a style="background: #165c38;color: #ffffff;font-weight: 500;" onclick="JS_UpgradeAcc.viewInfo('TIEU_CHUAN')" class="btn rounded-pill px-4 btn-outline-light light-300">Chọn</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-3 mb-3 d-lg-flex gx-5" style="background-color: #fff;">
            <div class="col-md-8 pt-3" style="border-right: 1px solid #bdbdbd;">
                <div class="col-md-12 mb-3 row">
                    <span><b>V.I.P ĐẦU TƯ (BCPT VIP)</b></span>
                </div>
                <div id="style-1" class="homeTTTH row vip" 
                @if(!Auth::check()) 
                    onclick="JS_Home.checkLogin()" 
                @elseif(((isset($_SESSION['id']) && $_SESSION['role'] == 'USERS' && $_SESSION['account_type_vip'] != 'VIP1' && $_SESSION['account_type_vip'] != 'VIP2')))
                    onclick="JS_Home.checkVIP()" 
                @endif
                >
                @if(isset($VIP))
                    @foreach ($VIP as $key => $data)
                        @php Carbon::setLocale('vi');$now = Carbon::now(); $created_at = Carbon::create($data->created_at) @endphp
                        @if(!Auth::check()) 
                            <div class="col-md-4 about-list mb-3 bcptVIP" style="pointer-events: none;">
                        @elseif(((isset($_SESSION['id']) && $_SESSION['role'] == 'USERS' && $_SESSION['account_type_vip'] != 'VIP1' && $_SESSION['account_type_vip'] != 'VIP2')))
                             <div class="col-md-4 about-list mb-3 bcptVIP" style="pointer-events: none;">
                        @else
                             <div class="col-md-4 about-list mb-3 bcptVIP">
                        @endif
                            <div style="box-shadow: 3px 3px 10px 0 rgba(0, 0, 0, 0.4); border-radius: 7px;">
                            <div class="about-img">
                                <a href="{{url('/client/about/reader/') . '/' . $data->id}}">
                                    @if((isset($data['type_blog']) && $data['type_blog'] == 'VIP'))
                                    <h1 style="position: absolute;right:0">
                                        <img src="{{url('/clients/img/vip.png')}}" class="image-vip" alt="Image" style="height: 60px;width: 50px;object-fit: cover;">
                                    </h1>
                                    @endif
                                    <img class="card-img-top" src="{{url('/file-image-client/blogs/')}}/{{ !empty($data->imageBlog[0]->name_image)?$data->imageBlog[0]->name_image:'' }}" style="height: 200px;width: 100%;object-fit: cover;" alt="...">
                                </a>
                            </div>
                            <div class="about-content">
                                <div><i>{{ $data->users->name ?? '' }} </i></div>
                                <div><i>{{$created_at->diffForHumans($now)}}   <span style="font-size: 10px;color: #9f9292;"><i class="far fa-eye"></i> {{ $data->view_click }}</span></i></div>
                                <a href="{{url('/client/about/reader/') . '/' . $data->id}}">
                                    <h5 class="card-title light-600 text-dark">{{ $data->detailBlog->title }}</h5>
                                </a>
                            </div>
                            </div>
                        </div>
                    @endforeach
                @endif
                </div>
            </div>
            <div class="col-md-4 pt-3" style="background-color: #ecedee;">
                <div class="col-md-12 mb-3 about-title">
                    <span style="padding-left: 15px;"><b>THỊ TRƯỜNG TỔNG HỢP</b></span>
                </div>
                <div id="style-1" class="homeTTTH homeTTTHScroll" style="padding-left:15px;max-height:600px !important">
                    <ul class="list-group">
                        @if(isset($TTTH))
                        @foreach ($TTTH as $key => $data)
                        @php
                        Carbon::setLocale('vi');$now = Carbon::now();
                        $created_at = Carbon::create($data->created_at);
                        @endphp
                        <div class="col-sm-6 col-lg-12  ttth text-decoration-none {{ $data->code_category }}">
                            <div class="ttth-content d-lg-flex gx-5">
                                <!-- display: flex;align-items: center;justify-content: center; -->
                                <div class="col-lg-3 about-img" style="align-items: right;justify-content: right;position: relative;">
                                    <a href="{{url('/client/about/reader/') . '/' . $data->id}}">
                                        @if((isset($data['type_blog']) && $data['type_blog'] == 'VIP'))
                                        <h1 style="position: absolute;right:0">
                                            <img src="{{url('/clients/img/vip.png')}}" class="image-vip" alt="Image" style="height: 60px;width: 50px;object-fit: cover;">
                                        </h1>
                                        @endif
                                        <img class="card-img-top" src="{{url('/file-image-client/blogs/')}}/{{ !empty($data->imageBlog[0]->name_image)?$data->imageBlog[0]->name_image:'' }}" style="height: 70px;width: 100%;object-fit: cover;" alt="...">
                                    </a>
                                </div>
                                <div class="col-lg-8 about-content">
                                    <i>{{$created_at->diffForHumans($now)}} <span style="padding-left: 10px;font-size: 10px;color: #9f9292;"><i class="far fa-eye"></i> {{ $data->view_click }}</span></i>
                                    <a href="{{url('/client/about/reader/') . '/' . $data->id}}">
                                        <h6 class="card-title light-600 text-dark">{{ $data->detailBlog->title }}</h6>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <hr style="margin: 0;" class="my-3">
                        @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        </div>
        <div class="mt-3 mb-3 d-lg-flex gx-5" style="background-color: #fff;">
            <div class="col-md-8 pt-3" style="border-right: 1px solid #bdbdbd;">
                <div class="col-md-12 mb-3 row">
                    <span><b>NGÀNH ĐẦU TƯ (BCPT NGÀNH)</b></span>
                </div>
                <div id="style-1" class="homeTTTH row vip homeBCPTN">
                    @if(isset($BCPTN))
                    @foreach ($BCPTN as $key => $data)
                    @php Carbon::setLocale('vi');$now = Carbon::now(); $created_at = Carbon::create($data->created_at) @endphp
                    <div class="col-sm-6 col-lg-12  bcptn text-decoration-none {{ $data->code_category }} mb-3">
                        <div class="bcptn-content d-lg-flex gx-5">
                            <!-- display: flex;align-items: center;justify-content: center; -->
                            <div class="col-lg-3 about-img" style="align-items: right;justify-content: right;position: relative;">
                                <a href="{{url('/client/about/reader/') . '/' . $data->id}}">
                                    @if((isset($data['type_blog']) && $data['type_blog'] == 'VIP'))
                                    <h1 style="position: absolute;right:0">
                                        <img src="{{url('/clients/img/vip.png')}}" class="image-vip" alt="Image" style="height: 60px;width: 50px;object-fit: cover;">
                                    </h1>
                                    @endif
                                    <img class="card-img-top" src="{{url('/file-image-client/blogs/')}}/{{ !empty($data->imageBlog[0]->name_image)?$data->imageBlog[0]->name_image:'' }}" style="height: 140px;width: 100%;object-fit: cover;" alt="...">
                                </a>
                            </div>
                            <div class="col-lg-9 about-content">
                                <i>{{ $data->users->name ?? '' }} | {{$created_at->diffForHumans($now)}} <span style="padding-left: 10px;font-size: 10px;color: #9f9292;"><i class="far fa-eye"></i> {{ $data->view_click }}</span></i>
                                <a href="{{url('/client/about/reader/') . '/' . $data->id}}">
                                    <h6 class="card-title light-600 text-dark">{{ $data->detailBlog->title }}</h6>
                                </a>
                                <div class="blogReader">{!! $data->detailBlog->decision !!}</div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
            <div class="col-md-4 pt-3" style="background-color: #ecedee;">
                <div class="col-md-12 mb-3 about-title">
                    <span style="padding-left: 15px;"><b>BCPT CỔ PHIẾU DOANH NGHIỆP</b></span>
                </div>
                <div id="style-1" class="homeTTTH homeBCPTCPDN" style="padding-left:15px;max-height:500px !important">
                    <ul class="list-group">
                        @if(isset($BCPTDN))
                        @foreach ($BCPTDN as $key => $data)
                        @php
                        Carbon::setLocale('vi');$now = Carbon::now();
                        $created_at = Carbon::create($data->created_at);
                        @endphp
                        <div class="col-sm-6 col-lg-12  ttth text-decoration-none {{ $data->code_category }}">
                            <div class="ttth-content d-lg-flex gx-5">
                                <!-- display: flex;align-items: center;justify-content: center; -->
                                <div class="col-lg-3 about-img" style="align-items: right;justify-content: right;position: relative;">
                                    <a href="{{url('/client/about/reader/') . '/' . $data->id}}">
                                        @if((isset($data['type_blog']) && $data['type_blog'] == 'VIP'))
                                        <h1 style="position: absolute;right:0">
                                            <img src="{{url('/clients/img/vip.png')}}" class="image-vip" alt="Image" style="height: 60px;width: 50px;object-fit: cover;">
                                        </h1>
                                        @endif
                                        <img class="card-img-top" src="{{url('/file-image-client/blogs/')}}/{{ !empty($data->imageBlog[0]->name_image)?$data->imageBlog[0]->name_image:'' }}" style="height: 70px;width: 100%;object-fit: cover;" alt="...">
                                    </a>
                                </div>
                                <div class="col-lg-8 about-content">
                                    <i>{{$created_at->diffForHumans($now)}} <span style="padding-left: 10px;font-size: 10px;color: #9f9292;"><i class="far fa-eye"></i> {{ $data->view_click }}</span></i>
                                    <a href="{{url('/client/about/reader/') . '/' . $data->id}}">
                                        <h6 class="card-title light-600 text-dark">{{ $data->detailBlog->title }}</h6>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <hr style="margin: 0;" class="mb-3">
                        @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </section>
</div>
<div style="clear:both"></div>
<div class="modal" id="reader" role="dialog"></div>
<div class="modal" id="formmodal" role="dialog"></div>
<div class="modal" id="formmodal_res" role="dialog"></div>

<!-- End Recent Work -->
<script>
    function myFunction() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>
<script type="text/javascript" src="{{ URL::asset('dist/js/backend/client/JS_About.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('dist/js/backend/client/JS_Home.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('dist/js/backend/client/JS_UpgradeAcc.js') }}"></script>
<script src='../assets/js/jquery.js'></script>
<script type="text/javascript">
    var baseUrl = "{{ url('') }}";
    var JS_About = new JS_About(baseUrl, 'client', 'about', 'home');
    var JS_UpgradeAcc = new JS_UpgradeAcc(baseUrl, 'client', 'upgradeAcc', 'home');
    var JS_Home = new JS_Home(baseUrl, 'client', 'home');
    $(document).ready(function($) {
        JS_Home.loadIndex(baseUrl);
    })
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>


<!-- <script type="text/javascript" src="{{ URL::asset('dist\js\backend\pages\JS_System_Security.js') }}"></script>
<script>
      var JS_System_Security = new JS_System_Security();
          $(document).ready(function($) {
                 JS_System_Security.security();
      })
</script> -->

@endsection