@extends('dashboard.layouts.index')
@section('body')
<script type="text/javascript" src="{{ URL::asset('dist\js\backend\pages\JS_BackupData.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('dist\js\backend\pages\JS_System_Security.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<div class="container-fluid">
    <div class="row">
        <form action="" method="POST" id="frmBackupData_index">
            <input style="display:none" type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
            <section class="content-wrapper">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row form-group">
                            <div class="col-md-12">
                                <button class="btn btn-primary shadow-sm" id="btn_sql" type="button">Xuất SQL</button>
                                <button class="btn btn-success shadow-sm" id="btn_excel" type="button">Xuất EXCEL</button>
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

<script src='../assets/js/jquery.js'></script>
<script type="text/javascript">
    var baseUrl = "{{ url('') }}";
    var JS_BackupData = new JS_BackupData(baseUrl, 'system', 'backupdata');
    $(document).ready(function($) {
        JS_BackupData.loadIndex(baseUrl);
    })
</script>
@endsection