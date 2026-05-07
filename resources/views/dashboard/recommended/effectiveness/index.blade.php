@extends('dashboard.layouts.index')
@section('body')
    <script type="text/javascript" src="{{ URL::asset('dist\js\backend\pages\JS_Effective.js') }}"></script>
    {{-- <link  href="../assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" /> --}}
    <div class="container-fluid">
        <div class="row">
            <form action="" method="POST" id="frmRecommended_index">
                <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                <div class="breadcrumb-input-fix d-sm-flex align-items-center">
                    <span>
                        <a href="{{ URL::asset('/system/recommended/index') }}">
                            <button class="btn btn-light btn-sm shadow-sm" id="" type="button"data-toggle="tooltip"
                            data-original-title="Thêm danh mục"><i class="fas fa-book-medical"></i> Danh mục V.I.P</button>
                        </a>
                    </span>
                    <span class="ms-3">
                        <a href="{{ URL::asset('/system/effectiveness/index') }}">
                            <button class="btn btn-success btn-sm shadow-sm" id="" type="button"data-toggle="tooltip"
                            data-original-title="Thêm danh mục"><i class="fas fa-book-medical"></i> Hiệu quả danh mục</button>
                        </a>
                    </span>
                   
                </div>
                <section class="content-wrapper">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row form-group">
                                 <div class="col-md-3">
                                    <div class="breadcrumb-input-right">
                                        <button class="btn btn-success shadow-sm" id="btn_add" type="button"data-toggle="tooltip"
                                            data-original-title="Thêm thể loại"><i class="fas fa-plus"></i></button>
                                        {{-- <button class="btn btn-warning shadow-sm" id="btn_edit" type="button"data-toggle="tooltip"
                                            data-original-title="SỬa thể loại"><i class="far fa-edit"></i></i></button> --}}
                                        <button class="btn btn-danger shadow-sm" id="btn_delete" type="button"data-toggle="tooltip"
                                            data-original-title="Xóa thể loại"><i class="fas fa-trash-alt"></i></i></button>
                                    </div>
                                 </div>
                                <div class="input-group" style="width:40%;height:10%">
                                    <!-- <span class="input-group-text text-body"><i class="fas fa-search"
                                            aria-hidden="true"></i></span> -->
                                    <input id="search" name="search" type="text" class="form-control" placeholder="Từ khóa tìm kiếm..." onkeydown="if (event.key == 'Enter'){JS_Effective.search();return false;}">
                                </div>
                                <button style="width:8%" id="txt_search" name="txt_search" type="button" class="btn btn-dark"><i class="fas fa-search"></i></button>
                            </div>
                            <!-- Màn hình danh sách -->
                            <div class="row" id="table-container-recommended" style="padding-top:10px"></div>
                        </div>
                    </div>
                </section>
            </form>
        </div>
    </div>
    <div class="modal " id="addfile" role="dialog"></div>

    <div id="dialogconfirm"></div>
    <script src='../assets/js/jquery.js'></script>
    <script type="text/javascript">
        var baseUrl = "{{ url('') }}";
        var JS_Effective = new JS_Effective(baseUrl, 'system', 'effectiveness');
        jQuery(document).ready(function($) {
            JS_Effective.loadIndex(baseUrl);
        })
    </script>
@endsection
