@extends('dashboard.layouts.index')
@section('css')
<style>
    #txt_search {
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
    }
</style>
@endsection
@section('body')
<div class="container-fluid">
    <section class="content-wrapper">
        <form id="frmSignal_index">
            <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
            <div class="row">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-mua-tab" data-bs-toggle="tab" data-bs-target="#nav-mua" type="button" role="tab" aria-controls="nav-mua" aria-selected="true">Mua</button>
                        <button class="nav-link" id="nav-ban-tab" data-bs-toggle="tab" data-bs-target="#nav-ban" type="button" role="tab" aria-controls="nav-ban" aria-selected="false">Bán</button>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="my-3">
                        <div class="col-md-12 row">
                            <div class="col-md-3">
                                <select name="type" id="type" class="form-control chzn-select">
                                    <option value="">--Chọn loại tín hiệu--</option>
                                    <option value="MUA">Mua</option>
                                    <option value="BAN">Bán</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control datepicker" name="fromdate" id="fromdate" placeholder="Từ ngày">
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control datepicker" name="todate" id="todate" placeholder="Đến ngày">
                            </div>
                            <br>
                            <div class="col-md-5 row">
                                <div class="form-search form-group input-group mb-0">
                                    <input type="text" class="form-control" name="search" id="search" style="height:40px" placeholder="Từ khóa tìm kiếm..." onkeydown="if (event.key == 'Enter'){JS_Signal.search();return false;}">
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-dark mb-0" id="txt_search"><i class="fas fa-search"></i></button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mt-3">
                            <button type="button" class="btn btn-primary shadow-sm" id="btn_add"><i class="fas fa-plus"></i> Thêm</button>
                            <button type="button" class="btn btn-danger shadow-sm" id="btn_delete"><i class="fas fa-trash-alt"></i> Xóa</button>
                        </div>
                    </div>
                    <div class="tab-pane fade show active" id="nav-mua" role="tabpanel" aria-labelledby="nav-mua-tab" tabindex="0"></div>
                    <div class="tab-pane fade" id="nav-ban" role="tabpanel" aria-labelledby="nav-ban-tab" tabindex="0"></div>
                </div>
            </div>
        </form>
    </section>
</div>
<div class="modal fade" id="addmodal" data-backdrop="static" role="dialog"></div>
@section('js')
<script>
    $('.datepicker').datepicker({
        format: 'dd/mm/yyyy'
    });
</script>
<script src="{{URL::asset('dist/js/backend/pages/JS_Signal.js')}}"></script>
<script type="text/javascript">
    var baseUrl = "{{ url('') }}";
    var JS_Signal = new JS_Signal(baseUrl, 'system', 'signal');
    jQuery(document).ready(function($) {
        JS_Signal.loadIndex(baseUrl);
    })
</script>
@endsection
@endsection