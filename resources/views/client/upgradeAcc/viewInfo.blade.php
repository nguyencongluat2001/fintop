<style>
    .hiddel{
        display: none;
    }
    .show{
        display: block;
    }
	.form-control-label{
		font-size:16px !important;
	}
	..modal-header {
		display: inline;
	}
	.form-control:disabled{
		background-color:#ffffff
	}
	.label-upload {
		border: 1px solid #344767;
		color: #000 !important;
		padding: 0.5rem;
		border-radius: 0.5em;
		cursor: pointer;
	}
	.bg-white{
		width: 94%;
		background:#001f39 !important;
	}
</style>
<link rel="stylesheet" href="../clients/css/style.css">

<form id="frmAdd_updateAcc" role="form" action="" method="POST" enctype="multipart/form-data">
	@csrf
	<input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
	<input type="hidden" name="id" id="id" value="{{!empty($data['users']->id)?$data['users']->id:''}}">
	<div class="modal-dialog modal-lg" >
		<div class="modal-content card" style="background:#5b1313db">
			<div class="modal-header">
					<!-- <h5  style="width: 90%;" class="modal-title"></h5> -->
					<div class="col-md-11 m-auto text-center py-2" style="width: 95%;">
						<center>
						<div class="row" style="background: #031f38;font-size: 1.5rem;height: 70px;border-radius: 10px;padding-top:15px;padding-botton:10px">
						    <div class="col-md-1">
							</div>
						    <div class="col-md-10 text-center">
						       <h2 style="font-size:28px;color:#ffffff;">ĐẶC QUYỀN HỘI VIÊN</h2>
							</div>
							<div class="col-md-1">
									<!-- <i style="font-size:20px;color:#ffffff;" data-bs-dismiss="modal" class="fas fa-reply"></i> -->
									<button type="button" data-bs-dismiss="modal" class="btn btn-sm" style="background: #f1f2f2;height:35px">
								    <i class="fas fa-reply"></i>
							</button>
							</div>
						</div>
						</center>
					</div>
				
			</div>
			<br>
			@if($data['type_vip'] == 'TIEU_CHUAN')
			
			<div class="card-body">
				<div class="row">
					<div class="pricing-horizontal row col-12 m-auto d-flex shadow-sm rounded overflow-hidden bg-white">
						<div class="pricing-horizontal-icon col-md-4 text-center  text-info py-4">
							<i class="display-1 bx bx-package pt-4"></i>
							<h5 class="h5 pb-4">Hội viên tiêu chuẩn</h5>
						</div>
						<div class="pricing-horizontal-body col-md-8 text-light col-lg-7 d-flex align-items-center pt-4 pb-4">
							<ul class="text-left list-unstyled mb-0">
								<li><i class="bx bxs-circle me-2"></i>Tra cứu cổ phiếu</li>
								<li><i class="bx bxs-circle me-2"></i>Phân tích đầu tư cơ bản</li>
								<li><i class="bx bxs-circle me-2"></i>Tham gia Cộng đồng chia sẻ đầu tư FinTop</li>
								<li><i class="bx bxs-circle me-2"></i>Tài liệu, cẩm nang hướng dẫn đầu tư</li>
							</ul>
						</div>
					</div>
				    <div class="col-md-6">
						<!-- Start Pricing List -->
						<div class="pricing-list shadow-sm rounded-top rounded-3 py-sm-0">
							<div class="row p-2">
								<!-- <div class="pricing-list-icon col-3 text-center m-auto text-secondary ml-5 py-2">
									<i class="display-3 bx bx-package"></i>
								</div> -->
								<div class="pricing-list-body col-md-12 align-items-center pl-3">
									<ul class="list-unstyled text-center light-300" style="background: #001f39;border-radius: 0.5em;color:#ffffff">
									    <br>
										<li class="h5 semi-bold-600 mb-0">Bước 1</li>
										<br>
										<li style="font-family: math;    padding: 0 25px 25px 25px;">Đăng ký tài khoản hội viên FinTop.</li>
									</ul>
								</div>
								<div class="pricing-list-footer  text-center m-auto align-items-center">
									<br>
									<a href="register" class="btn rounded-pill px-4 btn-primary light-300" style="background:#165c38">ĐĂNG KÝ</a>
								</div>
							</div>
						</div>
						<!-- End Pricing List -->
					</div>
					<div class="col-md-6">
						<!-- Start Pricing List -->
						<div class="pricing-list shadow-sm rounded-top rounded-3 py-sm-0">
							<div class="row p-2">
								<!-- <div class="pricing-list-icon col-3 text-center m-auto text-secondary ml-5 py-2">
									<i class="display-3 bx bx-package"></i>
								</div> -->
								<div class="pricing-list-body col-md-12 align-items-center pl-3">
									<ul class="list-unstyled text-center light-300" style="background: #001f39;border-radius: 0.5em;color:#ffffff">
									    <br>
										<li class="h5 semi-bold-600 mb-0">Bước 2</li>
										<br>
										<li style="font-family: math;    padding: 0 25px 25px 25px;">Đăng nhập và truy cập miễn phí</li>
									</ul>
								</div>
								<div class="pricing-list-footer text-center m-auto align-items-center">
									<br>
									<a href="login" class="btn rounded-pill px-4 btn-primary light-300" style="background:#165c38">ĐĂNG NHẬP</a>
								</div>
							</div>
						</div>
						<!-- End Pricing List -->
					</div>
                </div>
				@endif
				@if($data['type_vip'] == 'VIP1')
				<div class="pricing-horizontal row col-12 m-auto d-flex shadow-sm rounded overflow-hidden bg-white" style="backgrouind:#001f39!important">
					<div class="pricing-horizontal-icon col-md-4 text-center  text-light py-4">
						<i class="display-1 bx bx-package pt-4"></i>
						<h5 class="h5 pb-4">Hội viên VIP 1 (Bạc)</h5>
					</div>
					<div class="pricing-horizontal-body col-md-8 text-light col-lg-7 d-flex align-items-center pt-4 pb-4">
						<ul class="text-left list-unstyled mb-0">
							<li><i class="bx bxs-circle me-2"></i>Tra cứu cổ phiếu</li>
							<li><i class="bx bxs-circle me-2"></i>Phân tích đầu tư cơ bản</li>
							<li><i class="bx bxs-circle me-2"></i>Tham gia Cộng đồng chia sẻ đầu tư FinTop</li>
							<li><i class="bx bxs-circle me-2"></i>Tài liệu, cẩm nang hướng dẫn đầu tư</li>
							<li style="font-weight: 700;"><i class="bx bxs-circle me-2"></i>Tín hiệu mua FinTop</li>
							<li style="font-weight: 700;"><i class="bx bxs-circle me-2"></i>Phân tích đầu tư V.I.P</li>
							<!-- <li style="font-weight: 700;"><i class="bx bxs-circle me-2"></i>Danh mục đầu tư V.I.P FinTop</li> -->
						</ul>
					</div>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-6">
							<!-- Start Pricing List -->
							<div class="pricing-list shadow-sm rounded-top rounded-3 py-sm-0">
								<div class="row p-2">
									<!-- <div class="pricing-list-icon col-3 text-center m-auto text-secondary ml-5 py-2">
										<i class="display-3 bx bx-package"></i>
									</div> -->
									<div class="pricing-list-body col-md-12 align-items-center pl-3">
										<ul class="list-unstyled text-center light-300" style="background: #001f39;border-radius: 0.5em;color:#ffffff">
										    <br>
											<li class="h5 semi-bold-600 mb-0">Phương thức 1:</li>
											<br>
											<li style="font-family: math;    padding: 0 25px 25px 25px;">Đăng ký tham gia gói thành viên <span style="color: #ffd400;font-weight: 600;">VIP1</span> sử dụng cho Hội viên Bạc FinTop.</li>
										</ul>
									</div>
									<div class="pricing-list-footer text-center m-auto align-items-center" @if(!isset($_SESSION['id'])) onclick="JS_UpgradeAcc.checkLogin()" @endif>
										<br>
										<a onclick="JS_UpgradeAcc.viewForm('VIP1')" class="btn rounded-pill px-4 btn-primary light-300" style="background:#165c38">ĐĂNG KÝ</a>
									</div>
								</div>
							</div>
							<!-- End Pricing List -->
						</div>
						<div class="col-md-6">
							<!-- Start Pricing List -->
							<div class="pricing-list shadow-sm rounded-top rounded-3 py-sm-0">
								<div class="row p-2">
									<!-- <div class="pricing-list-icon col-3 text-center m-auto text-secondary ml-5 py-2">
										<i class="display-3 bx bx-package"></i>
									</div> -->
									<div class="pricing-list-body col-md-12 align-items-center pl-3">
										<ul class="list-unstyled text-center light-300" style="background: #001f39;border-radius: 0.5em;color:#ffffff">
										    <br>
										    <li class="h5 semi-bold-600 mb-0">Phương thức 2:</li>
											<br>
											<li style="font-family: math;    padding: 0 25px 25px 25px;">Trở thành khách hàng dối tác, chuyển/mở TKCK gắn ID FinTop Team quản lý.</li>
										</ul>
									</div>
									<div class="pricing-list-footer text-center m-auto align-items-center">
										<br>
										<a onclick="JS_UpgradeAcc.viewFormContact()" class="btn rounded-pill px-4 btn-primary light-300" style="background:#dc3545">LIÊN HỆ</a>
									</div>
								</div>
							</div>
							<!-- End Pricing List -->
						</div>
					</div>
					<div class="container-lg">
						<!-- <div class="col-md-12 m-auto text-center py-2">
							<h1 class="h5" style="color:#fff079">ĐĂNG KÝ TÀI KHOẢN HỘI VIÊN FINTOP</h1>
						</div> -->
						<div class="row px-lg-3">
							<div class="col-md-4 pt-sm-0 pt-3 px-xl-3">
								<div class="" style="background:">
									<div class="pricing-table-body card-body text-center" @if(!isset($_SESSION['id'])) onclick="JS_UpgradeAcc.checkLogin()" @endif>
										<div onclick="JS_UpgradeAcc.viewForm('VIP1')" class="bg-secondary" style="border-radius: 0.5em;">
											<i style="color:#f2f2f2;font-size: 50px;" class="pricing-table-icon display-3 bx bx-package py-3"></i>
											<h2 class="pricing-table-heading h5 semi-bold-600" style="color:white">VIP1 (3 tháng) <br><span style="color:#ffce2b;font-size: 18px;">1.500.000 VND</span></h2>
											<br>
										</div>
									</div>
								</div>
							</div>

							<div class="col-md-4 pt-sm-0 pt-3 px-xl-3">
								<div class="" style="background:">
									<div class="pricing-table-body card-body text-center" @if(!isset($_SESSION['id'])) onclick="JS_UpgradeAcc.checkLogin()" @endif>
										<div onclick="JS_UpgradeAcc.viewForm('VIP1')" class="bg-secondary" style="border-radius: 0.5em;">
										<i style="color:#f2f2f2;font-size: 50px;" class="pricing-table-icon display-3 bx bx-package py-3"></i>
											<h2 class="pricing-table-heading h5 semi-bold-600" style="color:white">VIP1 (6 tháng) <br><span style="color:#ffce2b;font-size: 18px;">2.500.000 VND</span></h2>
											<br>
										</div>
									</div>
								</div>
							</div>


							<div class="col-md-4 pt-sm-0 pt-3 px-xl-3">
								<div class="" style="background:">
									<div class="pricing-table-body card-body text-center" @if(!isset($_SESSION['id'])) onclick="JS_UpgradeAcc.checkLogin()" @endif>
										<div onclick="JS_UpgradeAcc.viewForm('VIP1')" class="bg-secondary" style="border-radius: 0.5em;">
										<i style="color:#f2f2f2;font-size: 50px;" class="pricing-table-icon display-3 bx bx-package py-3"></i>
											<h2 class="pricing-table-heading h5 semi-bold-600" style="color:white">VIP1 (12 tháng) <br><span style="color:#ffce2b;font-size: 18px;">4.500.000 VND</span></h2>
											<br>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					@endif
					@if($data['type_vip'] == 'VIP2')
					<div class="pricing-horizontal row col-10 m-auto d-flex shadow-sm rounded overflow-hidden bg-white">
						<div class="pricing-horizontal-icon col-md-4 text-center  text-warning py-4">
							<i class="display-1 bx bx-package pt-4"></i>
							<h5 class="h5 pb-4">Hội viên VIP 2 (Vàng)</h5>
						</div>
						<div class="pricing-horizontal-body col-md-8 text-light col-lg-7 d-flex align-items-center pt-4 pb-4">
							<ul class="text-left list-unstyled mb-0">
								<li><i class="bx bxs-circle me-2"></i>Tra cứu cổ phiếu</li>
								<li><i class="bx bxs-circle me-2"></i>Phân tích đầu tư cơ bản</li>
								<li><i class="bx bxs-circle me-2"></i>Tham gia Cộng đồng chia sẻ đầu tư FinTop</li>
								<li><i class="bx bxs-circle me-2"></i>Tài liệu, cẩm nang hướng dẫn đầu tư</li>
								<li style="font-weight: 700;"><i class="bx bxs-circle me-2"></i>Tín hiệu mua FinTop</li>
								<li style="font-weight: 700;"><i class="bx bxs-circle me-2"></i>Phân tích đầu tư V.I.P</li>
								<li style="font-weight: 700;color:#fff36b"><i class="bx bxs-circle me-2"></i>Danh mục đầu tư V.I.P FinTop</li>
								<li style="font-weight: 700;color:#fff36b"><i class="bx bxs-circle me-2"></i>Khuyến nghị đầu tư V.I.P FinTop</li>
							</ul>
						</div>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-6">
								<!-- Start Pricing List -->
								<div class="pricing-list shadow-sm rounded-top rounded-3 py-sm-0">
									<div class="row p-2">
										<!-- <div class="pricing-list-icon col-3 text-center m-auto text-secondary ml-5 py-2">
											<i class="display-3 bx bx-package"></i>
										</div> -->
										<div class="pricing-list-body col-md-12 align-items-center pl-3">
											<ul class="list-unstyled text-center light-300" style="background: #001f39;border-radius: 0.5em;color:#ffffff">
											    <br>
												<li class="h5 semi-bold-600 mb-0">Phương thức 1:</li>
												<br>
												<li style="font-family: math;    padding: 0 25px 25px 25px;">Đăng ký tham gia gói thành viên <span style="color: #ffd400;font-weight: 600;">VIP2</span> sử dụng cho Hội viên Vàng FinTop.</li>
											</ul>
										</div>
										<div class="pricing-list-footer text-center m-auto align-items-center">
											<br>
											<a  onclick="JS_UpgradeAcc.viewForm('VIP2')" class="btn rounded-pill px-4 btn-primary light-300" style="background:#165c38">ĐĂNG KÝ</a>
										</div>
									</div>
								</div>
								<!-- End Pricing List -->
							</div>
							<div class="col-md-6">
								<!-- Start Pricing List -->
								<div class="pricing-list shadow-sm rounded-top rounded-3 py-sm-0">
									<div class="row p-2">
										<!-- <div class="pricing-list-icon col-3 text-center m-auto text-secondary ml-5 py-2">
											<i class="display-3 bx bx-package"></i>
										</div> -->
										<div class="pricing-list-body col-md-12 align-items-center pl-3">
											<ul class="list-unstyled text-center light-300" style="background: #001f39;border-radius: 0.5em;color:#ffffff">
											    <br>
												<li class="h5 semi-bold-600 mb-0">Phương thức 2:</li>
												<br>
												<li style="font-family: math;    padding: 0 25px 25px 25px;">Trở thành khách hàng dối tác, chuyển/mở TKCK gắn ID FinTop Team quản lý.</li>
											</ul>
										</div>
										<div class="pricing-list-footer text-center m-auto align-items-center">
											<br>
											<a onclick="JS_UpgradeAcc.viewFormContact()" class="btn rounded-pill px-4 btn-primary light-300" style="background:#dc3545">LIÊN HỆ</a>
										</div>
									</div>
								</div>
								<!-- End Pricing List -->
							</div>
						</div>
						<div class="container-lg">
						<!-- <div class="col-md-12 m-auto text-center py-2">
							<h1 class="h5" style="color:#fff079">ĐĂNG KÝ TÀI KHOẢN HỘI VIÊN FINTOP</h1>
						</div> -->
							<div class="row px-lg-3">
								<div class="col-md-4 pt-sm-0 pt-3 px-xl-3">
									<div class="" style="background:">
										<div  class="pricing-table-body card-body text-center" @if(!isset($_SESSION['id'])) onclick="JS_UpgradeAcc.checkLogin()" @endif>
											<div onclick="JS_UpgradeAcc.viewForm('VIP2')" class="bg-secondary" style="border-radius: 0.5em;">
												<i style="color:#ffde45;font-size: 50px;" class="pricing-table-icon display-3 bx bx-package py-3"></i>
												<h2 class="pricing-table-heading h5 semi-bold-600" style="color:white">VIP2 (3 tháng) <br><span style="color:#ffce2b;font-size: 18px;">2.500.000 VND</span></h2>
												<br>
											</div>
										</div>
									</div>
								</div>

								<div class="col-md-4 pt-sm-0 pt-3 px-xl-3">
									<div class="" style="background:">
										<div class="pricing-table-body card-body text-center" @if(!isset($_SESSION['id'])) onclick="JS_UpgradeAcc.checkLogin()" @endif>
											<div onclick="JS_UpgradeAcc.viewForm('VIP2')" class="bg-secondary" style="border-radius: 0.5em;">
											<i style="color:#ffde45;font-size: 50px;" class="pricing-table-icon display-3 bx bx-package py-3"></i>
												<h2 class="pricing-table-heading h5 semi-bold-600" style="color:white">VIP2 (6 tháng) <br><span style="color:#ffce2b;font-size: 18px;">4.500.000 VND</span></h2>
												<br>
											</div>
										</div>
									</div>
								</div>


								<div class="col-md-4 pt-sm-0 pt-3 px-xl-3">
									<div class="" style="background:">
										<div class="pricing-table-body card-body text-center" @if(!isset($_SESSION['id'])) onclick="JS_UpgradeAcc.checkLogin()" @endif>
											<div onclick="JS_UpgradeAcc.viewForm('VIP2')" class="bg-secondary" style="border-radius: 0.5em;">
											<i style="color:#ffde45;font-size: 50px;" class="pricing-table-icon display-3 bx bx-package py-3"></i>
												<h2 class="pricing-table-heading h5 semi-bold-600" style="color:white">VIP2 (12 tháng) <br><span style="color:#ffce2b;font-size: 18px;">8.000.000 VND</span></h2>
												<br>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						@endif
						@if($data['type_vip'] == 'KIM_CUONG')
					<!-- <div class="pricing-horizontal row col-10 m-auto d-flex shadow-sm rounded overflow-hidden bg-white">
						<div class="pricing-horizontal-icon col-md-12 text-center  text-warning py-4">
							<div class="py-3">
							    <img   src="{{url('/clients/img/diamond.png')}}" alt="Image" style="height: 95px;width: 95px;">
							</div>
							<h5 class="h5 pb-4">Hội viên Kim cương</h5>
						</div>
					</div> -->
					<div class="pricing-horizontal row col-10 m-auto d-flex shadow-sm rounded overflow-hidden bg-white">
						<div class="pricing-horizontal-icon col-md-4 text-center  text-warning py-4">
						   <div class="py-3">
							    <img   src="{{url('/clients/img/diamond.png')}}" alt="Image" style="height: 95px;width: 95px;">
							</div>							
							<h5 class="h5 pb-4">Hội viên Kim cương</h5>
						</div>
						<div class="pricing-horizontal-body col-md-8 text-light col-lg-8 d-flex align-items-center pt-4 pb-4">
							<ul class="text-left list-unstyled mb-0">
								<li><i class="bx bxs-circle me-2"></i>Tra cứu cổ phiếu</li>
								<li><i class="bx bxs-circle me-2"></i>Phân tích đầu tư cơ bản</li>
								<li><i class="bx bxs-circle me-2"></i>Tham gia Cộng đồng chia sẻ đầu tư FinTop</li>
								<li><i class="bx bxs-circle me-2"></i>Tài liệu, cẩm nang hướng dẫn đầu tư</li>
								<li style="font-weight: 700;"><i class="bx bxs-circle me-2"></i>Tín hiệu mua FinTop</li>
								<li style="font-weight: 700;"><i class="bx bxs-circle me-2"></i>Phân tích đầu tư V.I.P</li>
								<li style="font-weight: 700;"><i class="bx bxs-circle me-2"></i>Danh mục đầu tư V.I.P FinTop</li>
								<li style="font-weight: 700;;color:#fff36b"><i class="bx bxs-circle me-2"></i>Khuyến nghị đầu tư V.I.P FinTop</li>
								<li style="font-weight: 700;color:#fff36b"><i class="bx bxs-circle me-2"></i>Cố vấn chiến lược đầu tư 1-1 cùng Chuyên gia FinTop</li>
							</ul>
						</div>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-12">
								<!-- Start Pricing List -->
								<div class="pricing-list shadow-sm rounded-top rounded-3 py-sm-0">
									<div class="row p-2">
										<!-- <div class="pricing-list-icon col-3 text-center m-auto text-secondary ml-5 py-2">
											<i class="display-3 bx bx-package"></i>
										</div> -->
										<div class="pricing-list-body col-md-12 align-items-center pl-3">
											<ul class="list-unstyled text-center light-300" style="background: #001f39;border-radius: 0.5em;color:#ffffff">
												<br>
												<li style="font-family: math;    padding: 0 25px 25px 25px;">Gói hỗ trợ <span style="color: #ffd400;font-weight: 600;">VIP PRO</span> đặc biệt dành riêng cho khách hàng đối tác FinTop. Hội viên Kim Cương với NAV đầu tư từ 1 tỷ VND, cố vấn chiến lược 1-1 cùng Chuyên gia FinTop, tư vấn danh mục cổ phiếu, nắm bắt cơ hội đầu tư, quản trị rủi ro.</li>
											</ul>
										</div>
										<div class="pricing-list-footer text-center m-auto align-items-center">
											<br>
											<a onclick="JS_UpgradeAcc.viewFormContact()" class="btn rounded-pill px-4 btn-primary light-300" style="background:#dc3545">LIÊN HỆ</a>
										</div>
									</div>
								</div>
								<!-- End Pricing List -->
							</div>
						</div>
						@endif
			    </div>
			<div class="modal-footer">
				<div class="rounded-pillpricing-table-footer">
					<button type="button" data-bs-dismiss="modal" style="background: aliceblue; color: #b20000;">Đóng</button>
				</div>
			</div>
		</div>
	</div>
</form>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#show_img').attr('src', e.target.result).width(150);
            };
            $("#show_img").removeAttr('hidden');

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>