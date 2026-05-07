<form id="frmAdd" role="form" action="" method="POST" enctype="multipart/form-data">
	@csrf
	<input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
	<input type="hidden" name="id" id="id" value="{{!empty($data['id'])?$data['id']:''}}">
	<div class="modal-dialog modal-lg">
		<div class="modal-content card">
			<div class="modal-header">
				<h5 class="modal-title">Nâng cấp cộng tác viên</h5>
				<button type="button" class="btn btn-sm" data-bs-dismiss="modal" style="background: #f1f2f2;">
					X
				</button>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<p for="example-text-input" class="form-control-label">ID nhân sự</p>
							<input class="form-control" type="text" value="{{!empty($data['id_personnel'])?$data['id_personnel']:''}}" name="id_personnel" id="id_personnel">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<p for="example-text-input" class="form-control-label">Người quản lý</p>
							<select class="form-control input-sm chzn-select" name="id_manage"id="id_manage">
								@foreach($data['arr_quanly'] as $item)
								    <option value="{{$item['id_personnel']}}">{{$item['name']}} - {{$item['id_personnel']}}</option>
								@endforeach
							</select>
						</div>
					</div>
				</div>
				{{-- Quyền truy cập --}}
				<div class="row form-group" id="div_hinhthucgiai">
					<div class="modal-footer">
						<!-- <span id="btn_create"> -->
							<button onclick="JS_Client.store_upgrade_ctv_sale()" class="btn btn-primary btn-sm" type="button">
								Cập nhật
							</button>
						<!-- </span> -->
						<button type="button" class="btn btn-default btn-sm" data-bs-dismiss="modal" style="background: #f1f2f2;">
							Đóng
						</button>
					</div>
				</div>
				
			</div>
		</div>
	</div>
</form>
<script src="../assets/js/croppie.js"></script>
<script src="../assets/js/croppie.min.js"></script>
<script>
	$(document).ready(function() {
		$image_crop = $('#image_demo').croppie({
			enableExif: true,
			viewport: {
				width: 200,
				height: 200,
				type: 'circle'
			},

			boundary: {
				width: 300,
				height: 300
			}
		});

		$('#upload_image').on('change', function() {
			var reader = new FileReader();
			reader.onload = function(event) {
				$image_crop.croppie('bind', {
					url: event.target.result
				})
			}
			reader.readAsDataURL(this.files[0]);
			$('#uploadimage').show();
		});

		$('.crop_image').click(function(event) {
			$image_crop.croppie('result', {
				type: 'canvas',
				size: 'viewport'
			}).then(function(response) {
				console.log(1, $image_crop)
			});
		})
	})
	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function (e) {
			$('#show_img').attr('src', e.target.result).width(150);
			};
			$("#show_img").removeAttr('hidden');

			reader.readAsDataURL(input.files[0]);
		}
	}
</script>