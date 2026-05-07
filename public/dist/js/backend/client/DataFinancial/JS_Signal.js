function JS_Signal(baseUrl, module, controller) {
    this.module = module;
    this.baseUrl = baseUrl;
    this.controller = controller;
    NclLib.menuActive('.link-datafinancial');
    NclLib.loadding();
    this.urlPath = baseUrl + '/' + module + '/' + controller;
}
/**
 * Hàm load các sử kiện cho màn hình index
 *
 * @return void
 */
JS_Signal.prototype.loadIndex = function () {
    var myClass = this;
    NclLib.menuActive('.link-signalIndex');
    NclLib.menuActive_child('.link-signalIndex');
    var oForm = 'form#frmLoadlist_signal';
    myClass.loadList(oForm);
}
/**
 * Load màn hình danh sách
 *
 * @param oForm (tên form)
 *
 * @return void
 */
JS_Signal.prototype.loadList = function (oForm) {
    var myClass = this;
    var url = this.urlPath + '/loadList_signal';
    var data = $(oForm).serialize();
    data += '&_token=' +  $('#_token').val();
    data += '&limit=' +  5;
    $.ajax({
        url: url,
        type: "POST",
        data: data,
        success: function (arrResult) {
            $("#table-container-signal").html(arrResult);
            // if($("#frmLoadlist_signal #table-data").hasClass('onload')){
            //     // onload
            //     JS_Signal.checkLogin();
            // }
            // setTimeout(function() { 
            //     JS_Signal.loadList(oForm)
            // }, 300000);
        }
    });
}
JS_Signal.prototype.checkVIP = function(){
    Swal.fire({
        width: '620px',
        title: 'Dành cho Hội viên VIP!',
        allowOutsideClick: false,
        allowEscapeKey: false,
        showCloseButton: true,
        confirmButtonText: "Đăng ký",
        confirmButtonColor: "rgb(31 140 64)",
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.replace('/client/privileges/index');
        }
    })
    $(".swal2-modal").css('background-color', 'rgb(112 14 14)');
    $(".swal2-modal").css('color', '#ffffff');
    $(".swal2-modal").css('font-size', '15px');
    $(".swal2-modal").css('font-family', 'FontAwesome');
}
JS_Signal.prototype.checkLogin = function(){
    Swal.fire({
        title: 'Đăng nhập để xem TOP cổ phiếu!',
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

/**
 * Hàm hiển thị modal thanh toán 
 *
 * @param oForm (tên form)
 *
 * @return void
 */
JS_Signal.prototype.view_chart = function () {
    var status = ''
    $('input[name="view_chart"]:checked').each(function() {
        status =  $(this).val();
    });

    if(status=='on'){
        $('#bank').removeClass("hiddel");
        $('#bank').addClass("show");
    }
    else{
        $('#bank').removeClass("show");
        $('#bank').addClass("hiddel");
    }
}