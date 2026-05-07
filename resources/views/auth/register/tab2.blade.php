<style>
    .table>:not(caption)>*>*{
        border-bottom-width: 0;
    }
    #tableData{
        color: #fff;
    }
    .passShowHide, .repassShowHide {
        position: absolute;
        top: 13px;
        right: 20px;
        cursor: pointer;
    }
    .passShowHide{
        color: #000;
    }
    .repassShowHide{
        color: #000;
    }
</style>
<div class="card" style="background:#000000f5;">
    <div class="form-group" align="center">
        <div class="col-md-12 mt-4 mb-3">
            <h3 class="text-uppercase" style="font-family: Serif;color:#ffffff">Thông tin tài khoản</h3>
        </div>
    </div>
    <div class="card-body">
        {{--<div class="row">
            <div class="form-wrapper col-md-4">
                <label for="">Thời gian đầu tư <span class="request_star">*</span></label>
                <select name="investment_time" id="investment_time" class="form-control chzn-select">
                    <option value="0-3">0 - 3 tháng</option>
                    <option value="3-6">3 - 6 tháng</option>
                    <option value="6-12">6 - 12 tháng</option>
                    <option value="1nam"> 1 năm</option>
                </select>
            </div>
            <div class="form-wrapper col-md-4">
                <select name="investment_taste" id="investment_taste" class="form-control chzn-select">
                    <option value="nganhan">Lướt sóng ngắn hạn</option>
                    <option value="daihan">Trung và dài hạn</option>
                    <option value="linhhoat">Linh hoạt kết hợp</option>
                </select>
            </div>
            <div class="form-wrapper col-md-4">
                <label for="">Công ty chứng khoán <span class="request_star">*</span></label>
                <select name="investment_company" id="investment_company" class="form-control chzn-select">
                    <option value="TKCK">Chưa TKCK</option>
                    <option value="vps">VPS</option>
                    <option value="ssi">SSI</option>
                    <option value="vnd">VND</option>
                    <option value="khac">Công ty khác</option>
                </select>
            </div>
        </div>--}}
        <table class="table" id="tableData">
            <colgroup>
                <col width="18%">
                <col width="17%">
                <col width="16%">
                <col width="16%">
                <col width="16%">
                <col width="17%">
            </colgroup>
            <tbody>
                <tr>
                    <td><label for="">Thời gian đầu tư <span class="request_star">*</span></label></td>
                    <td><label><input type="radio" id="investment_time" name="investment_time" value="0-3"> 0 - 3 tháng</label></td>
                    <td><label><input type="radio" id="investment_time" name="investment_time" value="3-6"> 3 - 6 tháng</label></td>
                    <td><label><input type="radio" id="investment_time" name="investment_time" value="6-12"> 6 - 12 tháng</label></td>
                    <td><label><input type="radio" id="investment_time" name="investment_time" value="1nam"> Trên 1 năm</label></td>
                </tr>
                <tr>
                    <td><label for="">Khẩu vị đầu tư <span class="request_star">*</span></label></td>
                    <td><label><input type="radio" id="investment_taste" name="investment_taste" value="nganhan"> Lướt sóng ngắn hạn</label></td>
                    <td><label><input type="radio" id="investment_taste" name="investment_taste" value="daihan"> Trung và dài hạn</label></td>
                    <td><label><input type="radio" id="investment_taste" name="investment_taste" value="linhhoat"> Linh hoạt kết hợp</label></td>
                </tr>
                <tr>
                    <td><label for="">Công ty chứng khoán <span class="request_star">*</span></label></td>
                    <td><label><input type="radio" id="investment_company" name="investment_company" value="TKCK"> Chưa TKCK</label></td>
                    <td><label><input type="radio" id="investment_company" name="investment_company" value="vps"> VPS</label></td>
                    <td><label><input type="radio" id="investment_company" name="investment_company" value="ssi"> SSI</label></td>
                    <td><label><input type="radio" id="investment_company" name="investment_company" value="vnd"> VND</label></td>
                    <td><label><input type="radio" id="investment_company" class="company-other" name="investment_company" value="khac"> Công ty khác</label>
                        <!-- <label><input type="text" style="display: none;" id="company-other" name="company-other"></label></td> -->
                </tr>
            </tbody>
        </table>
        <div class="row">
            <div class="form-wrapper col-md-4">
                <label for="">Nhập số TKCK VPS (nếu có)</label>
                <div style="position: relative;">
                    <input placeholder="Nhập số TKCK VPS (nếu có)" id="account_tkck_vps" type="text" class="form-control" name="account_tkck_vps" value="">
                    <!-- <span><i class="passShowHide fas fa-eye"></i></span> -->
                </div>
            </div>
            <div class="form-wrapper col-md-4">
                <label for="">Đặt mật khẩu <span class="request_star">*</span></label>
                <div style="position: relative;">
                    <input placeholder="Nhập mật khẩu..." id="password" type="password" class="form-control" name="password" value="">
                    <span><i class="passShowHide fas fa-eye"></i></span>
                </div>
            </div>
            <div class="form-wrapper col-md-4">
                <label for="">Nhập lại mật khẩu <span class="request_star">*</span></label>
                <div style="position: relative;">
                    <input placeholder="Nhập lại mật khẩu" id="repass" type="password" class="form-control" name="repass" value="">
                    <span><i class="repassShowHide fas fa-eye"></i></span>
                </div>
            </div>
        </div>
        <div class="form-group" style="display: flex;justify-content: center;">
            <button type="button" class="btn-primary me-3 ms-0" style="background-color: slategrey" onclick="JS_Register.Tab1()">Quay lại</button>
            <button type="button" class="btn-primary me-0 ms-0" style="background-color: #529845" onclick="JS_Register.Tab3()">Tiếp tục</button>
        </div>
    </div>
</div>
<script>
    $("input[name='investment_company']").click(function(){
        if($(this).hasClass('company-other')){
            $("#company-other").show();
            $("#company-other").focus();
        }else{
            $("#company-other").hide();
        }
    });
    $(".passShowHide").click(function() {
        $(this).toggleClass('fa-eye-slash', 'fa-eye');
        if ($(".passShowHide").hasClass('fa-eye-slash')) {
            $("#password").attr('type', 'text');
        } else {
            $("#password").attr('type', 'password');
        }
    });
    $(".repassShowHide").click(function() {
        $(this).toggleClass('fa-eye-slash', 'fa-eye');
        if ($(".repassShowHide").hasClass('fa-eye-slash')) {
            $("#repass").attr('type', 'text');
        } else {
            $("#repass").attr('type', 'password');
        }
    });
    $("#password").focus(function(){
        $(".passShowHide").attr("style", "color: #000");
    })
    // $("#password").focusout(function(){
    //     $(".passShowHide").attr("style", "color: #fff");
    // })
    $("#repass").focus(function(){
        $(".repassShowHide").attr("style", "color: #000");
    })
    // $("#repass").focusout(function(){
    //     $(".repassShowHide").attr("style", "color: #fff");
    // })
</script>