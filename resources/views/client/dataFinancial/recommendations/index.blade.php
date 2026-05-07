@extends('client.layouts.index')
@section('body-client')
<!-- tra cứu cổ phiếu -->
<title>TÀI CHÍNH & ĐẦU TƯ FINTOP</title>
<section class="container">
    <div class=" pb-3 d-lg-flex gx-5">
    <div class="col-lg-12">
        <form action="" method="GET" id="frmLoadlist_recommendations">
            <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
            <div class="home_index_vnindex pt-1 pb-3" style="background:#b56c6cb5 !important;border-radius:0px !important">
                <!-- Chú giải xếp hạng TA/FA -->
                <div class="home_index_child" style="background:#ffffffe6 !important;display:block;">
                    <div class="col-lg-12" style="padding:10px;">
                    <h1 class="h5 "> I. TÍN HIỆU V.I.P</h1>
                        <!-- <h class="h4 py-2"> <span style="font-family: auto;">Tín Hiệu V.I.P</span></h> -->
                            <!--@if((isset($_SESSION['role']) && $_SESSION['role'] == 'USERS') && (!isset($_SESSION['account_type_vip']) || ($_SESSION['account_type_vip'] != 'VIP2' && $_SESSION['account_type_vip'] != 'KIM_CUONG')))
                                <span><i class="far fa-lightbulb"></i> Đăng ký VIP để xem danh mục Tín Hiệu V.I.P FINTOP
                                    <button  type="button" class="btn btn-success" href="{{ url('/client/privileges/index') }}"> <a href="{{ url('/client/privileges/index') }}" style="animation: lights 2s 750ms linear infinite;">Đăng ký</a></button>
                                </span>
                            @endif -->
                            
                        <div class="table-responsive py-2" 
                            @if(!Auth::check()) 
                                onclick="JS_Recommendations.checkLogin()" 
                            @elseif(Auth::check() && ((isset($_SESSION['role']) && $_SESSION['role'] == 'USERS') && (!empty($_SESSION['account_type_vip']) && ($_SESSION['account_type_vip'] != 'VIP1' && $_SESSION['account_type_vip'] != 'VIP2' && $_SESSION['account_type_vip'] != 'KIM_CUONG'))))
                                onclick="JS_Recommendations.checkVIP()" 
                            @endif
                            >
                            <!-- Màn hình danh sách -->
                            <div id="table-container-recommendations" @if((isset($_SESSION['role']) && $_SESSION['role'] == 'USERS') && (!isset($_SESSION['id']) || ($_SESSION['account_type_vip'] != 'VIP1' &&  $_SESSION['account_type_vip'] != 'VIP2' &&  $_SESSION['account_type_vip'] != 'KIM_CUONG'))) onclick="JS_Recommendations.checkLogin()" @endif></div>
                        </div>
                        <!-- <h class="h5 py-2">- <span style="font-family: auto;">Chú giải xếp hạng TA/FA</span> : </h> <i style="color:#3ac500" class="far fa-eye"></i> -->
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<div class="modal" id="editmodal_fireAnt" role="dialog"></div>
<script type="text/javascript" src="{{ URL::asset('dist\js\backend\client\DataFinancial\JS_Recommendations.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('dist\js\backend\pages\JS_System_Security.js') }}"></script>

    <script src='../assets/js/jquery.js'></script>
    <script type="text/javascript">
        var baseUrl = "{{ url('') }}";
        var JS_Recommendations = new JS_Recommendations(baseUrl, 'client', 'datafinancial');
        $(document).ready(function($) {
            JS_Recommendations.loadIndex(baseUrl);
        })
        // var JS_System_Security = new JS_System_Security();
        //     $(document).ready(function($) {
        //         JS_System_Security.security();
        //     })
    </script>
@endsection