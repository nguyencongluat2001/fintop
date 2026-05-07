
<form id="frmVideo"  role="form" action="" method="GET" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="modal-dialog modal-xl">
        <div class="modal-content" style="background-color:#4e9e46">
            <div class="modal-header">
                <h5 class="modal-title" style="color:white">{{$data['name_handbook']}}</h5>
                <button style="background:white" type="button" class="btn btn-sm" data-bs-dismiss="modal">
                    X
                </button>
            </div>
            {!! $data['url_link'] !!}
            <div class="modal-footer">
                <button type="button" style="background:white" class="btn btn-default btn-sm" data-bs-dismiss="modal">
                    Đóng
                </button>
            </div>
        </div>
    </div>
</form>
