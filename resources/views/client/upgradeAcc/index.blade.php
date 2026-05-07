@extends('client.layouts.index')
@section('body-client')
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
    <section class="bg-light pt-sm-0 py-5">
        <div style="background:#ffffff1f  !important;">
                <!-- <div class="col-lg-12" style="padding:10px;">
                    <div class="container my-4">
                        <div class="row text-center">
                            <div class="objective col-lg-4" >
                                <div style="background:#001f39;padding:15px;width:100%;height:100%;border-radius:5px">
                                    <div class="objective-icon m-auto py-4 mb-2 mb-sm-4 shadow-lg">
                                    <i class="pricing-table-icon display-3 bx bx-package text-light text-secondary"></i>
                                    </div>
                                    <h2 class="objective-heading h3 mb-2 mb-sm-4"><i class="fas fa-tags" style="color:#ffc500"></i> Hội viên tiêu chuẩn</h2>
                                    <p>$0/Year</p>
                                    <ul class="pricing-table-body text-start text-dark px-4 list-unstyled">
                                        <li><i class="bx bxs-circle me-2"></i>Tra cứu cổ phiếu</li>
                                        <li><i class="bx bxs-circle me-2"></i>Phân tích đầu tư cơ bản</li>
                                        <li><i class="bx bxs-circle me-2"></i>Tham gia Cộng đồng chia sẻ đầu tư FinTop</li>
                                        <li><i class="bx bxs-circle me-2"></i>Tài liệu, cẩm nang hướng dẫn đầu tư</li>
                                    </ul>
                                    <div class="pricing-table-footer pt-5 pb-2">
                                        <a href="#" class="btn rounded-pill px-4 btn-outline-light" style="background:#00a313;color:#000000">Đang sử dụng</a>
                                    </div>
                                </div>
                            </div>
                            <div class="objective col-lg-4 mt-sm-0 mt-4" >
                                <div style="background:#001f39;padding:15px;width:100%;height:100%;border-radius:5px">
                                    <div class="objective-icon m-auto py-4 mb-2 mb-sm-4 shadow-lg">
                                        <i class="pricing-table-icon display-3 bx bx-package text-light text-secondary"></i>
                                    </div>
                                    <h2 class="objective-heading h3 mb-2 mb-sm-4"><i class="fas fa-tags" style="color:#ffc500"></i> Hội viên VIP 1 (Bạc)</h2>
                                    <p>$120/Year</p>
                                    <ul class="pricing-table-list text-start text-dark px-4 list-unstyled">
                                        <li><i class="bx bxs-circle me-2"></i>Tra cứu cổ phiếu</li>
                                        <li><i class="bx bxs-circle me-2"></i>Phân tích đầu tư cơ bản</li>
                                        <li><i class="bx bxs-circle me-2"></i>Tham gia Cộng đồng chia sẻ đầu tư FinTop</li>
                                        <li><i class="bx bxs-circle me-2"></i>Tài liệu, cẩm nang hướng dẫn đầu tư</li>
                                        <li><i class="bx bxs-circle me-2"></i>Tín hiệu mua FinTop</li>
                                        <li><i class="bx bxs-circle me-2"></i>Phân tích đầu tư V.I.P</li>
                                        <li><i class="bx bxs-circle me-2"></i>Danh mục đầu tư V.I.P FinTop</li>
                                    </ul>
                                    <div class="pricing-table-footer pt-5 pb-2">
                                        <a onclick="JS_UpgradeAcc.viewForm()" class="btn rounded-pill px-4 btn-outline-light" style="background:#00a313;color:#007b14;animation: lights 2s 750ms linear infinite;">Đăng ký</a>
                                    </div>
                                </div>
                            </div>
                            <div class="objective col-lg-4 mt-sm-0 mt-4">
                                <div style="background:#001f39;padding:15px;width:100%;height:100%;border-radius:5px">
                                    <div class="objective-icon m-auto py-4 mb-2 mb-sm-4 shadow-lg">
                                    <i class="pricing-table-icon display-3 bx bx-package text-light text-secondary"></i>

                                </div>
                                    <h2 class="objective-heading h3 mb-2 mb-sm-4"><i class="fas fa-tags" style="color:#ffc500"></i> Hội viên VIP 2 (Vàng)</h2>
                                    <p>$320/Year</p>
                                    <ul class="pricing-table-list text-start text-dark px-4 list-unstyled">
                                        <li><i class="bx bxs-circle me-2"></i>Tra cứu cổ phiếu</li>
                                        <li><i class="bx bxs-circle me-2"></i>Phân tích đầu tư cơ bản</li>
                                        <li><i class="bx bxs-circle me-2"></i>Tham gia Cộng đồng chia sẻ đầu tư FinTop</li>
                                        <li><i class="bx bxs-circle me-2"></i>Tài liệu, cẩm nang hướng dẫn đầu tư</li>
                                        <li><i class="bx bxs-circle me-2"></i>Tín hiệu mua FinTop</li>
                                        <li><i class="bx bxs-circle me-2"></i>Phân tích đầu tư V.I.P</li>
                                        <li><i class="bx bxs-circle me-2"></i>Danh mục đầu tư V.I.P FinTop</li>
                                        <li><i class="bx bxs-circle me-2"></i>Khuyến nghị đầu tư V.I.P FinTop</li>
                                    </ul>
                                    <div class="pricing-table-footer pt-5 pb-2">
                                        <a class="btn rounded-pill px-4 btn-outline-light" style="background:#00a313;color:#007b14;animation: lights 2s 750ms linear infinite;">Đăng ký</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        <div class="container">

            <h1 class="h2 text-center pt-3">Nâng cấp tài khoản</h1>
            <p class="text-center">Đăng ký nâng cấp tài khoản, mở chức năng tiêu chuẩn của hội viên vip.</p>

            <!-- Start Pricing Horizontal -->
            <div class="pricing-horizontal row col-10 m-auto d-flex shadow-sm rounded overflow-hidden bg-white">
                <div class="pricing-horizontal-icon col-md-3 text-center bg-secondary text-info py-4">
                    <i class="display-1 bx bx-package pt-4"></i>
                    <h5 class="h5 pb-4">Hội viên tiêu chuẩn</h5>
                </div>
                <div class="pricing-horizontal-body text-light col-md-6 col-lg-5 d-flex align-items-center pb-4 pt-4">
                    <ul class="text-left list-unstyled mb-0">
                    <li><i class="bx bxs-circle me-2"></i>Tra cứu cổ phiếu</li>
                    <li><i class="bx bxs-circle me-2"></i>Phân tích đầu tư cơ bản</li>
                    <li><i class="bx bxs-circle me-2"></i>Tham gia Cộng đồng chia sẻ đầu tư FinTop</li>
                    <li><i class="bx bxs-circle me-2"></i>Tài liệu, cẩm nang hướng dẫn đầu tư</li>
                    </ul>
                </div>
                <div class="pricing-horizontal-tag col-md-3 text-center pt-3 d-flex align-items-center">
                    <div class="w-100">
                        <p class="text-light">$0</p>
                        <div class="w-100">
                        @if(Auth::check())
                            <p class="text-light">$120/Year</p>
                            <a class="btn rounded-pill px-4 btn-outline-light mb-3" style="color: #ffba01;">Đang sử dụng</a>
                        @else
                            <p class="text-light">$120/Year</p>
                            <a href="{{ url('login') }}" class="btn rounded-pill px-4 btn-outline-light mb-3" style="color: #ffba01;">Đăng nhập</a>
                        @endif
                    </div>
                    </div>
                </div>
            </div>
            <!-- End Pricing Horizontal -->

            <!-- Start Pricing Horizontal -->
            <div class="pricing-horizontal row col-10 m-auto d-flex shadow-sm rounded overflow-hidden my-5 bg-white">
                <div class="pricing-horizontal-icon col-md-3 text-center bg-secondary text-light py-4">
                    <i class="display-1 bx bx-package pt-4"></i>
                    <h5 class="h5 pb-4">Hội viên VIP 1 (Bạc)</h5>
                </div>
                <div class="pricing-horizontal-body col-md-6 text-light col-lg-5 d-flex align-items-center pt-4 pb-4">
                    <ul class="text-left list-unstyled mb-0">
                        <li><i class="bx bxs-circle me-2"></i>Tra cứu cổ phiếu</li>
                        <li><i class="bx bxs-circle me-2"></i>Phân tích đầu tư cơ bản</li>
                        <li><i class="bx bxs-circle me-2"></i>Tham gia Cộng đồng chia sẻ đầu tư FinTop</li>
                        <li><i class="bx bxs-circle me-2"></i>Tài liệu, cẩm nang hướng dẫn đầu tư</li>
                        <li><i class="bx bxs-circle me-2"></i>Tín hiệu mua FinTop</li>
                        <li><i class="bx bxs-circle me-2"></i>Phân tích đầu tư V.I.P</li>
                        <li><i class="bx bxs-circle me-2"></i>Danh mục đầu tư V.I.P FinTop</li>
                    </ul>
                </div>
                <div class="pricing-horizontal-tag col-md-3 text-center pt-3 d-flex align-items-center">
                    <div class="w-100">
                        @if($type_vip == 'VIP1')
                            <p class="text-light">$120/Year</p>
                            <a class="btn rounded-pill px-4 btn-outline-light mb-3" style="color: #ffba01;">Đang sử dụng</a>
                        @else
                            <p class="text-light">$120/Year</p>
                            <a onclick="JS_UpgradeAcc.viewForm('VIP1')" class="btn rounded-pill px-4 btn-outline-light mb-3" style="color: #ffba01;">Nâng cấp</a>
                        @endif
                    </div>
                </div>
            </div>
            <!-- End Pricing Horizontal -->

            <!-- Start Pricing Horizontal -->
            <div class="pricing-horizontal row col-10 m-auto d-flex shadow-sm rounded overflow-hidden bg-white">
                <div class="pricing-horizontal-icon col-md-3 text-center bg-secondary text-warning py-4">
                    <i class="display-1 bx bx-package pt-4"></i>
                    <h5 class="h5 pb-4">Hội viên VIP 2 (Vàng)</h5>
                </div>
                <div class="pricing-horizontal-body col-md-6 text-light col-lg-5 d-flex align-items-center pt-4 pb-4">
                    <ul class="text-left list-unstyled mb-0">
                        <li><i class="bx bxs-circle me-2"></i>Tra cứu cổ phiếu</li>
                        <li><i class="bx bxs-circle me-2"></i>Phân tích đầu tư cơ bản</li>
                        <li><i class="bx bxs-circle me-2"></i>Tham gia Cộng đồng chia sẻ đầu tư FinTop</li>
                        <li><i class="bx bxs-circle me-2"></i>Tài liệu, cẩm nang hướng dẫn đầu tư</li>
                        <li><i class="bx bxs-circle me-2"></i>Tín hiệu mua FinTop</li>
                        <li><i class="bx bxs-circle me-2"></i>Phân tích đầu tư V.I.P</li>
                        <li><i class="bx bxs-circle me-2"></i>Danh mục đầu tư V.I.P FinTop</li>
                        <li><i class="bx bxs-circle me-2"></i>Khuyến nghị đầu tư V.I.P FinTop</li>
                    </ul>
                </div>
                <div class="pricing-horizontal-tag col-md-3 text-center pt-3 d-flex align-items-center">
                    <div class="w-100">
                        @if($type_vip == 'VIP2')
                            <p class="text-light">$840/Year</p>
                            <a class="btn rounded-pill px-4 btn-outline-light mb-3" style="color: #ffba01;">Đang sử dụng</a>
                        @else
                            <p class="text-light">$840/Year</p>
                            <a onclick="JS_UpgradeAcc.viewForm('VIP2')" class="btn rounded-pill px-4 btn-outline-light mb-3" style="color: #ffba01;">Nâng cấp</a>
                        @endif
                    </div>
                </div>
            </div>
            <!-- End Pricing Horizontal -->
        </div>
    </section>
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
@endsection