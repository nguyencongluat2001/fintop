@extends('dashboard.layouts.index')
@section('body')
<style>
    .cate-btn.active{
        background-color: #2dce89 !important;
        color: #fff;
    }
</style>
    <script type="text/javascript" src="{{ URL::asset('dist\js\backend\pages\JS_Handbook.js') }}"></script>
    {{-- <link  href="../assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" /> --}}
    <div class="container-fluid">
        <div class="row">
            <form action="" method="POST" id="frmHandbook_index">
                <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                <!-- <div class="breadcrumb-input-fix d-sm-flex align-items-center justify-content-between">
                    <button class="btn btn-success btn-sm shadow-sm" id="" type="button"data-toggle="tooltip"
                    data-original-title="Thêm danh mục"><i class="fas fa-book-medical"></i> Cẩm nang</button>
                   
                </div> -->
                <section class="content-wrapper">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row form-group">
                                <div class="col-md-2">
                                    <div class="breadcrumb-input-right">
                                        <button class="btn btn-success shadow-sm" id="btn_add" type="button"data-toggle="tooltip"
                                            data-original-title="Thêm cẩm nang"><i class="fas fa-plus"></i></button>
                                        <!-- <button class="btn btn-warning shadow-sm" id="btn_edit" type="button"data-toggle="tooltip"
                                            data-original-title="SỬa cẩm nang"><i class="far fa-edit"></i></button> -->
                                        <button class="btn btn-danger shadow-sm" id="btn_delete" type="button"data-toggle="tooltip"
                                            data-original-title="Xóa cẩm nang"><i class="fas fa-trash-alt"></i></button>
                                    </div>
                                </div>
                                <div class="col-md-10 ps-2">
                                    <button type="button" class="btn btn-light cate-btn active" onclick="JS_Handbook.changeCate('TU_SACH_DAU_TU', this)">Tủ sách đầu tư</button>
                                    <button type="button" class="btn btn-light cate-btn" onclick="JS_Handbook.changeCate('KT_KT_TA', this)">Kiến thức phân tích kỹ thuật (TA)</button>
                                    <button type="button" class="btn btn-light cate-btn" onclick="JS_Handbook.changeCate('KT_PT_BASIC', this)">Kiến thức phân tích cơ bản (FA)</button>
                                    <button type="button" class="btn btn-light cate-btn" onclick="JS_Handbook.changeCate('KT_PS_CQ_MARGIN', this)">Kiến thức chứng khoán, TTCK</button>
                                </div>
                                <div class="col-md-12" align="right">
                                    <div class="col-md-10">
                                    <div class="input-group">
                                        <!-- <span class="input-group-text text-body"><i class="fas fa-search"
                                        aria-hidden="true"></i></span> -->
                                        <input id="search" name="search" type="text" class="form-control" placeholder="Tìm kiếm..." onkeydown="if (event.key == 'Enter'){JS_Handbook.search();return false;}">
                                        <span class="input-group-btn">
                                            <button id="txt_search" name="txt_search" type="button" class="btn btn-dark mb-0"><i class="fas fa-search"></i></button>
                                        </span>
                                    </div>
                                    </div>
                                </div>

                            </div>
                            <!-- Màn hình danh sách -->
                            <div class="row" id="table-container" style="padding-top:10px"></div>
                        </div>
                    </div>
                </section>
            </form>
        </div>
    </div>
    <div class="modal fade" id="editmodal" role="dialog"></div>
    <div class="modal" id="videomodal" role="dialog"></div>
    <div class="modal " id="addfile" role="dialog"></div>

    <div id="dialogconfirm"></div>
    <script src='../assets/js/jquery.js'></script>
    <script type="text/javascript">
        var baseUrl = '{{ url('') }}';
        var JS_Handbook = new JS_Handbook(baseUrl, 'system', 'handbook');
        $(document).ready(function($) {
            JS_Handbook.loadIndex(baseUrl);
        })
    </script>
@endsection
