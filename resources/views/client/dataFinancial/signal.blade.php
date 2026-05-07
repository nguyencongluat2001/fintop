@extends('client.layouts.index')
@section('body-client')
<title>TÀI CHÍNH & ĐẦU TƯ FINTOP</title>
<!-- tra cứu cổ phiếu -->
<style>
    .hiddel{
        display: none;
    }
    .show{
        display: block;
    }
</style>
<section class="container">
    <div class=" pb-3 d-lg-flex gx-5">
        <div class="col-lg-12">
            <form action="" method="GET" id="frmLoadlist_signal">
                <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                <div class="home_index_vnindex pt-1 pb-3" style="background:#b56c6cb5 !important;border-radius:0px !important">
                    <!-- Chú giải xếp hạng TA/FA -->
                    <div class="home_index_child" style="background:#ffffffe0 !important;">
                        <div class="col-lg-12 top-co-phieu" style="padding:10px;overflow-y: scroll;">
                            <div class="py-2">
                                <!-- Màn hình danh sách -->
                                <div id="table-container-signal"></div>
                            </div>
                            <i class="py-2"><span style="font-family: auto;">- Xem/ẩn chú giải xếp hạng TA/FA:</span></i> 

                            <!-- <h class="h4 py-2"> Chú giải xếp hạng TA/FA</h> -->
                            <input type="checkbox" id="view_chart" name="view_chart" onclick="JS_Signal.view_chart()" /></label>

                            <div id="bank" class="hiddel" class="home_index_vnindex" > 
                                <div class="home_index_child py-2">
                                    <div class="col-md-12" >
                                    <img  style="width:100%;" src="../clients/img/noteDataFintop.png" alt="Card image">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
</section>
<div class="modal" id="editmodal_fireAnt" role="dialog"></div>
<script type="text/javascript" src="{{ URL::asset('dist\js\backend\client\DataFinancial\JS_Signal.js') }}"></script>
<script src='../assets/js/jquery.js'></script>
<script type="text/javascript">
    var baseUrl = "{{ url('') }}";
    var JS_Signal = new JS_Signal(baseUrl, 'client', 'datafinancial');
    $(document).ready(function($) {
        JS_Signal.loadIndex(baseUrl);
    })
</script>
@endsection