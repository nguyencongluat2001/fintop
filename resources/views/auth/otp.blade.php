
<form id="frmOtp"  role="form" action="" method="POST" >
@csrf
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div  class="modal-dialog  modal-lg">
        <div class="modal-content card">
            <div class="modal-header">
                <h5 class="modal-title">Xác nhận đăng ký tài khoản</h5>
            </div>
            <div class="modal-body" style="padding:15px">
                <div class="row form-group" id="otp">
                    <span class="col-md-3 control-label required" style="color:red">Thông báo</span>
                    <div class="col-md-8">
                    <span> Chúng tôi đã gửi mã otp qua số điện thoại 0930930038 . vui lòng kiểm tra tin nhắn. Xin cảm ơn!</span>
                    </div>
                </div>
                <div class="row form-group" id="otp">
                    <span class="col-md-3 control-label required">Mã OTP</span>
                    <div class="col-md-8">
                        <input class="form-control" type="text" value="" name="otp" id="otp"
                            placeholder="Nhập Mã OTP..." />
                    </div>
                </div>
                <div class="modal-footer">
                    <span id="btupdate">
                        <button type="button" class="btn btn-primary" id="btn_register" style="background-color: slategrey">
                                    {{ __('Đăng ký') }}
                                </button>
                    </span>
                    <button type="button" class="btn btn-default btn-sm" data-bs-dismiss="modal">
                        Đóng
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
