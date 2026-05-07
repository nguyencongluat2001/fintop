<style>
	.hiddel {
		display: none;
	}

	.show {
		display: block;
	}

	.form-control-label {
		font-size: 16px !important;
	}

	..modal-header {
		display: inline;
	}

	.form-control:disabled {
		background-color: #ffffff
	}

	.label-upload {
		border: 1px solid #344767;
		color: #000 !important;
		padding: 0.5rem;
		border-radius: 0.5em;
		cursor: pointer;
	}

	/* Create a custom checkbox */
	.checkmark {
		position: absolute;
		top: 0;
		left: 0;
		height: 25px;
		width: 25px;
		background-color: #eee;
	}

	.form-control-label {
		color: #ffffff;
		padding-left: 20px;
	}
	.objective .objective-box{
		display: flex;
	}
	@media (max-width: 576px){
		.objective .objective-box{
			display: block;
		}
	}
	@media (max-width: 450px){
		.mt-sm-3 {
			margin-top: 1rem!important;
		}
		.objective .objective-box{
			display: block;
		}
	}
</style>
<link rel="stylesheet" href="../clients/css/style.css">

<form id="frmAdd_updateAcc" role="form" action="" method="POST" enctype="multipart/form-data" >
	@csrf
	<input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
	<input type="hidden" name="id" id="id" value="{{!empty($data['users']->id)?$data['users']->id:''}}">
	<div class="modal-dialog modal-lg">
		<div class="modal-content card" style="background:#5b1313db">
			<div class="modal-header">
				<!-- <h5  style="width: 90%;" class="modal-title">Nâng cấp tài khoản</h5>
				<button type="button" class="btn btn-sm btn-close-res" style="background: #f1f2f2;width: 5%;">
				<i class="fas fa-undo-alt"></i>
				</button> -->
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
									<button type="button" data-bs-dismiss="modal" class="btn btn-sm btn-close-res" style="background: #f1f2f2;height:35px">
								    <i class="fas fa-reply"></i>
							</button>
						</div>
					</center>
				</div>
			</div>
			<div class="card-body">
				<div class="row px-5">
					<div class="col-md-6 mt-sm-3">
						<div class="form-group">
							<div for="example-text-input" class="form-control-label">Họ và tên</div>
							<input disabled class="form-control" type="text" name="name" value="{{isset($data['users']->name) ? $data['users']->name : ''}}">
						</div>
					</div>
					<div class="col-md-6 mt-sm-3">
						<div class="form-group">
							<div for="example-text-input" class="form-control-label">Địa chỉ Email</div>
							<input disabled class="form-control" type="email" name="email" value="{{isset($data['users']->email) ? $data['users']->email : ''}}">
						</div>
					</div>
					<div class="col-md-6 mt-3">
						<div class="form-group">
							<div for="example-text-input" class="form-control-label">Ngày sinh</div>
							<input disabled class="form-control" type="date" name="dateBirth" value="{{isset($data['users']->dateBirth) ? $data['users']->dateBirth : ''}}">
						</div>
					</div>
					<div class="col-md-6 mt-3">
						<div class="form-group">
							<div for="example-text-input" class="form-control-label">Số điện thoại</div>
							<input disabled class="form-control" type="text" name="phone" value="{{isset($data['users']->phone) ? $data['users']->phone : ''}}">
						</div>
					</div>
					<div class="col-md-6 mt-3">
						<div class="form-group">
							<div for="example-text-input" class="form-control-label">Gói hội viên</div>
							<input disabled class="form-control" type="text" id="wrap" name="wrap" value="{{isset($data['type_vip']) ? $data['type_vip'] : ''}}">
						</div>
					</div>
					<div class="col-md-6 mt-3">
						<div class="form-group">
							<div for="example-text-input" class="form-control-label">Ngày đăng ký</div>
							<input disabled class="form-control" name="time_register" value="{{isset($data['time_register']) ? $data['time_register'] : ''}}">
						</div>
					</div>
				</div>
				@if($data['type_vip'] == 'VIP1')
				<div class="row px-4 mx-2">
					<!-- <div class="container-lg"> -->
					<!-- <div class="col-md-12 m-auto text-center py-2">
						<h1 class="h5" style="color:#fff079">ĐĂNG KÝ TÀI KHOẢN HỘI VIÊN FINTOP</h1>
					</div> -->
					<!-- <div class="row px-lg-3"> -->
					<div class="text-center mt-3">
						<h1 class="h5 text-uppercase pt-3 my-0" style="background-color: #031f38;border-radius: 1rem;color:#fff;height:60px">Chọn gói đăng ký</h1>
					</div>
					<div class="col-md-4 px-0">
						<div class="" style="background:">
							<div class="pricing-table-body card-body text-center">
								<label class="bg-secondary vip_package" style="width:100%; border-radius: 0.5em;">
									<i style="color:#ffffff;font-size: 50px;" class="pricing-table-icon display-3 bx bx-package py-3"></i>
									<h2 class="pricing-table-heading h5 semi-bold-600" style="color:white">VIP1 (3 tháng) <br><span style="color:#ffce2b;font-size: 18px;">1.500.000 VND</span></h2>
									<br>
									<div class="pricing-table-footer py-2">
										<input type="radio" onchange="JS_UpgradeAcc.getTypeBank(this.value)" value='{"name": "VIP1 (3 tháng)", "money": "1500000","code": "VIP1_3"}' name="pack_vip" style="transform: scale(2);accent-color: #25aa33e8;">
										<input type="hidden" name="package" value='{"name": "VIP1 (3 tháng)", "money": "1500000","code": "VIP1_3"}'>
									</div>
								</label>
							</div>
						</div>
					</div>

					<div class="col-md-4 px-0">
						<div class="" style="background:">
							<div class="pricing-table-body card-body text-center">
								<label class="bg-secondary vip_package" style="width:100%; border-radius: 0.5em;">
									<i style="color:#ffffff;font-size: 50px;" class="pricing-table-icon display-3 bx bx-package py-3"></i>
									<h2 class="pricing-table-heading h5 semi-bold-600" style="color:white">VIP1 (6 tháng) <br><span style="color:#ffce2b;font-size: 18px;">2.500.000 VND</span></h2>
									<br>
									<div class="pricing-table-footer py-2">
										<input type="radio" onchange="JS_UpgradeAcc.getTypeBank(this.value)" value='{"name": "VIP1 (6 tháng)", "money": "2500000","code": "VIP1_6"}'  name="pack_vip" style="transform: scale(2);accent-color: #25aa33e8;">
										<input type="hidden" name="package" value='{"name": "VIP1 (6 tháng)", "money": "2500000","code": "VIP1_6"}'>
									</div>
								</label>
							</div>
						</div>
					</div>


					<div class="col-md-4 px-0">
						<div class="" style="background:">
							<div class="pricing-table-body card-body text-center">
								<label class="bg-secondary vip_package" style="width:100%; border-radius: 0.5em;">
									<i style="color:#ffffff;font-size: 50px;" class="pricing-table-icon display-3 bx bx-package py-3"></i>
									<h2 class="pricing-table-heading h5 semi-bold-600" style="color:white">VIP1 (12 tháng) <br><span style="color:#ffce2b;font-size: 18px;">4.500.000 VND</span></h2>
									<br>
									<div class="pricing-table-footer py-2">
										<input type="radio" onchange="JS_UpgradeAcc.getTypeBank(this.value)" value='{"name": "VIP1 (12 tháng)", "money": "4500000","code": "VIP1_12"}' name="pack_vip" style="transform: scale(2);accent-color: #25aa33e8;">
										<input type="hidden" name="package" value='{"name": "VIP1 (12 tháng)", "money": "4500000","code": "VIP1_12"}'>
									</div>
								</label>
							</div>
						</div>
					</div>
					<!-- </div>
					</div> -->
				</div>
				@elseif($data['type_vip'] == 'VIP2')
				<div class="row px-4 mx-2">
					<!-- <div class="container-lg"> -->
					<!-- <div class="col-md-12 m-auto text-center py-2">
						<h1 class="h5" style="color:#fff079">ĐĂNG KÝ TÀI KHOẢN HỘI VIÊN FINTOP</h1>
					</div> -->
					<!-- <div class="row px-lg-3"> -->
					<div class="text-center mt-3">
						<h1 class="h5 text-uppercase pt-3 my-0" style="background-color: #031f38;border-radius: 1rem;color:#fff;height:60px">Chọn gói đăng ký</h1>
					</div>
					<div class="col-md-4 px-0">
						<div class="" style="background:">
							<div class="pricing-table-body card-body text-center">
								<label class="bg-secondary vip_package" style="width:100%; border-radius: 0.5em;">
									<i style="color:#ffde45;font-size: 50px;" class="pricing-table-icon display-3 bx bx-package py-3"></i>
									<h2 class="pricing-table-heading h5 semi-bold-600" style="color:white">VIP2 (3 tháng) <br><span style="color:#ffce2b;font-size: 18px;">2.500.000 VND</span></h2>
									<br>
									<div class="pricing-table-footer py-2">
										<input type="radio" onchange="JS_UpgradeAcc.getTypeBank(this.value)"  value='{"name": "VIP2 (3 tháng)", "money": "2500000","code": "VIP2_3"}' name="pack_vip" style="transform: scale(2);accent-color: #25aa33e8;">
										<input type="hidden" name="package" value='{"name": "VIP2 (3 tháng)", "money": "2500000","code": "VIP2_3"}'>
									</div>
								</label>
							</div>
						</div>
					</div>

					<div class="col-md-4 px-0">
						<div class="" style="background:">
							<div class="pricing-table-body card-body text-center">
								<label class="bg-secondary vip_package" style="width:100%; border-radius: 0.5em;">
									<i style="color:#ffde45;font-size: 50px;" class="pricing-table-icon display-3 bx bx-package py-3"></i>
									<h2 class="pricing-table-heading h5 semi-bold-600" style="color:white">VIP2 (6 tháng) <br><span style="color:#ffce2b;font-size: 18px;">4.500.000 VND</span></h2>
									<br>
									<div class="pricing-table-footer py-2">
										<input type="radio" onchange="JS_UpgradeAcc.getTypeBank(this.value)" value='{"name": "VIP2 (6 tháng)", "money": "4500000","code": "VIP2_6"}' name="pack_vip" style="transform: scale(2);accent-color: #25aa33e8;">
										<input type="hidden" name="package" value='{"name": "VIP2 (6 tháng)", "money": "4500000","code": "VIP2_6"}'>
									</div>
								</label>
							</div>
						</div>
					</div>


					<div class="col-md-4 px-0">
						<div class="" style="background:">
							<div class="pricing-table-body card-body text-center">
								<label class="bg-secondary vip_package" style="width:100%; border-radius: 0.5em;">
									<i style="color:#ffde45;font-size: 50px;" class="pricing-table-icon display-3 bx bx-package py-3"></i>
									<h2 class="pricing-table-heading h5 semi-bold-600" style="color:white">VIP2 (12 tháng) <br><span style="color:#ffce2b;font-size: 18px;">8.000.000 VND</span></h2>
									<br>
									<div class="pricing-table-footer py-2">
										<input type="radio" onchange="JS_UpgradeAcc.getTypeBank(this.value)" value='{"name": "VIP2 (12 tháng)", "money": "8000000","code": "VIP2_12"}' name="pack_vip" style="transform: scale(2);accent-color: #25aa33e8;">
										<input type="hidden" name="package" value='{"name": "VIP2 (12 tháng)", "money": "8000000","code": "VIP2_12"}'>
									</div>
								</label>
							</div>
						</div>
					</div>
					<!-- </div>
					</div> -->
				</div>
				@endif
				<div class="px-5 mx-1" id="view_package"></div>
				<div class=" px-5 mx-1">
					<div class="form-group" id="div_hinhthucgiai">
						<!-- <div class="col-md-12">
							<label style="color:#ffffff;font-size:20px;font-family: math;" for="">Chọn hình thức thanh toán <span class="request_star">*</span></label> <br>
						</div> -->
						<!-- <div class="text-center mt-3">
							<h1 class="h5 text-uppercase pt-3 my-0" style="background-color: #031f38;border-radius: 1rem;color:#fff;height:60px">THANH TOÁN</h1>
						</div> -->
						<!-- ngan hang -->
						<!-- <div>
							<input type="radio" onchange="JS_UpgradeAcc.getTypeBank(this.value)" value="BANK" name="type_bank" id="type_bank" /><span style="padding-left:5px;color:#ffffff;">Chuyển khoản ngân hàng</span><br>
						</div> -->
						<!-- <div id="bank" class="hiddel"> -->
							<div class="row">
								<div class="objective col-lg-12">
									<div class="objective-box" style="background-color: #031f38;color: #ffffff;font-weight: 500;padding:15px;width:100%;height:100%;border-radius:5px">
									   <div class="col-md-4 px-0">
										<div class="objective-icon m-auto mb-2 mb-sm-4 shadow-lg">
												<img class="card-img " src="../clients/img/qrMbFintop.jpg" alt="Card image" style="width:100%">
											</div>
									   </div>
									   <div class="col-md-8 px-0">
									    	<span>Ngân hàng thụ hưởng: MBBank (Ngân hàng TMCP Quân đội)</span><br>
											<span>Số tài khoản thụ hưởng: <span style="color:#fff079">86 286 243 8886</span></span><br>
											<span>Tên thụ hưởng: <span style="color:#fff079">CÔNG TY TNHH ĐẦU TƯ VÀ PHÁT TRIỂN FINTOP</span></span> <br>
											@if($data['type_vip'] == 'VIP1')
											<span>Nội dung: [HỌ TÊN]_[SỐ ĐIỆN THOẠI]_[GÓI VIP1 - THỜI GIAN]</span><br>
											<span>Ví dụ:<b style="color:#fff079"> NGUYỄN VĂN A 0862348886 VIP1 3 THÁNG</b></span>
											@elseif($data['type_vip'] == 'VIP2')
											<span>Nội dung: [HỌ TÊN]_[SỐ ĐIỆN THOẠI]_[GÓI VIP2 - THỜI GIAN]</span><br>
											<span>Ví dụ:<b style="color:#fff079"> NGUYỄN VĂN A 0862348886 VIP2 3 THÁNG</b></span>
											@endif
									   </div>
									</div>
								</div>
							</div>
						<!-- </div> -->
					</div>
					{{-- Mô tả --}}
					<div class="form-group pt-4" id="div_hinhthucgiai">
						<div class="col-md-12">
							<label style="font-size:20px;font-family: math;color:#ffffff;" for="">Tải ảnh đã thanh toán để xác thực.<span class="request_star">*</span></label> <br>
						</div>
					</div>
					<div class="col-md-6">
						<label style="background:#ffffff" for="upload_image" class="label-upload">Chọn ảnh</label>
						<input type="file" hidden name="upload_image" id="upload_image" onchange="readURL(this)">
						<br>
						<img id="show_img" hidden alt="Image" style="width:150px">
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<div id="updateVip" class="pricing-table-footer">
					<button onclick="JS_UpgradeAcc.updateVip()" type="button" id="updateVip" class="btn rounded-pill px-4 btn-outline-light light-300" style="background:#165c38;">Đăng ký</button>
				</div>
				<div class="rounded-pillpricing-table-footer">
					<button type="button" class="btn-close-res" style="background: aliceblue; color: #b20000;">Đóng</button>
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
	jQuery(document).ready(function(){
		$(".vip_package").click(function(){
			var data = $(this).find("input[name='package']").val();
			if(data != undefined){
				var jsonData = JSON.parse(data);
				var vat = parseInt(jsonData.money) + (parseInt(jsonData.money) * 10 / 100);
				var html = '';
				// html += `<div class="text-center mt-3 mb-2 px-0"><h1 class="h5 text-uppercase pt-3 my-0" style="background-color: #031f38;border-radius: 1rem;color:#fff;height:60px">Hóa đơn chi tiết</h1></div>
				// 		<table class="table table-bordered table-striped bg-light">
				// 			<colgroup><col width="5%"><col width="25%"><col width="10%"><col width="20%"><col width="20%"><col width="20%"></colgroup>
				// 			<thead>
				// 				// <th style="text-align:center;vertical-align: middle;">STT</th>
				// 				<th style="text-align:center;vertical-align: middle;">Tên hàng hóa<br>Dịch vụ</th>
				// 				<th style="text-align:center;vertical-align: middle;">Số lượng</th>
				// 				<th style="text-align:center;vertical-align: middle;">Đơn giá</th>
				// 				<th style="text-align:center;vertical-align: middle;">Thành tiền</th>
				// 				<th style="text-align:center;vertical-align: middle;">Thuế giá trị gia tăng (VAT 10%)</th>
				// 				<th style="text-align:center;vertical-align: middle;">Tổng tiền thanh toán</th>
				// 			</thead>
				// 			<tbody>
				// 				<tr>
				// 					// <td align="center">1</td>
				// 					<td align="center">${jsonData.name}</td>
				// 					<td align="center">1</td>
				// 					<td align="center">${parseInt(jsonData.money).toLocaleString()} VND</td>
				// 					<td align="center">${parseInt(jsonData.money).toLocaleString()} VND</td>
				// 					<td align="center">10%</td>
				// 					<td align="center">${vat.toLocaleString()} VND</td>
				// 				</tr>
				// 			</tbody>
				// 			<tfoot><tr><td colspan="10"><a target="_blank" href="">Hướng dẫn thanh toán</a></td></tr></tfoot>
				// 		</table>`;
				if(jsonData.code == 'VIP1_3'){
					html += `<div class="m-auto py-4 mb-2 mb-sm-4 shadow-lg">
							<img class="card-img " src="../clients/img/vip1_3.PNG" alt="Card image" style="width:100%">
						</div>`;
				}
				if(jsonData.code == 'VIP1_6'){
					html += `<div class="m-auto py-4 mb-2 mb-sm-4 shadow-lg">
							<img class="card-img " src="../clients/img/vip1_6.PNG" alt="Card image" style="width:100%">
						</div>`;
				}
				if(jsonData.code == 'VIP1_12'){
					html += `<div class="m-auto py-4 mb-2 mb-sm-4 shadow-lg">
							<img class="card-img " src="../clients/img/vip1_12.PNG" alt="Card image" style="width:100%">
						</div>`;
				}
				if(jsonData.code == 'VIP2_3'){
					html += `<div class="m-auto py-4 mb-2 mb-sm-4 shadow-lg">
							<img class="card-img " src="../clients/img/vip2_3.PNG" alt="Card image" style="width:100%">
						</div>`;
				}
				if(jsonData.code == 'VIP2_6'){
					html += `<div class="m-auto py-4 mb-2 mb-sm-4 shadow-lg">
							<img class="card-img " src="../clients/img/vip2_6.PNG" alt="Card image" style="width:100%">
						</div>`;
				}
				if(jsonData.code == 'VIP2_12'){
					html += `<div class="m-auto py-4 mb-2 mb-sm-4 shadow-lg">
							<img class="card-img " src="../clients/img/vip2_12.PNG" alt="Card image" style="width:100%">
						</div>`;
				}
						
						
			$("#view_package").html(html);
			}
		})
	})
</script>