function JS_InforClient(baseUrl, module, controller) {
    this.module = module;
    this.baseUrl = baseUrl;
    this.controller = controller;
    // NclLib.menuActive('.link-privileges');
    NclLib.loadding();
    this.urlPath = baseUrl + '/' + module + '/' + controller;
}
/**
 * Hàm load các sử kiện cho màn hình index
 *
 * @return void
 */
JS_InforClient.prototype.loadIndex = function () {
    var myClass = this;
    var oForm = 'form#frmLoadlist_infor';
    $(oForm).find('#btn_changePass').click(function () {
        myClass.changePass(oForm);
    })
    
    $('form#frmChangePass').find('#btn_getFormOTP').click(function () {
        myClass.sendOTPMAIL(oForm);
    })
    $('form#frmChangePass').find('#btn_updatePass').click(function () {
        myClass.updatePass('form#frmChangePass');
    })
    myClass.loadList(oForm);
    $("#upload-avatar").change(function(){
        myClass.uploadAvatar();
    });
}
// /**
//  * Load màn hình danh sách
//  *
//  * @param oForm (tên form)
//  *
//  * @return void
//  */
JS_InforClient.prototype.loadList = function (oForm) {
    var myClass = this;
    var url = this.urlPath + '/loadList';
    var data = $(oForm).serialize();
    $.ajax({
        url: url,
        type: "POST",
        data: data,
        success: function (arrResult) {
            $("#table-container-library").html(arrResult);
        }
    });
}
JS_InforClient.prototype.loadevent = function (oForm) {
    var myClass = this;
    
    $('form#frmChangePass').find('#btn_getFormOTP').click(function () {
        myClass.sendOTPMAIL(oForm);
    })
    $('form#frmAdd').find('#btn_create').click(function () {
        myClass.store('form#frmAdd');
    })
    $('form#frmAdd').find('#btn_changePass').click(function () {
        myClass.changePass('form#frmAdd');
    })
    $('form#frmChangePass').find('#btn_updatePass').click(function () {
        myClass.updatePass('form#frmChangePass');
    })
   
}
/**
 * Hàm hiển thị modal edit
 *
 * @param oForm (tên form)
 *
 * @return void
 */
JS_InforClient.prototype.changePass = function (oForm) {
    NclLib.loadding();
    var url = this.urlPath + '/changePass';
    var myClass = this;
    var data = $(oForm).serialize();
    $.ajax({
        url: url,
        type: "GET",
        data: data,
        success: function (arrResult) {
            $('#editPassmodal').html(arrResult);
            $('#editPassmodal').modal('show');
            myClass.loadevent(oForm);

        }
    });
}
/**
 * Cập nhật mật khẩu
 *
 * @param oFormCreate (tên form)
 *
 * @return void
 */
JS_InforClient.prototype.updatePass = function (oFormCreate) {
    NclLib.loadding();
    var url = this.urlPath + '/updatePass';
    var myClass = this;
    var data = $(oFormCreate).serialize();
    if ($("#password_old").val() == '') {
        var nameMessage = 'Mật khẩu cũ không được để trống!';
        var icon = 'warning';
        var color = '#f5ae67';
        NclLib.alerMesage(nameMessage,icon,color);
        return false;
    }
    if ($("#password_new").val() == '') {
        var nameMessage = 'Mật khẩu mới không được để trống!';
        var icon = 'warning';
        var color = '#f5ae67';
        NclLib.alerMesage(nameMessage,icon,color);
        return false;
    }
    if ($("#password_retype_change").val() == '') {
        var nameMessage = 'Chưa nhập lại mật khẩu mới!';
        var icon = 'warning';
        var color = '#f5ae67';
        NclLib.alerMesage(nameMessage,icon,color);
        return false;
    }
    $.ajax({
        url: url,
        type: "POST",
        //cache: true,
        data: data,
        success: function (arrResult) {
            if (arrResult['success'] == true) {
                var html = '<div class="col-md-6 pt-2"><div class="form-group"><p for="example-text-input" class="form-control-label">Mã OTP </p><input required class="form-control color" type="text" value="" name="otp" id="otp" /></div></div>'
                $("#iss").html(html);
                var nameMessage = arrResult['message'];
                var icon = 'success';
                var color = '#1bba00';
                NclLib.alerMesage(nameMessage,icon,color);
            }else if(arrResult['success'] == 3){
                var nameMessage = arrResult['message'];
                var icon = 'success';
                var color = '#1bba00';
                NclLib.alerMesage(nameMessage,icon,color);
                $('#editPassmodal').modal('hide');
                  myClass.loadList(oFormCreate);
            } else {
                  var nameMessage = arrResult['message'];
                  var icon = 'warning';
                  var color = '#f5ae67';
                  NclLib.alerMesage(nameMessage,icon,color);
            }
        }
    });
}
// check otp
JS_InforClient.prototype.sendOTPMAIL = function (oFormCreate) {
    var url = this.urlPath + '/updatePass';
    var myClass = this;
    var data = $(oFormCreate).serialize();
    if ($("#password_old").val() == '') {
        var nameMessage = 'Mật khẩu cũ không được để trống!';
        var icon = 'warning';
        var color = '#f5ae67';
        NclLib.alerMesage(nameMessage,icon,color);
        return false;
    }
    if ($("#password_new").val() == '') {
        var nameMessage = 'Mật khẩu mới không được để trống!';
        var icon = 'warning';
        var color = '#f5ae67';
        NclLib.alerMesage(nameMessage,icon,color);
        return false;
    }
    if ($("#password_retype_change").val() == '') {
        var nameMessage = 'Chưa nhập lại mật khẩu mới!';
        var icon = 'warning';
        var color = '#f5ae67';
        NclLib.alerMesage(nameMessage,icon,color);
        return false;
    }
    $.ajax({
        url: url,
        type: "POST",
        //cache: true,
        data: data,
        success: function (arrResult) {
            if (arrResult['success'] == true) {
                  var nameMessage = arrResult['message'];
                  var icon = 'success';
                  var color = '#f5ae67';
                  NclLib.alerMesage(nameMessage,icon,color);
            } else {
                  var nameMessage = arrResult['message'];
                  var icon = 'warning';
                  var color = '#f5ae67';
                  NclLib.alerMesage(nameMessage,icon,color);
            }
        }
    });
}
/**
 * Cập nhật thông tin cá nhân
 */
JS_InforClient.prototype.updateCustomer = function(){
    var myClass = this;
    NclLib.loadding();
    var url = myClass.urlPath + '/updateCustomer';
    var data = $("#frmLoadlist_infor").serialize();
    $.ajax({
        url: url,
        type: "POST",
        data: data,
        success: function(arrResult){
            if(arrResult['success'] == true){
                document.getElementById("name").setAttribute("disabled","disabled");
                document.getElementById("dateBirth").setAttribute("disabled","disabled");
                document.getElementById("address").setAttribute("disabled","disabled");
                document.getElementById("company").setAttribute("disabled","disabled");
                document.getElementById("position").setAttribute("disabled","disabled");
                document.getElementById("date_join").setAttribute("disabled","disabled");
                document.getElementById("investment_time").setAttribute("disabled","disabled");
                document.getElementById("investment_taste").setAttribute("disabled","disabled");
                document.getElementById("investment_company").setAttribute("disabled","disabled");
                document.getElementById("account_tkck_vps").setAttribute("disabled","disabled");
                document.getElementById("id_manage").setAttribute("disabled","disabled");
                document.getElementById("phone_id").setAttribute("disabled","disabled");
                document.getElementById("email_id").setAttribute("disabled","disabled");
                document.getElementById("editForm").style.display = "block";
                document.getElementById("update").style.display = "none";
                NclLib.alerMesage(arrResult['message'], 'success', '#1bba00');
            }else{
                NclLib.alerMesage(arrResult['message'], 'danger', '#bd2130');
            }
        }, error: function(e){
            console.log(e);
        }
    });
}
/**
 * Cập nhật thông tin cá nhân
 */
JS_InforClient.prototype.formEdit = function(){
    NclLib.loadding();
    document.getElementById("name").removeAttribute("disabled","disabled");
    document.getElementById("dateBirth").removeAttribute("disabled");
    document.getElementById("address").removeAttribute("disabled");
    document.getElementById("company").removeAttribute("disabled");
    document.getElementById("position").removeAttribute("disabled");
    document.getElementById("date_join").removeAttribute("disabled");
    document.getElementById("investment_time").removeAttribute("disabled");
    document.getElementById("investment_taste").removeAttribute("disabled");
    document.getElementById("investment_company").removeAttribute("disabled");
    document.getElementById("account_tkck_vps").removeAttribute("disabled");
    document.getElementById("id_manage").removeAttribute("disabled");
    document.getElementById("phone_id").removeAttribute("disabled");
    document.getElementById("email_id").removeAttribute("disabled");
    document.getElementById("editForm").style.display = "none";
    document.getElementById("update").style.display = "block";
}
/**
 * Cập nhật thông tin cá nhân
 */
JS_InforClient.prototype.notivalidate = function(){
    NclLib.alerMesage('Không thể tự sửa. Anh/chị vui lòng liên hệ FinTop để được hỗ trợ.', 'warning', '#f5ae67');
}

JS_InforClient.prototype.uploadAvatar = function(){
    var myClass = this;
    var url = myClass.urlPath + '/uploadAvatar';
    var data = new FormData;
    data.append('_token', $("#_token").val());
    data.append('id', $("#id").val());
    data.append('upload', $("#upload-avatar")[0].files[0]);
    $.ajax({
        url: url,
        data: data,
        type: 'POST',
        cache: false,
        contentType: false,
        processData: false,
        success: function(arrResult){
            $("#upload-avatar").val('');
            if(arrResult['success']){
                $("#avatar").attr('src', arrResult['data']['url']);
                NclLib.alerMesage(arrResult['message'], 'success', '#1bba00');
            }else{
                var nameMessage = arrResult['message'];
                var icon = 'warning';
                var color = '#f5ae67';
                NclLib.alerMesage(nameMessage,icon,color);
            }
        }
    });
}
/**
 * Thông tin người giới thiệu
 */
JS_InforClient.prototype.getPersonnel = function () {
    var oForm = '#frmLoadlist_infor';
    var myClass = this;
    var url = myClass.urlPath + '/getUser';
    var myClass = this;
    var data = '_token=' + $(oForm).find("#_token").val();
    data += '&code_introduce=' + $(oForm).find("#id_manage").val();
    $.ajax({
        url: url,
        type: "POST",
        //cache: true,
        data: data,
        success: function (arrResult) {
            if (arrResult['success'] == true) {
                $("#name_personnel").val(arrResult['data']['name']);
                
          } else if (arrResult['success'] == false) {
            Swal.fire({
                position: 'top-end',
                icon : 'warning',
                title: arrResult.message,
                showConfirmButton: false,
                timer: 3000
              })
          }

        }
    });
}
/**
 * Hàm hiển thị modal
 *
 * @param oForm (tên form)
 *
 * @return void
 */
JS_InforClient.prototype.viewFormContact = function () {
    var url = this.urlPath + '/viewFormContact';
    var myClass = this;
    NclLib.loadding();
    var data = '';
    $.ajax({
        url: url,
        type: "GET",
        //cache: true,
        data: data,
        success: function (arrResult) {
            if(arrResult.status == 2){
                Swal.fire({
                    position: 'top-start',
                    // icon: 'warning',
                    title: arrResult.message,
                    showConfirmButton: false,
                    timer: 3000
                  })
                return false;
            }else{
                $('#formmodal_res').html(arrResult);
                $('#formmodal_res').modal('show');
                $('#formmodal').modal('hide');
                $('.modal').css('overflow-y', 'auto');
                $('.btn-close-res').click(function(){
                    $('#formmodal_res').html('');
                    $('#formmodal_res').modal('hide');
                    $('#formmodal').modal('show');
                    $('.modal').css('overflow-y', 'auto');
                });
            }
        }
    });
}