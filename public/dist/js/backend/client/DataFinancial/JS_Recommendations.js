function JS_Recommendations(baseUrl, module, controller) {
    this.module = module;
    this.baseUrl = baseUrl;
    this.controller = controller;
    NclLib.loadding();
    this.urlPath = baseUrl + '/' + module + '/' + controller;
}
/**
 * Hàm load các sử kiện cho màn hình index
 *
 * @return void
 */
JS_Recommendations.prototype.loadIndex = function () {
    var myClass = this;
    NclLib.menuActive('.link-datafinancial');
    NclLib.menuActive('.link-recommendationsIndex');
    NclLib.menuActive_child('.link-recommendationsIndex');
    var oForm = 'form#frmLoadlist_recommendations';
    myClass.loadList(oForm);
}
/**
 * Load màn hình danh sách
 *
 * @param oForm (tên form)
 *
 * @return void
 */
JS_Recommendations.prototype.loadList = function (oForm) {
    var myClass = this;
    var url = this.urlPath + '/loadList_recommendations_tab';
    var data = $(oForm).serialize();
    $.ajax({
        url: url,
        type: "POST",
        data: data,
        success: function (arrResult) {
            $("#table-container-recommendations").html(arrResult);
            // $('#messages').scrollTop($('#messages')[0].scrollHeight);
            // if($("#frmLoadlist_recommendations #messages").hasClass('onload')){
            //     // onload
            //     JS_Recommendations.checkLogin();
            // }
            // $('#messages').scrollTop($('#messages')[0].scrollHeight);
          
            // setTimeout(function() { 
            //     JS_Recommendations.loadList(oForm)
            // }, 300000);
        }
    });
}
/**
 * Load màn hình danh sách box tất cả các trang
 *
 * @param oForm (tên form)
 *
 * @return void
 */
JS_Recommendations.prototype.loadList_box = function () {
    var myClass = this;
    var oForm = 'form#frmLoadlist_box';
    var url = this.urlPath + '/loadList_recommendations';
    var data = $(oForm).serialize();
    data += '&type='+ 'box';
    $.ajax({
        url: url,
        type: "POST",
        data: data,
        success: function (arrResult) {
            $("#table-container-box").html(arrResult);
            // $('#messages').scrollTop($('#messages')[0].scrollHeight);
          
            setTimeout(function() { 
                JS_Recommendations.loadList_box(oForm)
            }, 500000);
        }
    });
}
JS_Recommendations.prototype.checkLogin = function(){
    Swal.fire({
        title: 'Đăng nhập để xem tín hiệu V.I.P!',
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
JS_Recommendations.prototype.checkVIP = function(){
    Swal.fire({
        title: 'Dành cho Hội viên VIP!',
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
JS_Recommendations.prototype.openMessage = function(){
    var url = 'https://www.facebook.com/Fintopdata.vn?mibextid=LQQJ4dx';
     window.open(url, '_blank');
}
JS_Recommendations.prototype.openPhone = function(){
    var phone = 'tel:0862348886';
     window.open(phone,'_blank');
}
