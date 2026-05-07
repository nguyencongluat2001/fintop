@extends('client.layouts.index')
@section('body-client')
<title>ĐẶC QUYỀN HỘI VIÊN</title>
<style>
    .img-fluid{
        max-width: 70%;
        margin-left: 15%;
    }
    .name_cg{
        font-weight:600;
        font-size:16px;
    }
    .table{
        border-color: #990000;
    }
</style>
<section class="container">
    <div class=" pb-3 d-lg-flex gx-5">
    <div class="col-lg-12">
        <form action="" method="GET" id="frmLoadlist_signal">
            <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
            <div class="home_index_vnindex pt-1 pb-3" style="background:#ffffff91 !important;border-radius:0px !important">
            <!-- Start pricing -->
            <div class="home_index_child" style="background:#700e13  !important;">
                <div class="container-lg py-5 form-dangky-vip">
                    <div class="col-md-12 m-auto text-center py-2">
                        <h1 class="h5" style="color:#fff079">ĐĂNG KÝ TÀI KHOẢN HỘI VIÊN FINTOP</h1>
                        <p class="pricing-footer" style="color:#ffffff">
                        "FinTop, kiến tạo danh mục đầu tư bền vững".
                        </p>
                    </div>
                    <div class="row px-lg-3">
                        <div class="col-md-3 pt-sm-0 pt-3 px-xl-3 dangky-hoivien">
                            <div class="pricing-table card h-100 card-rounded shadow-sm border-0" style="background:">
                                <div class="pricing-table-body card-body text-center">
                                    <div class="bg-secondary" style="border-radius: 0.5em;">
                                        <i style="color:#7ff3ff" class="pricing-table-icon display-3 bx bx-package py-3"></i>
                                        <h2 class="pricing-table-heading h5 semi-bold-600" style="color:white"><div class="txt-first">HỘI VIÊN</div> <div class="txt-second">TIÊU CHUẨN</div></h2>
                                        <br>
                                    </div>
                                    <div class="pricing-table-footer pt-2">
                                        <a style="background: #165c38;color: #ffffff;font-weight: 500;" onclick="JS_UpgradeAcc.viewInfo('TIEU_CHUAN')" class="btn rounded-pill px-4 btn-outline-light light-300">Chọn</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 pt-sm-0 pt-3 px-xl-3 dangky-hoivien">
                            <div class="pricing-table card h-100 card-rounded shadow-sm border-0" style="background:">
                                <div class="pricing-table-body card-body text-center">
                                    <div class="bg-secondary" style="border-radius: 0.5em;">
                                        <i style="color:#f2f2f2 !important"  class="pricing-table-icon display-3 bx bx-package py-3"></i>
                                        <h2 class="pricing-table-heading h5 semi-bold-600" style="color:white"><div class="txt-first">HỘI VIÊN</div><div class="txt-second">BẠC</div></h2>
                                        <br>
                                    </div>
                                    <div class="pricing-table-footer pt-2">
                                        <a style="background: #165c38;color: #ffffff;font-weight: 500;" onclick="JS_UpgradeAcc.viewInfo('VIP1')" class="btn rounded-pill px-4 btn-outline-light light-300">Chọn</a>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-3 pt-sm-0 pt-3 px-xl-3 dangky-hoivien">
                            <div class="pricing-table card h-100 card-rounded shadow-sm border-0" style="background:">
                                <div class="pricing-table-body card-body text-center">
                                     <div class="bg-secondary" style="border-radius: 0.5em;">
                                        <i style="color:#ffbb2e !important" class="pricing-table-icon display-3 bx bx-package py-3"></i>
                                        <h2 class="pricing-table-heading h5 semi-bold-600" style="color:white"><div class="txt-first">HỘI VIÊN</div><div class="txt-second">VÀNG</div></h2>
                                        <br>
                                    </div>
                                    <div class="pricing-table-footer pt-2">
                                        <a style="background: #165c38;color: #ffffff;font-weight: 500;" onclick="JS_UpgradeAcc.viewInfo('VIP2')" class="btn rounded-pill px-4 btn-outline-light light-300">Chọn</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 pt-sm-0 pt-3 px-xl-3 dangky-hoivien">
                            <div class="pricing-table card h-100 card-rounded shadow-sm border-0" style="background:">
                                <div class="pricing-table-body card-body text-center">
                                    <!-- <i class="pricing-table-icon display-3 bx bx-package  py-3"></i> -->
                                    <div class="bg-secondary" style="border-radius: 0.5em;">
                                        <div class="py-3">
                                        <img   src="{{url('/clients/img/diamond.png')}}" alt="Image" style="height: 65px;width: 65px;">

                                        </div>
                                        <h2 class="pricing-table-heading h5 semi-bold-600" style="color:white"><div class="txt-first">HỘI VIÊN</div><div class="txt-second">KIM CƯƠNG</div></h2>
                                        <br>
                                    </div>
                                    <div class="pricing-table-footer pt-2">
                                        <a style="background: #165c38;color: #ffffff;font-weight: 500;" onclick="JS_UpgradeAcc.viewInfo('KIM_CUONG')" class="btn rounded-pill px-4 btn-outline-light light-300">Chọn</a>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <!-- End Content -->
                <!-- phần giới thiệu FIn top -->
                <div class="home_index_child" style="background:#700e13 !important;">
                    <div class="col-lg-12" style="padding:10px;">
                        <div class="row d-flex align-items-center">
                            <div class="col-lg-12 text-center">
                                <br>
                                <h1 class="h5" style="color:#fff079">ĐẶC QUYỀN HỘI VIÊN</h1>
                                <br>
                            </div>
                          
                            <div class=" privileges-table table-responsive pmd-card pmd-z-depth " >
                                <table id="table-data" class="table table-bordered table-striped table-condensed dataTable no-footer">
                                <colgroup>
                                    <col width="5%">
                                    <col width="35%">
                                    <col width="15%">
                                    <col width="15%">
                                    <col width="15%">
                                    <col width="15%">
                                </colgroup>
                                    <thead>
                                        <tr style="background: white;">
                                            <td align="center"><b>STT</b></td>
                                            <td align="center"><b>ĐẶC QUYỀN HỘI VIÊN</b></td>
                                            <td style="background:#44c333" align="center"><b>TIÊU CHUẨN</b></td>
                                            <td style="background:#d1d1d1" align="center"><b>BẠC</b></td>
                                            <td style="background:#ffd404" align="center"><b>VÀNG</b></td>
                                            <td style="background:black;color:white" align="center"><b>KIM CƯƠNG</b></td>
                                        </tr>
                                    </thead>
                                    <tbody style="background:#ffffff !important;">
                                        
                                            <tr>
                                                <td style=""align="center">1</td>
                                                <td style="">Tra cứu cổ phiếu</td>
                                                <td style="background:#bbf4b3;"align="center"><i class="fas fa-check"></i></td>
                                                <td style="background:#bbf4b3;"align="center"><i class="fas fa-check"></i></td>
                                                <td style="background:#bbf4b3;"align="center"><i class="fas fa-check"></i></td>
                                                <td style="background:#bbf4b3;"align="center"><i class="fas fa-check"></i></td>
                                            </tr>
                                            <tr>
                                                <td style=""align="center">2</td>
                                                <td style="">Phân tích đầu tư cơ bản</td>
                                                <td style="background:#bbf4b3;"align="center"><i class="fas fa-check"></i></td>
                                                <td style="background:#bbf4b3;"align="center"><i class="fas fa-check"></i></td>
                                                <td style="background:#bbf4b3;"align="center"><i class="fas fa-check"></i></td>
                                                <td style="background:#bbf4b3;"align="center"><i class="fas fa-check"></i></td>
                                            </tr>
                                            <tr>
                                                <td style=""align="center">3</td>
                                                <td style="">Nhóm Zalo phân tích chiến lược đầu tư</td>
                                                <td style="background:#bbf4b3;"align="center"><i class="fas fa-check"></i></td>
                                                <td style="background:#bbf4b3;"align="center"><i class="fas fa-check"></i></td>
                                                <td style="background:#bbf4b3;"align="center"><i class="fas fa-check"></i></td>
                                                <td style="background:#bbf4b3;"align="center"><i class="fas fa-check"></i></td>
                                            </tr>
                                            <tr>
                                                <td style=""align="center">4</td>
                                                <td style="">Tài liệu, cẩm nang hướng dẫn đầu tư</td>
                                                <td style="background:#bbf4b3;"align="center"><i class="fas fa-check"></i></td>
                                                <td style="background:#bbf4b3;"align="center"><i class="fas fa-check"></i></td>
                                                <td style="background:#bbf4b3;"align="center"><i class="fas fa-check"></i></td>
                                                <td style="background:#bbf4b3;"align="center"><i class="fas fa-check"></i></td>
                                            </tr>
                                            <tr>
                                                <td style=""align="center">5</td>
                                                <td style="font-weight: 700;">Tín hiệu mua FinTop</td>
                                                <td style="color:red;font-weight: 700;"align="center">X</td>
                                                <td style="background:#5bc74d;font-weight: 700;"align="center"><i class="fas fa-check"></i></td>
                                                <td style="background:#5bc74d;font-weight: 700;"align="center"><i class="fas fa-check"></i></td>
                                                <td style="background:#5bc74d;font-weight: 700;"align="center"><i class="fas fa-check"></i></td>
                                            </tr>
                                            <tr>
                                                <td style=""align="center">6</td>
                                                <td style="font-weight: 700;">Phân tích đầu tư V.I.P</td>
                                                <td style="color:red;font-weight: 700;"align="center">X</td>
                                                <td style="background:#5bc74d;font-weight: 700;"align="center"><i class="fas fa-check"></i></td>
                                                <td style="background:#5bc74d;font-weight: 700;"align="center"><i class="fas fa-check"></i></td>
                                                <td style="background:#5bc74d;font-weight: 700;"align="center"><i class="fas fa-check"></i></td>
                                            </tr>
                                            <tr>
                                                <td style=""align="center">7</td>
                                                <td style="font-weight: 700;">Danh mục đầu tư V.I.P FinTop</td>
                                                <td style="color:red;font-weight: 700;"align="center">X</td>
                                                <td style="color:red;font-weight: 700;"align="center">X</td>
                                                <!-- <td style="background:#5bc74d;font-weight: 700;"align="center"><i class="fas fa-check"></i></td> -->
                                                <td style="background:#0c7600;color:#fffe0f;font-weight: 700;"align="center"><i class="fas fa-check"></i></td>
                                                <td style="background:#0c7600;color:#fffe0f;font-weight: 700;"align="center"><i class="fas fa-check"></i></td>
                                            </tr>
                                            <tr>
                                                <td style=""align="center">8</td>
                                                <td style="font-weight: 700;">Khuyến nghị đầu tư V.I.P FinTop</td>
                                                <td style="color:red;font-weight: 700;"align="center">X</td>
                                                <td style="color:red;font-weight: 700;"align="center">X</td>
                                                <td style="background:#0c7600;color:#fffe0f;font-weight: 700;"align="center"><i class="fas fa-check"></i></td>
                                                <td style="background:#0c7600;color:#fffe0f;font-weight: 700;"align="center"><i class="fas fa-check"></i></td>
                                            </tr>
                                            <tr>
                                                <td style=""align="center">9</td>
                                                <td style="font-weight: 700;">Cố vấn 1-1 từ chuyên gia FinTop</td>
                                                <td style="color:red;font-weight: 700;"align="center">X</td>
                                                <td style="color:red;font-weight: 700;"align="center">X</td>
                                                <td style="color:red;font-weight: 700;"align="center">X</td>
                                                <td style="background:#0c7600;color:#fffe0f;font-weight: 700;"align="center"><i class="fas fa-check"></i></td>
                                            </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<script src="../clients/js/jquery.min.js"></script>
<div class="modal" id="formmodal" role="dialog"></div>
<div class="modal" id="formmodal_res" role="dialog"></div>
<script type="text/javascript" src="{{ URL::asset('dist\js\backend\client\JS_UpgradeAcc.js') }}"></script>
<script type="text/javascript">
    var baseUrl = '{{ url('') }}';
    var JS_UpgradeAcc = new JS_UpgradeAcc(baseUrl, 'client', 'upgradeAcc');
    $(document).ready(function($) {
        JS_UpgradeAcc.loadIndex(baseUrl);
    })
</script>

<script>
        NclLib.menuActive('.link-privileges');
        NclLib.loadding();
</script>
@endsection