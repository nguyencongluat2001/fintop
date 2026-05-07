
<form id="frmVideo"  role="form" action="" method="GET" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header" style="background:#299c03cc">
                <h5 class="modal-title" style="color:white">Ghi chú xếp hạng </h5>
                <button style="background:white" type="button" class="btn btn-sm" data-bs-dismiss="modal">
                    X
                </button>
            </div>
            <section class="container">
                <div class="home_index_vnindex" > 
                    <div class="home_index_child py-2">
                        <div class="col-md-12" >
                           <img  style="width:100%;" src="../clients/img/noteDataFintop.png" alt="Card image">
                        </div>
                    </div>
                </div>
            </section>
            <div class="modal-footer">
                <button style="background:white" type="button" class="btn btn-default btn-sm" data-bs-dismiss="modal">
                    Đóng
                </button>
            </div>
        </div>
    </div>
</form>
