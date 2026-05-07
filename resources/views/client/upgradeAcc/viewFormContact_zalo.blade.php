
<link rel="stylesheet" href="../clients/css/style.css">

<form id="frmAdd_updateAcc" role="form" enctype="multipart/form-data" style="padding-top: 10%;">
	@csrf
	<input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
	<!-- <div class="modal-dialog modal-lg"> -->
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content card" style="background:#5b1313db !important">
			<div class="modal-header">
				<div class="col-md-11 m-auto text-center py-2" style="width: 95%;">
					<center>
						<div class="row" style="background: #031f38;font-size: 1.5rem;height: 70px;border-radius: 10px;padding-top:15px;padding-botton:10px;">

							<div class="col-md-12 text-center">
								<h2 style="font-size:23px;color:#ffffff;padding-top: 10px;">QUÉT QR LIÊN HỆ ZALO</h2>
							</div>
							<!-- <div class="col-md-2">
								<button type="button" data-bs-dismiss="modal" class="btn btn-sm" style="background: #f1f2f2;height:35px">
									Đóng
								</button>
							</div> -->
						</div>
					</center>
				</div>
			</div>
			<div class="card-body">
				<div class="row" style="">
					<div class="col-md-12">
						<center>
						   <img width="" height="350px" style="background-color: none;" src="../clients/img/finboxchat.jpg" alt="">
						</center>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<div class="rounded-pillpricing-table-footer">
					<button type="button"  data-bs-dismiss="modal" style="background: aliceblue; color: #b20000;">Đóng</button>
				</div>
			</div>
		</div>
	</div>
</form>