<style>
	    .color{
        color:black;
    }
	.form-control-label{ style="color:black;padding-left:20px;"
		color:black;
		padding-left:20px;
	}
	.table>:not(caption)>*>*{
        border-bottom-width: 0;
    }
    #tableData{
        color: #fff;
    }
    .passShowHide, .passwordretypechangeShowHide, .passwordnewShowHide {
        position: absolute;
        top: 13px;
        right: 20px;
        cursor: pointer;
    }
    .passShowHide{
        color: #000;
    }
    .passwordretypechangeShowHide{
        color: #000;
    }
	.passwordnewShowHide{
        color: #000;
    }
</style>

<div class="modal-dialog modal-lg">
	<div class="modal-content card">
		<form id="frmChangePass">
			<input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
			<input type="hidden" name="user_id" id="user_id" value="{{!empty($data['id'])?$data['id']:''}}">
			<div class="modal-header">
				<h5 class="modal-title">Đổi mật khẩu</h5>
				<!-- <button type="button" class="btn btn-sm" data-bs-dismiss="modal" style="background: #f1f2f2;">
					X
				</button> -->
			</div>
			<div class="card-body">
				<div class="row mb-3">
					<!-- <div class="col-md-6">
						<div class="form-group">
							<p for="example-text-input" class="form-control-label" style="color:black;padding-left:20px;">Email</p>
							<input class="form-control color" type="text" value="{{!empty($data['email_acc'])?$data['email_acc']:''}}" name="email_acc" id="email_acc" />
						</div>
					</div> -->
					<div class="form-wrapper col-md-6">
						<label for="">Email <span class="request_star">*</span></label>
						<div style="position: relative;">
							<input placeholder="Nhập mật khẩu..." id="email_acc" type="text" class="form-control" name="email_acc" value="{{!empty($data['email_acc'])?$data['email_acc']:''}}">
						</div>
					</div>
					<!-- <div class="col-md-6">
						<div class="form-group">
							<p for="example-text-input" class="form-control-label" style="color:black;padding-left:20px;">Mật khẩu cũ</p>
							<input class="form-control color" type="password" value="" name="password_old" id="password_old" />
						</div>
					</div> -->
					<div class="form-wrapper col-md-6">
						<label for="">Mật khẩu cũ <span class="request_star">*</span></label>
						<div style="position: relative;">
							<input placeholder="Nhập mật khẩu..." id="password_old" type="password" class="form-control" name="password_old" value="">
							<span><i class="passShowHide fas fa-eye"></i></span>
						</div>
					</div>
					
					<div class="form-wrapper col-md-6">
						<label for="">Mật khẩu mới <span class="request_star">*</span></label>
						<div style="position: relative;">
							<input placeholder="Nhập mật khẩu..." id="password_new" type="password" class="form-control" name="password_new" value="">
							<span><i class="passwordnewShowHide fas fa-eye"></i></span>
						</div>
					</div>

					<div class="form-wrapper col-md-6">
						<label for="">Nhập lại mật khẩu <span class="request_star">*</span></label>
						<div style="position: relative;">
							<input placeholder="Nhập mật khẩu..." id="password_retype_change" type="password" class="form-control" name="password_retype_change" value="">
							<span><i class="passwordretypechangeShowHide fas fa-eye"></i></span>
						</div>
					</div>
					<!-- <div id="iss">

				    </div> -->
				</div>
				
				<!-- <div class="modal-footer">
					<span id="btn_getFormOTP">
						<button id='btn_getFormOTP' class="btn btn-primary btn-sm" type="button">
							Xác nhận
						</button>
					</span>
					<button type="button" class="btn btn-default btn-sm" data-bs-dismiss="modal" style="background: #f1f2f2;">
						Đóng
					</button>
				</div> -->
				<div class="modal-footer">
					<span id="btn_updatePass">
						<button style="background: #165c38;color: white" id='btn_updatePass' class="btn btn-primary btn-sm" type="button">
							Cập nhật
						</button>
					</span>
					<button type="button" class="btn btn-default btn-sm" data-bs-dismiss="modal" style="background: #f1f2f2;">
						Đóng
					</button>
				</div>
			</div>
		</form>
	</div>
</div>
</div>
<script>
	$(".passShowHide").click(function() {
        $(this).toggleClass('fa-eye-slash', 'fa-eye');
        if ($(".passShowHide").hasClass('fa-eye-slash')) {
            $("#password_old").attr('type', 'text');
        } else {
            $("#password_old").attr('type', 'password');
        }
    });
    $(".passwordretypechangeShowHide").click(function() {
        $(this).toggleClass('fa-eye-slash', 'fa-eye');
        if ($(".passwordretypechangeShowHide").hasClass('fa-eye-slash')) {
            $("#password_retype_change").attr('type', 'text');
        } else {
            $("#password_retype_change").attr('type', 'password');
        }
    });
	$(".passwordnewShowHide").click(function() {
        $(this).toggleClass('fa-eye-slash', 'fa-eye');
        if ($(".passwordnewShowHide").hasClass('fa-eye-slash')) {
            $("#password_new").attr('type', 'text');
        } else {
            $("#password_new").attr('type', 'password');
        }
    });
    $("#password").focus(function(){
        $(".passShowHide").attr("style", "color: #000");
    })
	$("#password_new").focus(function(){
        $(".passShowHide").attr("style", "color: #000");
    })
    // $("#password").focusout(function(){
    //     $(".passShowHide").attr("style", "color: #fff");
    // })
    $("#password_retype_change").focus(function(){
        $(".passwordretypechangeShowHide").attr("style", "color: #000");
    })
</script>