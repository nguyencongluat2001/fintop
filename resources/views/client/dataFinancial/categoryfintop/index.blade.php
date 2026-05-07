@extends('client.layouts.index')
@section('body-client')
<title>TÀI CHÍNH & ĐẦU TƯ FINTOP</title>
<section class="container">
        <div class=" pb-3 d-lg-flex gx-5">
        <div class="col-lg-12">
            <form action="" method="POST" id="frmLoadlist_categoryFintop" class="@if(!Auth::check()) onload @endif">
               <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                <div class="home_index_vnindex pt-1 pb-2" style="background:#b56c6cb5 !important;border-radius:0px !important">
                    <!-- Chú giải xếp hạng TA/FA -->
                    <!-- <div class="home_index_child" style="background:#ffffffe6 !important;">
                        <div class="col-lg-12" style="padding:10px;">
                            <h class=" py-2"><i class="fas fa-chart-bar"></i> <span class="transform-vip" style="font-size:16px;font-family: auto;">DANH MỤC V.I.P FINTOP</span></h>
                            <br>
                            <div class="py-2">
                                <div class="transform-vip" id="table-container-categoryFintop_vip"></div>
                            </div>
                        </div>
                    </div> -->
                    <div class="home_index_child " style="background:#ffffffe6 !important">
                        <div class="col-lg-12" style="padding:10px;">
                            <h class=" py-2"><i class="far fa-chart-bar"></i>. <span style="font-size:16px;font-family: auto;" > DANH MỤC V.I.P FINTOP</span> </h> <br>
                             <!-- Màn hình danh sách hieu qua  -->
                                <div id="table-container-categoryFintop_vip"></div>
                        </div>
                    </div>
                    <!-- biểu đồ FireAnt -->
                    <div class="home_index_child " style="background:#ffffffe6 !important">
                        <div class="col-lg-12" style="padding:10px;">
                            <h class=" py-2"><i class="far fa-chart-bar"></i>. <span style="font-size:16px;font-family: auto;" > HIỆU QUẢ DANH MỤC FINTOP</span> </h> <br>
                             <!-- Màn hình danh sách hieu qua  -->
                                <div id="table-container-categoryFintop_basic"></div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
<div class="modal" id="editmodal_fireAnt" role="dialog"></div>
<script type="text/javascript" src="{{ URL::asset('dist\js\backend\client\DataFinancial\JS_CategoryFintop.js') }}"></script>
    <script src='../assets/js/jquery.js'></script>
    <script type="text/javascript">
        var baseUrl = '{{ url('') }}';
        var JS_CategoryFintop = new JS_CategoryFintop(baseUrl, 'client', 'datafinancial');
        $(document).ready(function($) {
            JS_CategoryFintop.loadIndex(baseUrl);
            // if($("#frmLoadlist_categoryFintop").hasClass('onload')){
            //     JS_CategoryFintop.checkLogin();
            // }
        })
    </script>
@endsection