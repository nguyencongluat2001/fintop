@extends('dashboard.layouts.index')
@section('css')
<link rel="stylesheet" href="../dist/css/backend/user.min.css">
@endsection
@section('body')
<style>
    .formSearch{
        position: sticky;
        top: 0;
        background-color: #29314f;
        padding-top: 1rem;
    }
</style>
    <script type="text/javascript" src="{{ URL::asset('dist\js\backend\pages\JS_Client.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('dist\js\backend\pages\JS_User.js') }}"></script>

    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
    {{-- <link  href="../assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" /> --}}
    <div class="container-fluid" >
        <div class="row">
            <form action="" method="POST" id="frmClient_index">
                <input style="display:none" type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                <div class="breadcrumb-input-fix d-sm-flex align-items-center justify-content-between">
                        <!-- <span><H5>DANH SÁCH TÀI KHOẢN</H5></span> -->
                    <!-- <div class="breadcrumb-input-right">
                        <button class="btn btn-success btn-sm shadow-sm" id="btn_add" type="button"data-toggle="tooltip"
                            data-original-title="Thêm người dùng"><i class="fas fa-user-plus"></i></button>
                        <button class="btn btn-warning btn-sm shadow-sm" id="btn_edit" type="button"data-toggle="tooltip"
                            data-original-title="SỬa người dùng"><i class="fas fa-user-edit"></i></button>
                        <button class="btn btn-danger btn-sm shadow-sm" id="btn_delete" type="button"data-toggle="tooltip"
                            data-original-title="Xóa người dùng"><i class="fas fa-user-times"></i></button>
                    </div> -->
                </div>
                <section class="content-wrapper">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row form-group formSearch">
                            <div class="col-md-3">
                            <!-- <button class="btn btn-success shadow-sm" id="btn_add" type="button"data-toggle="tooltip"
                            data-original-title="Thêm người dùng"><i class="fas fa-user-plus"></i></button> -->
                            <!-- <button class="btn btn-warning shadow-sm" id="btn_edit" type="button"data-toggle="tooltip"
                                data-original-title="SỬa người dùng"><i class="fas fa-user-edit"></i></button> -->
                            <button class="btn btn-danger shadow-sm" id="btn_delete" type="button"data-toggle="tooltip"
                            data-original-title="Xóa người dùng"><i class="fas fa-user-times"></i></button>
                            </div>
                            
                                <!-- <div class="col-md-2">
                                    <select class="form-control input-sm chzn-select" name="role"
                                        id="role">
                                        <option value=''>-- Quyền hiển thị --</option>
                                        @if(Auth::user()->role == 'ADMIN')
                                        <option value="ADMIN">Quản trị hệ thống - CEO</option>
                                        @endif
                                        @if(Auth::user()->role == 'ADMIN' || Auth::user()->role == 'MANAGE')
                                        <option value="MANAGE">Trợ lý CEO</option>
                                        @endif
                                        @if(Auth::user()->role == 'ADMIN' || Auth::user()->role == 'MANAGE' || Auth::user()->role == 'CV_ADMIN')
                                        <option value="CV_ADMIN">Leader/TPKD/TPPT</option>
                                        @endif
                                        @if(Auth::user()->role == 'ADMIN' || Auth::user()->role == 'MANAGE' || Auth::user()->role == 'CV_ADMIN' || Auth::user()->role == 'CV_PRO' || Auth::user()->role == 'CV_BASIC')
                                        <option value="CV_PRO">Nhân sự Editor-Pro</option>
                                        <option value="CV_BASIC">Nhân sự Editor-Basic</option>
                                        @endif
                                        @if(Auth::user()->role == 'ADMIN' || Auth::user()->role == 'MANAGE' || Auth::user()->role == 'CV_ADMIN' || Auth::user()->role == 'CV_PRO' || Auth::user()->role == 'CV_BASIC' || Auth::user()->role == 'SALE_ADMIN')
                                        <option value="SALE_ADMIN">Sales Admin</option>
                                        @endif
                                        <option value="SALE_BASIC">Sales basic</option>
                                        <option value="USERS">Người dùng</option>
                                    </select>
                                </div> -->
                                <div class="input-group" style="width:40%;height:10%">
                                    <input id="search" name="search" type="text" class="form-control" placeholder="Tìm kiếm..." onkeydown="if (event.key == 'Enter'){JS_Client.search();return false;}">
                                </div>
                                <button style="width:5%" id="txt_search" name="txt_search" type="button" class="btn btn-dark"><i class="fas fa-search"></i></button>

                            </div>
                            <!-- Màn hình danh sách -->
                            <div class="row" id="table-container"></div>
                        </div>
                    </div>
                </section>
            </form>
        </div>
    </div>
    <div class="modal fade" id="editmodal" role="dialog"></div>
    <div class="modal " id="editPassmodal" role="dialog" style=" width: 100%;height: 100%;background: #0000007d; background-repeat:no-repeat;background-size: cover;"></div>
    <div class="modal " id="addfile" role="dialog"></div>

    <div id="dialogconfirm"></div>
    <script src='../assets/js/jquery.js'></script>
    <script type="text/javascript">
        var baseUrl = "{{ url('') }}";
        var JS_Client = new JS_Client(baseUrl, 'system', 'client');
        $(document).ready(function($) {
            JS_Client.loadIndex(baseUrl);
        })
    </script>
@endsection

