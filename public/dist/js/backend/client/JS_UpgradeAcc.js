function JS_UpgradeAcc(baseUrl, module, controller, type = '') {
    this.module = module;
    this.baseUrl = baseUrl;
    this.controller = controller;
    if(type != 'home'){
        NclLib.menuActive('.link-privileges');
    }
    NclLib.loadding();
    this.urlPath = baseUrl + '/' + module + '/' + controller;
}
/**
 * Hàm load các sử kiện cho màn hình index
 *
 * @return void
 */
JS_UpgradeAcc.prototype.loadIndex = function () {
    var myClass = this;
    var oForm = 'form#frmAdd_updateAcc';
    $(oForm).find('#updateVip').click(function () {
        myClass.updateVip(oForm);
    });
    myClass.loadevent(oForm);
}
JS_UpgradeAcc.prototype.loadevent = function (oForm) {
    var myClass = this;
    $('form#frmAdd_updateAcc').find('#updateVip').click(function () {
        myClass.updateVip(oForm);
    });
   
}
/**
 * Hàm hiển thị modal
 *
 * @param oForm (tên form)
 *
 * @return void
 */
JS_UpgradeAcc.prototype.viewForm = function (vip) {
    var url = this.urlPath + '/viewForm';
    var myClass = this;
    NclLib.loadding();
    // var data = 'id=' + id;
    var data = 'vip=' + vip;
    $.ajax({
        url: url,
        type: "GET",
        //cache: true,
        data: data,
        success: function (arrResult) {
            if(arrResult.status == 2){
                // Swal.fire({
                //     position: 'top-start',
                //     // icon: 'warning',
                //     title: arrResult.message,
                //     showConfirmButton: false,
                //     timer: 3000
                //   })
                // return false;
                $('#formmodal').html(arrResult);
                $('#formmodal').modal('show');
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
/**
 * Hàm hiển thị modal
 *
 * @param oForm (tên form)
 *
 * @return void
 */
JS_UpgradeAcc.prototype.viewInfo = function (vip) {
    var url = this.urlPath + '/viewInfo';
    var myClass = this;
    NclLib.loadding();
    // var data = 'id=' + id;
    var data = 'vip=' + vip;
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
                $('#formmodal').html(arrResult);
                $('#formmodal').modal('show');
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
JS_UpgradeAcc.prototype.viewFormContact = function () {
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
/**
 * Hàm hiển thị modal
 *
 * @param oForm (tên form)
 *
 * @return void
 */
JS_UpgradeAcc.prototype.viewFormContact_zalo = function () {
    var url = this.urlPath + '/viewFormContact_zalo';
    var myClass = this;
    console.log(url)
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
                $('#formmodal').html(arrResult);
                $('#formmodal').modal('show');
            }
        }
    });
}
/**
 * Hàm hiển thêm mới
 *
 * @param oForm (tên form)
 *
 * @return void
 */
JS_UpgradeAcc.prototype.updateVip = function (oForm) {
    var url = this.urlPath + '/updateVip';
    var myClass = this;
    NclLib.loadding();
    var formdata = new FormData();
    if($("input[type='radio'].radioBtnClass:checked").val()){
        console.log($(this).val());

    }
    formdata.append('_token', $("#_token").val());
    formdata.append('id_user', $("#id").val());
    formdata.append('wrap', $("#wrap").val());
    formdata.append('package', this.package);
    $('form#frmAdd_updateAcc input[type=file]').each(function () {
        var count = $(this)[0].files.length;
        for (var i = 0; i < count; i++) {
            formdata.append('file-attack-' + i, $(this)[0].files[i]);
        }
    });

    $.ajax({
        url: url,
        type: "POST",
        data: formdata,
        dataType: 'json',
        cache: false,
        contentType: false,
        processData: false,
        success: function (arrResult) {
            if (arrResult['data']['success'] == true) {
                //   Swal.fire({
                //     position: 'top-start',
                //     icon: 'success',
                //     title: 'Gửi yêu cầu phê duyệt thành công!, vui lòng chờ phê duyệt từ FinTop.',
                //     showConfirmButton: false,
                //     timer: 5000
                //   })
                //   $('#formmodal').modal('hide');
                  $('#formmodal').modal('hide');
                  $('#formmodal_res').html(arrResult['html']);
                  $('#formmodal_res').modal('show');
                  
                  $('.btn-close-res').click(function(){
                    $('#formmodal_res').modal('hide');
                  });
                //   myClass.loadList(oForm);

            } else {
                Swal.fire({
                    position: 'top-start',
                    icon: 'warning',
                    title: arrResult['message'],
                    showConfirmButton: false,
                    timer: 3000
                  })
            }
        }
    });
}
/**
 * Hàm hiển thị phuong thuc thanh toan
 *
 * @param oForm (tên form)
 *
 * @return void
 */
JS_UpgradeAcc.prototype.getTypeBank = function (package) {
    this.package = package;
}
JS_UpgradeAcc.prototype.checkLogin = function(){
    Swal.fire({
        title: 'Đăng nhập để nâng cấp tài khoản!',
        showCloseButton: true,
        confirmButtonText: "Đăng nhập",
        confirmButtonColor: "rgb(31 140 64)",
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.replace('/login');
        }
    })
    $(".swal2-modal").css('background-color', 'rgb(112 14 14)');
    $(".swal2-modal").css('color', '#ffffff');
    $(".swal2-modal").css('font-size', '15px');
    $(".swal2-modal").css('font-family', 'FontAwesome');
}