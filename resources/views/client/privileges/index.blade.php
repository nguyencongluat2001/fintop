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
<!-- PHẦN 4: BẢNG GIÁ HỘI VIÊN -->
    <section class="pricing-section" id="pricing">
        <h2 class="gradient-text" style="position: relative; z-index: 1;">Chọn Gói Hội Viên</h2>
        <p style="margin-top: 1rem; position: relative; z-index: 1;">Nâng cấp trải nghiệm đầu tư của bạn ngay hôm nay
        </p>

        <div class="pricing-grid">
            <!-- GÓI STANDARD - Xanh lam -->
            <div class="pricing-card liquid-glass-card card-standard">
                <div class="pricing-title">STANDARD</div>
                <div class="pricing-subtitle" style="color: #7dd3fc;">(Tiêu chuẩn)</div>
                <ul class="pricing-features">
                    <li><span class="check-icon">✦</span> Tra cứu CP</li>
                    <li><span class="check-icon">✦</span> Báo cáo phân tích</li>
                    <li><span class="check-icon">✦</span> Tool & Dữ liệu cơ bản</li>
                </ul>
                <button class="btn-tier" onclick="JS_UpgradeAcc.viewInfo('TIEU_CHUAN')">Đăng ký</button>
            </div>

            <!-- GÓI PRO - Tím -->
            <div class="pricing-card liquid-glass-card card-pro">
                <div class="pricing-title">PRO ⭐</div>
                <div class="pricing-subtitle" style="color: #c4b5fd;">(Chuyên nghiệp)</div>
                <ul class="pricing-features">
                    <li><span class="check-icon">✦</span> Bộ Lọc CP</li>
                    <li><span class="check-icon">✦</span> Pro Analysis</li>
                    <li><span class="check-icon">✦</span> Pro Data</li>
                </ul>
                <button class="btn-tier">Đăng ký</button>
            </div>

            <!-- GÓI V.I.P - Xanh ngọc -->
            <div class="pricing-card liquid-glass-card card-vip">
                <div class="pricing-title">V.I.P</div>
                <div class="pricing-subtitle" style="color: #6ee7b7;">(Nâng cao)</div>
                <ul class="pricing-features">
                    <li><span class="check-icon">✦</span> Đặc quyền PRO</li>
                    <li><span class="check-icon">✦</span> Kết nối Chuyên gia</li>
                    <li><span class="check-icon">✦</span> Phân tích Chuyên gia</li>
                </ul>
                <button class="btn-tier">Đăng ký</button>
            </div>

            <!-- GÓI DIAMOND - Vàng -->
            <div class="pricing-card liquid-glass-card card-diamond">
                <div class="pricing-title">DIAMOND 💎</div>
                <div class="pricing-subtitle" style="color: #fcd34d;">(Kim cương)</div>
                <ul class="pricing-features">
                    <li><span class="check-icon">✦</span> Đặc quyền V.I.P</li>
                    <li><span class="check-icon">✦</span> Đặc quyền PRO</li>
                    <li><span class="check-icon">✦</span> Cố vấn 1-1 Chuyên gia</li>
                </ul>
                <button class="btn-tier">Đăng ký</button>
            </div>
        </div>
    </section>
<script src="{{ asset('clients/js/jquery.min.js') }}"></script>
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