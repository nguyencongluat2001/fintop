function JS_Library(baseUrl, module, controller) {
    this.module = module;
    this.baseUrl = baseUrl;
    this.controller = controller;
    NclLib.menuActive('.link-library');
    NclLib.loadding();
    this.urlPath = baseUrl + '/' + module + '/' + controller;
}
/**
 * Hàm load các sử kiện cho màn hình index
 *
 * @return void
 */
JS_Library.prototype.loadIndex = function () {
    var myClass = this;
    var oForm = 'form#frmLoadlist_library';
    myClass.loadLists('');
    $('.chzn-select').chosen({ height: '100%', width: '100%' });
}
/**
 * Load màn hình danh sách
 *
 * @param oForm (tên form)
 *
 * @return void
 */

// JS_Library.prototype.loadList = function (oForm) {
//     var myClass = this;
//     var url = this.urlPath + '/loadList';
//     var data = $(oForm).serialize();
//     $.ajax({
//         url: url,
//         type: "GET",
//         data: data,
//         success: function (arrResult) {
//             $("#table-container-library").html(arrResult);
//         }
//     });
// }
JS_Library.prototype.loadLists = function (cate) {
    var myClass = this;
    var url = this.urlPath + '/loadList';
    var data = 'cate=' + cate;
    data += '&_token=' + $('#frmLoadlist_library #_token').val();
    $.ajax({
        url: url,
        type: "GET",
        data: data,
        success: function (arrResult) {
            if(cate == ''){
                cate = 'TU_SACH_DAU_TU';
            }
            $(".link-menu-library").removeClass('active-menuClient active-menuClient_background');
            $(".link-menu-library-" + cate).addClass('active-menuClient active-menuClient_background');
            $("#table-container-library").html(arrResult);
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
JS_Library.prototype.seeVideo = function (id) {
    var url = this.urlPath + '/seeVideo';
    var myClass = this;
    var data = 'id=' + id;
    $.ajax({
        url: url,
        type: "GET",
        //cache: true,
        data: data,
        success: function (arrResult) {
            $('#videomodal').html(arrResult);
            $('#videomodal').modal('show');
        }
    });
}