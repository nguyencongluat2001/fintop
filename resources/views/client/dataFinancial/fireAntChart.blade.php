<style>
    .animate-charcter
    {
    text-transform: uppercase;
    background-image: linear-gradient(
        -225deg,
        #231557 0%,
        #44107a 29%,
        #ff1361 67%,
        #231557 100%
    );
    background-size: auto auto;
    background-clip: border-box;
    background-size: 200% auto;
    color: #fff;
    background-clip: text;
    text-fill-color: transparent;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    animation: textclip 2s linear infinite;
    display: inline-block;
    }

    @keyframes textclip {
    to {
        background-position: 200% center;
    }
}
</style>
<form id="frmVideo"  role="form" action="" method="GET" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            {{--
            <div class="modal-header" style="background:#a71712cc">
                <h5 class="modal-title" style="color:white">CHI TIẾT CỔ PHIẾU </h5>
                <button style="background:white" type="button" class="btn btn-sm" data-bs-dismiss="modal">
                    X
                </button>

            </div>
            <section class="container">
                <div class="home_index_vnindex" > 
                <h2 style="border-radius:5px" class="h5 py-2">Thông tin cổ phiếu</h2>
                    <div class="home_index_child py-2" style="background:#ff00000d;border-radius:5px">
                        <div class="col-md-6" >
                            <div class="scrollbar" id="style-1" style="padding-right:10px">
                                <div class="card-body pt-4 p-3" >
                                    <ul class="list-group">
                                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg" style="background: #e7eefe3b;">
                                            <div class="d-flex align-items-center">
                                            <!-- <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-arrow-up"></i></button> -->
                                                <div class="d-flex flex-column">
                                                    <h6 class="mb-1 text-dark text-sm">Mã cổ phiếu</h6>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold animate-charcter-penTable">
                                            VNINDEX
                                            </div>
                                        </li>
                                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg" style="background: #e7eefe3b;">
                                            <div class="d-flex align-items-center">
                                            <!-- <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-arrow-up"></i></button> -->
                                                <div class="d-flex flex-column">
                                                    <h6 class="mb-1 text-dark text-sm">Tổng khối lượng</h6>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold animate-charcter-penTable">
                                            725827200
                                            </div>
                                        </li>
                                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg" style="background: #e7eefe3b;">
                                            <div class="d-flex align-items-center">
                                            <!-- <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-arrow-up"></i></button> -->
                                                <div class="d-flex flex-column">
                                                    <h6 class="mb-1 text-dark text-sm">Khối lượng</h6>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold animate-charcter-penTable">
                                            688543798
                                            </div>
                                        </li>
                                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg" style="background: #e7eefe3b;">
                                            <div class="d-flex align-items-center">
                                            <!-- <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-arrow-up"></i></button> -->
                                                <div class="d-flex flex-column">
                                                    <h6 class="mb-1 text-dark text-sm">Chỉ số mở</h6>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold animate-charcter-penTable">
                                            1057.7
                                            </div>
                                        </li>
                                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg" style="background: #e7eefe3b;">
                                            <div class="d-flex align-items-center">
                                            <!-- <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-arrow-up"></i></button> -->
                                                <div class="d-flex flex-column">
                                                    <h6 class="mb-1 text-dark text-sm">Chỉ số đóng</h6>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold animate-charcter-penTable">
                                            1066.9
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6" >
                            <div class="scrollbar" id="style-1" style="padding-right:10px">
                                <div class="card-body pt-4 p-3" >
                                    <ul class="list-group">
                                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg" style="background: #e7eefe3b;">
                                            <div class="d-flex align-items-center">
                                            <!-- <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-arrow-up"></i></button> -->
                                                <div class="d-flex flex-column">
                                                    <h6 class="mb-1 text-dark text-sm">Chỉ số cao</h6>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold animate-charcter-penTable">
                                            1066.9
                                            </div>
                                        </li>
                                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg" style="background: #e7eefe3b;">
                                            <div class="d-flex align-items-center">
                                            <!-- <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-arrow-up"></i></button> -->
                                                <div class="d-flex flex-column">
                                                    <h6 class="mb-1 text-dark text-sm">Chỉ số thấp</h6>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold animate-charcter-penTable">
                                            1053.97
                                            </div>
                                        </li>
                                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg" style="background: #e7eefe3b;">
                                            <div class="d-flex align-items-center">
                                            <!-- <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-arrow-up"></i></button> -->
                                                <div class="d-flex flex-column">
                                                    <h6 class="mb-1 text-dark text-sm">Chỉ số mở</h6>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold animate-charcter-penTable">
                                            1066.9
                                            </div>
                                        </li>
                                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg" style="background: #e7eefe3b;">
                                            <div class="d-flex align-items-center">
                                            <!-- <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-arrow-up"></i></button> -->
                                                <div class="d-flex flex-column">
                                                    <h6 class="mb-1 text-dark text-sm">Chỉ số trung bình</h6>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold animate-charcter-penTable">
                                            1066.9
                                            </div>
                                        </li>
                                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg" style="background: #e7eefe3b;">
                                            <div class="d-flex align-items-center">
                                            <!-- <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-arrow-up"></i></button> -->
                                                <div class="d-flex flex-column">
                                                    <h6 class="mb-1 text-dark text-sm">Chỉ số cơ bản</h6>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold animate-charcter-penTable">
                                            1057.12
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="container">
                <div style="height:1px;background:black"></div>
            </section>
            <section class="container">
                <div class="home_index_vnindex" > 
                    <div class="home_index_child py-2">
                        <div class="col-md-12" >
                            <h2 style="border-radius:5px" class="h5 py-2">Biểu đồ fireant</h2>
                            <div class="row form-group" id="div_hinhthucgiai">
                                <label class="col-md-2 control-label required">Nguồn theo: <a href="https://fireant.vn/charts"></i>
                                        <div class="animate-charcter">
                                            FireAnt
                                        </div>
                                    </a></label>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <iframe height="620" src="https://fireant.vn/dashboard" 
                frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                allowfullscreen>
            </iframe>
            <div class="modal-body" style="padding:15px">
            <div style="height:1px;background:black;paddinh-top:5px"></div>

                <section class="container">
                    <div class="home_index_vnindex" > 
                    <h2 style="border-radius:5px" class="h5 py-2">Giao dịch khớp lệnh</h2>
                        <div class="home_index_child py-2">
                            <div class="col-md-6" >
                                <h2 style="background:#dbffce;color:#228100;border-radius:5px" class="h6 py-2">Tổng dư mua</h2>
                                <div class="scrollbar" id="style-1" style="padding-right:10px">
                                    <div class="card-body pt-4 p-3" >
                                        <ul class="list-group">
                                                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg" style="background: #e7eefe3b;">
                                                    <div class="d-flex align-items-center">
                                                    <!-- <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-arrow-up"></i></button> -->
                                                        <div class="d-flex flex-column">
                                                            <h6 class="mb-1 text-dark text-sm">10.000</h6>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold animate-charcter-penTable">
                                                    38.2
                                                    </div>
                                                </li>
                                                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg" style="background: #e7eefe3b;">
                                                    <div class="d-flex align-items-center">
                                                    <!-- <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-arrow-up"></i></button> -->
                                                        <div class="d-flex flex-column">
                                                            <h6 class="mb-1 text-dark text-sm">10.000</h6>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold animate-charcter-penTable">
                                                    38.2
                                                    </div>
                                                </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6" style="padding-left:10px">
                                <h2 style="background:#f9d7d7;color:red;border-radius:5px" class="h6 py-2">Tổng dư bán</h2>
                                <div class="scrollbar" id="style-1" style="padding-right:10px">
                                        <div class="card-body pt-4 p-3" >
                                            <ul class="list-group">
                                                    <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg" style="background: #e7eefe3b;">
                                                        <div class="d-flex align-items-center">
                                                        <!-- <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-arrow-up"></i></button> -->
                                                            <div class="d-flex flex-column">
                                                                <h6 class="mb-1 text-dark text-sm">24</h6>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold animate-charcter-penTable">
                                                        8.9000
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg" style="background: #e7eefe3b;">
                                                        <div class="d-flex align-items-center">
                                                        <!-- <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-arrow-up"></i></button> -->
                                                            <div class="d-flex flex-column">
                                                                <h6 class="mb-1 text-dark text-sm">10.000</h6>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold animate-charcter-penTable">
                                                        38.2
                                                        </div>
                                                    </li>
                                            </ul>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            --}}
            <div class="modal-footer" style="background:#a71712cc">
                    <button style="background:white" type="button" class="btn btn-default btn-sm" data-bs-dismiss="modal">
                        Đóng
                    </button>
                </div>
        </div>
    </div>
</form>
