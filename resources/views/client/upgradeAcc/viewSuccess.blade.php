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

	.modal-header {
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
</style>
<link rel="stylesheet" href="../clients/css/style.css">

<form id="frmAdd_updateAcc" role="form" enctype="multipart/form-data" style="padding-top: 10%;">
	@csrf
	<input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content card" style="background:#5b1313db">
			<div class="modal-header">
			    <div class="col-md-11 m-auto text-center py-2" style="width: 95%;">
					<center>
					<div class="row" style="background: #031f38;font-size: 1.5rem;height: 70px;border-radius: 10px;padding-top:15px;padding-botton:10px">
						<div class="col-md-12 text-center">
							<h2 style="font-size:28px;color:#ffffff;">ĐĂNG KÝ THÀNH CÔNG!</h2>
						</div>
					</div>
					</center>
				</div>
			</div>
			<div class="">
				<div class="row">
					<div class="col-md-12">
						<!-- Start Pricing List -->
						<div class="pricing-list shadow-sm rounded-top rounded-3 py-sm-0 py-5">
							<div class="row p-2">
								<div class="pricing-list-body col-md-12 align-items-center pl-3">
									<ul class="list-unstyled text-center light-300" style="padding: 15px;">
										<li class="h5 mb-0" style="color:#ffffff;font-family: emoji;background:#001f39 !important;border-radius:15px;padding:15px">
										    <span style="font-size: 24px">FinTop đã tiếp nhận thông tin. Đăng ký của Anh/Chị sẽ được xử lý và nâng cấp gói Hội viên trong thời gian sớm nhất (24h).</span> 
											<span style="font-size: 24px;">Chi tiết liên hệ Hotline</span>  
											<span style="font-size: 24px;"><b style="font-size: 24px;color:#fff079">086.234.8886</b> để được hỗ trợ.</span>  
										</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="modal-footer">
						   <!-- <li class="d-flex"> -->
								<div class=" col-md-3">
									<img src="{{url('/clients/img/zalo.png')}}" alt="Image" width="50px" height="50px">
								</div>
								<div class=" col-md-3">
									<img src="{{url('/clients/img/phone.png')}}" alt="Image" width="55px" height="55px">
								</div>
							<!-- </li> -->
							<div class="rounded-pillpricing-table-footer">
								<button type="button" class="btn-close-res" style="background: aliceblue; color: #b20000;">Đóng</button>
							</div>
						</div>
						<!-- End Pricing List -->
					</div>
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