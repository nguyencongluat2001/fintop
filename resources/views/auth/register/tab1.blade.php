<div class="card" style="background:#000000f5;">
    <div class="form-group" align="center">
        <div class="col-md-12 mt-4 mb-3">
            <h3 class="text-uppercase" style="font-family: Serif;color:#ffffff">Thông tin cơ bản</h3>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="form-wrapper col-md-4">
                <label for="">Họ và tên <span class="request_star">*</span></label>
                <input placeholder="Nhập họ và tên..." id="name" type="text" class="form-control" name="name" value="">
            </div>
            <div class="form-wrapper col-md-4">
                <label for="">Email <span class="request_star">*</span></label>
                <input placeholder="Nhập Email..." id="email" type="email" class="form-control" name="email" onchange="JS_Register.checkEmail()">
            </div>
            <div class="form-wrapper col-md-4">
                <label for="">Số điện thoại <span class="request_star">*</span></label>
                <input placeholder="Nhập số điện thoại/Zalo..." id="phone" type="phone" class="form-control" name="phone" value="">
            </div>
            
        </div>
        <div class="row">
            <div class="form-wrapper col-md-4">
                <label for="">Sinh nhật <span class="request_star">*</span></label>
                <input id="dateBirth" type="date" class="form-control" name="dateBirth" value="" placeholder="dd/mm/yyyy">
            </div>
            <div class="form-wrapper col-md-8">
                <label for="">Địa chỉ <span class="request_star">*</span></label>
                <input placeholder="Nhập Tỉnh/TP hiện tại..." id="address" type="text" class="form-control" name="address" value="">
            </div>
        </div>
        <div class="row">
            <div class="form-wrapper col-md-4">
                <label for="">ID người giới thiệu</label>
                <input placeholder="Nhập ID giới thiệu..." onchange="JS_Register.getPersonnel()" id="code_introduce" type="text" class="form-control" name="code_introduce" @if(isset($data['user_introduce_id'])) readonly  style="color: #000;" @endif value="{{isset($data['user_introduce_id']) ? $data['user_introduce_id'] : ''}}">
            </div>
            <div class="form-wrapper col-md-4">
                <label for="">Tên người giới thiệu</label>
                <input style="cursor: unset;text-align: left;" placeholder="" readonly id="name_personnel" type="button" class="form-control" name="name_personnel" value="{{isset($data['user_introduce_name']) ? $data['user_introduce_name'] : ''}}">
            </div>
        </div>
        <!-- <div class="row">
            <div class="form-wrapper col-md-6">
                <label for="">ID người giới thiệu</label>
                <input placeholder="Nhập ID người giới thiệu..." onchange="JS_Register.getPersonnel()" id="code_introduce" type="text" class="form-control" name="code_introduce" value="">
            </div>
            <div class="form-wrapper col-md-6">
                <label for="">Tên người giới thiệu</label>
                <input placeholder="Tên người giới thiệu" readonly id="name_personnel" type="text" class="form-control" name="name_personnel" value="">
            </div>
        </div> -->
        <div class="form-group">
            <button type="button" class="btn-primary" style="background-color: #529845;" onclick="JS_Register.Tab2()">Tiếp tục</button>
        </div>
    </div>
</div>
<script src="{{URL::asset('assets/datepicker/bootstrap-datepicker.min.js')}}"></script>

<script>
    $( ".datepicker" ).datepicker({
        format: 'dd/mm/yyyy'
    });
</script>