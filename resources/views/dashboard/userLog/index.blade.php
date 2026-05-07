@extends('dashboard.layouts.index')
@section('css')
<style>
    #txt_search{
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;  
    }
</style>
@endsection
@section('body')
<div class="container-fluid">
    <section class="content-wrapper">
        <form id="frmUserLog_index">
            <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
            <div class="row">
                <div class="col-md-5 row">
                    <div class="form-search form-group input-group">
                        <input type="text" class="form-control" name="search" id="search" style="height:40px" placeholder="Từ khóa tìm kiếm..." onkeydown="if (event.key == 'Enter'){JS_UserLog.search();return false;}">
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-dark" id="txt_search"><i class="fas fa-search"></i></button>
                        </span>
                    </div>
                </div>
            </div>
            <div class="row" id="table-container" style="padding-top:10px"></div>
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
<script src="{{URL::asset('dist/js/backend/pages/JS_UserLog.js')}}"></script>
<script type="text/javascript">
    var baseUrl = "{{ url('') }}";
    var JS_UserLog = new JS_UserLog(baseUrl, 'system', 'userlog');
    jQuery(document).ready(function($) {
        JS_UserLog.loadIndex(baseUrl);
    })
</script>
@endsection
@endsection