@extends('client.layouts.index')
@section('body-client')
<title>CẨM NANG ĐẦU TƯ</title>
<style>
</style>
<div class="banner-wrapper">
    <section class="container">
        <div class=" pb-3 d-lg-flex gx-5">
        <div class="col-lg-12">
            <form action="" method="POST" id="frmLoadlist_library">
             <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="home_index_vnindex pt-1 pb-2" style="background:#b56c6cb5 !important;border-radius:0px !important">
                    <!-- Chú giải xếp hạng TA/FA -->
                    <div class="home_index_child row" style="background:#ffffffc7 !important">
                        <div class="col-lg-9" style="padding:10px;">
                            <!-- <div class="row form-group pt-2">
                                <div class="col-md-5">
                                    <select class="form-control input-sm chzn-select" name="cate"
                                        id="cate">
                                        <option value=''>-- Chọn loại cẩm nang --</option>
                                        @foreach($data['category'] as $item)
                                            <option value="{{$item['code_category']}}">{{$item['name_category']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input id="search" name="search" type="text" class="form-control" placeholder="Tìm kiếm...">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-dark" id="txt_search" name="txt_search"><i class="fas fa-search" aria-hidden="true"></i></button>
                                        </span>
                                    </div>
                                </div>
                            </div> -->
                            <div class="py-2 pt-3">
                                <!-- Màn hình danh sách -->
                                <div id="table-container-library"></div>
                            </div>
                        </div>
                        <div class="col-lg-3" style="padding:10px;" id="menu-library-web">
                            <h class=" py-2"> <span style="font-size:18px;font-family: auto;">	</span></h>
                            <div class="row form-group pt-2" style="text-align: center;">
                                <div class="col-md-12">
                                    <!-- <div style="padding:2%;">
                                         <button style="width:100%;text-align: left" id="txt_search" name="txt_search" type="button" class="btn btn-light"><i class="fas fa-book-open"></i> Cẩm nang cho nhà đầu tư</button>
                                    </div> -->
                                    <div style="padding:2%;">
                                         <button onclick="JS_Library.loadLists('TU_SACH_DAU_TU')" style="width:100%;text-align: left" type="button" class="btn btn-light"><i class="fas fa-book-open"></i>&nbsp; Tủ sách đầu tư</button>
                                    </div>
                                    <div style="padding:2%;">
                                         <button onclick="JS_Library.loadLists('KT_TA')" style="width:100%;text-align: left" type="button" class="btn btn-light"><i class="fas fa-book-open"></i>&nbsp; Kiến thức phân tích kỹ thuật (TA)</button>
                                    </div>
                                    <div style="padding:2%;">
                                         <button onclick="JS_Library.loadLists('KT_FA')" style="width:100%;text-align: left" type="button" class="btn btn-light"><i class="fas fa-book-open"></i>&nbsp; Kiến thức phân tích cơ bản (FA)</button>
                                    </div>
                                    <div style="padding:2%;">
                                         <button onclick="JS_Library.loadLists('KT_TTCK')" style="width:100%;text-align: left" type="button" class="btn btn-light"><i class="fas fa-book-open"></i>&nbsp; Kiến thức chứng khoán, TTCK</button>
                                    </div>
                                    <!-- <div style="padding:2%;">
                                         <button target="_blank" href="https://vn.investing.com/indices/major-indices" style="width:100%;text-align: left" class="btn btn-light"><i class="fas fa-chart-line"></i>&nbsp; Chứng khoán thế giới</button>
                                    </div> -->
                                    <div style="padding:2%;">
                                         <span style="width:100%;text-align: left" class="btn btn-light">
                                            <i class="fas fa-globe-europe"></i>&nbsp;
                                            <a style="color:#000;font-size:16px" target="_blank" href="https://vn.investing.com/indices/global-indices?commodities=on&r_id=">
                                            Chỉ số hàng hóa
                                            </a>
                                        </span>
                                    </div>
                                    <div style="padding:2%;">
                                         <span style="width:100%;text-align: left" class="btn btn-light">
                                            <i class="fas fa-chart-line"></i>&nbsp;
                                            <a style="color:#000;font-size:16px" target="_blank" href="https://vn.investing.com/indices/major-indices">
                                            Chứng khoán thế giới
                                            </a>
                                        </span>
                                    </div>
                                    <div style="padding:2%;">
                                         <span style="width:100%;text-align: left" class="btn btn-light">
                                            <i class="fas fa-coins"></i>&nbsp;
                                            <a style="color:#000;font-size:16px" target="_blank" href="https://vn.investing.com/crypto/">
                                                Coins
                                            </a>
                                        </span>
                                    </div>
                                    <div style="padding:2%;">
                                         <span style="width:100%;text-align: left" class="btn btn-light">
                                            <i class="fab fa-viacoin"></i>&ensp;
                                            <a style="color:#000;font-size:16px" target="_blank" href="https://vn.investing.com/currencies/">
                                            Forex
                                            </a>
                                        </span>
                                    </div>
                                    <div style="padding:2%;">
                                         <span style="width:100%;text-align: left" class="btn btn-light">
                                            <i class="fas fa-money-check"></i>
                                            <a style="color:#000;font-size:16px" target="_blank" href="https://vn.investing.com/news/economy">
                                            Tin kinh tế
                                            </a>
                                        </span>
                                    </div>
                                    <div style="padding:2%;">
                                         <span style="width:100%;text-align: left" class="btn btn-light">
                                            <i class="fas fa-globe-asia"></i>&nbsp;
                                            <a style="color:#000;font-size:16px" target="_blank" href="https://vn.investing.com/news/world-news">
                                            Tin thế giới
                                            </a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>
<div class="modal" id="videomodal" role="dialog"></div>
<script type="text/javascript" src="{{ URL::asset('dist\js\backend\client\JS_Library.js') }}"></script>
<script src='../assets/js/jquery.js'></script>
<script type="text/javascript">
    var baseUrl = '{{ url('') }}';
    var JS_Library = new JS_Library(baseUrl, 'client', 'library');
    $(document).ready(function($) {
        JS_Library.loadIndex(baseUrl);
    })
</script>
@endsection