<style>
    	.form-control:disabled{
		background-color:#ffffff
	}
</style>
<div class="modal-dialog modal-lg">
    <div class="modal-content card">
        <div class="modal-header">
            <h5 class="modal-title">Thông tin thanh toán</h5>
            <button type="button" class="btn btn-sm" data-bs-dismiss="modal" style="background: #f1f2f2;">
                X
            </button>
        </div>
        <div class="card-body">
            <p class="text-uppercase text-sm">Thông tin cơ bản</p>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <p for="example-text-input" class="form-control-label">Tên</p>
                        <input class="form-control" disabled type="text" value="{{!empty($data['name'])?$data['name']:''}}" name="name" id="name" placeholder="Nhập tên người dùng..." />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <p for="example-text-input" class="form-control-label">Địa chỉ Email</p>
                        <input class="form-control" disabled type="email" value="{{!empty($data['email'])?$data['email']:''}}" name="email" id="email" placeholder="Nhập email..." />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <p for="example-text-input" class="form-control-label">Ngày sinh</p>
                        <input class="form-control" disabled type="date" value="{{!empty($data['dateBirth'])?$data['dateBirth']:''}}" name="dateBirth" id="dateBirth" placeholder="Chọn ngày sinh..." />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <p for="example-text-input" class="form-control-label">Số điện thoại</p>
                        <input class="form-control" disabled type="text" value="{{!empty($data['phone'])?$data['phone']:''}}" name="phone" id="phone" placeholder="Nhập số điện thoại..." />
                    </div>
                </div>
            </div>
            <hr class="horizontal dark">
            <p class="text-uppercase text-sm">Thông tin liên lạc</p>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <p for="example-text-input" class="form-control-label">Địa chỉ</p>
                        <input class="form-control" disabled type="text" value="{{!empty($data['address'])?$data['address']:''}}" name="address" id="address" placeholder="Nhập địa chỉ..." />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <p for="example-text-input" class="form-control-label">Gia nhập ngày</p>
                        <input class="form-control" disabled type="date" value="{{!empty($data['date_join'])?$data['date_join']:''}}" name="date_join" id="date_join">
                    </div>
                </div>
            </div>
            <hr class="horizontal dark">
            <p class="text-uppercase text-sm">Giao dịch thành công qua 
            @if($type_payment == 'BANK')
               Ngân hàng
            @else
              Ví MoMo
            @endif                    
            </p>
            <div class="row">
                <div class="col-md-12">
                    <div class="modal-body">
                        <img id="show_img" src="{{url('/file-payment/')}}/{{$approvePayment}}" alt="Image" style="width:250px">
                    </div>
                </div>
            </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-sm" data-bs-dismiss="modal" style="background: #f1f2f2;">
                        Đóng
                    </button>
                </div>
            </div>
            
        </div>
    </div>
</div>
                
