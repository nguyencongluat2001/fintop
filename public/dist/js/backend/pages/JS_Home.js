function JS_Home(baseUrl, module, controller) {
    this.module = module;
    this.baseUrl = baseUrl;
    this.controller = controller;
    NclLib.active('.link-home');
    this.urlPath = baseUrl + '/' + module + '/' + controller;//Biên public lưu tên module
}
JS_Home.prototype.alerMesage = function(nameMessage,icon,color){
    Swal.fire({
        position: 'top-start',
        icon: icon,
        title: nameMessage,
        color: color,
        showConfirmButton: false,
        width:'30%',
        timer: 2500
      })
}

/**
 * Hàm load các sử kiện cho màn hình index
 *
 * @return void
 */
JS_Home.prototype.loadIndex = function () {
    var myClass = this;
    // $('.chzn-select').chosen({ height: '100%', width: '100%' });
    var oForm = 'form#frmHome_index';
    var oFormCreate = 'form#frmAdd';
    // myClass.loadList(oForm);
    // myClass.loadListTap1(oForm);

    $(oForm).find('#btn_add').click(function () {
        myClass.add(oForm);
    });
    $('form#frmAdd').find('#btn_create').click(function () {
        myClass.store('form#frmAdd');
    })
    $(oForm).find('#btn_edit').click(function () {
        myClass.edit(oForm);
    });
     // form load
     $(oForm).find('#type_code').change(function () {
        var page = $(oForm).find('#limit').val();
        var perPage = $(oForm).find('#cbo_nuber_record_page').val();
        myClass.loadList(oForm, page, perPage);
    });
    $(oForm).find('#txt_search').click(function () {
        /* ENTER PRESSED*/
            var page = $(oForm).find('#limit').val();
            var perPage = $(oForm).find('#cbo_nuber_record_page').val();
            myClass.loadList(oForm, page, perPage);
            // return false;
        
    });
    // Xoa doi tuong
    $(oForm).find('#btn_delete').click(function () {
        myClass.delete(oForm)
    });
}
JS_Home.prototype.loadevent = function (oForm) {
    var myClass = this;
    // jQuery(document).ready(function ($) {
    //     jQuery('div[data-ace-editor-id]').each(function () {
    //         new PHPEditor(this);
    //     });
    // });
    $('form#frmAdd').find('#btn_create').click(function () {
        myClass.store('form#frmAdd');
    })
}
/**
 * Hàm hiển thị modal
 *
 * @param oForm (tên form)
 *
 * @return void
 */
JS_Home.prototype.add = function (oForm) {
    var url = this.urlPath + '/createForm';
    var myClass = this;
    var data = $(oForm).serialize();
    // var search_Donvi = $('#search_Donvi').val();
    // var p_chk_obj = $('#table-data').find('input[name="chk_item_id"]');
    // var listitem = '';
    // var i = 0;
    // $('form#frmEditStatus').find('#unitSearch_pxSelect').change(function () {
    //     myClass.loadList(oForm, page, perPage);
    // });
    $.ajax({
        url: url,
        type: "POST",
        //cache: true,
        data: data,
        success: function (arrResult) {
            $('#editmodal').html(arrResult);
            $('#editmodal').modal('show');
            myClass.loadevent(oForm);

        }
    });
}
/**
 * Hàm hiển thêm mới
 *
 * @param oFormCreate (tên form)
 *
 * @return void
 */
JS_Home.prototype.store = function (oFormCreate) {
    var url = this.urlPath + '/create';
    var myClass = this;
    var data = $(oFormCreate).serialize();
    // var search_Donvi = $('#search_Donvi').val();
    // var p_chk_obj = $('#table-data').find('input[name="chk_item_id"]');
    // var listitem = '';
    // var i = 0;
    // $('form#frmEditStatus').find('#unitSearch_pxSelect').change(function () {
    //     myClass.loadList(oForm, page, perPage);
    // });
    if ($("#name").val() == '') {
        var nameMessage = 'Tên đối tượng không được để trống!';
        var icon = 'warning';
        var color = '#f5ae67';
        this.alerMesage(nameMessage,icon,color);
        return false;
    }
    if ($("#phone").val() == '') {
        var nameMessage = 'Số điện thoại không được để trống!';
        var icon = 'warning';
        var color = '#f5ae67';
        this.alerMesage(nameMessage,icon,color);
        return false;
    }
    if ($("#email").val() == '') {
        var nameMessage = 'Địa chỉ email không được để trống!';
        var icon = 'warning';
        var color = '#f5ae67';
        this.alerMesage(nameMessage,icon,color);
        return false;
    }
    if ($("#dateBirth").val() == '') {
        var nameMessage = 'Ngày sinh không được để trống!';
        var icon = 'warning';
        var color = '#f5ae67';
        this.alerMesage(nameMessage,icon,color);
        return false;
    }
    if ($("#password").val() == '') {
        var nameMessage = 'Mật khẩu không được để trống!';
        var icon = 'warning';
        var color = '#f5ae67';
        this.alerMesage(nameMessage,icon,color);
        return false;
    }
    // if ($("#role").val() == '') {
    //     var nameMessage = 'Quyền truy cập không được để trống!';
    //     var icon = 'warning';
    //     var color = '#f5ae67';
    //     this.alerMesage(nameMessage,icon,color);
    //     return false;
    // }
    $.ajax({
        url: url,
        type: "POST",
        //cache: true,
        data: data,
        success: function (arrResult) {
            if (arrResult['success'] == true) {
                Swal.fire({
                    position: 'top-start',
                    icon: 'success',
                    title: 'Cập nhật thành công',
                    showConfirmButton: false,
                    timer: 3000
                  })
               $('#editmodal').modal('hide');
               myClass.loadList(oFormCreate);

            } else {
                Swal.fire({
                    position: 'top-start',
                    icon: 'error',
                    title: 'Cập nhật thất bại',
                    showConfirmButton: false,
                    timer: 3000
                  })
            }
        }
    });
}
/**
 * Load màn hình danh sách
 *
 * @param oForm (tên form)
 *
 * @return void
 */
JS_Home.prototype.loadList = function (oForm, numberPage = 1, perPage = 15) {
    var myClass = this;
    // var loadding = NclLib.loadding();
    var url = this.urlPath + '/loadList';
    data = 'offset=' + numberPage;
    data += '&limit=' + perPage;
    var data = $(oForm).serialize();
    $.ajax({
        url: url,
        type: "GET",
        // cache: true,
        data: data,
        success: function (arrResult) {
            $("#table-container").html(arrResult);
            // phan trang
            $(oForm).find('.main_paginate .pagination a').click(function () {
                var page = $(this).attr('page');
                var perPage = $('#cbo_nuber_record_page').val();
                myClass.loadList(oForm, page, perPage);
            });
            $(oForm).find('#cbo_nuber_record_page').change(function () {
                var page = $(oForm).find('#_currentPage').val();
                var perPages = $(oForm).find('#cbo_nuber_record_page').val();
                myClass.loadList(oForm, page, perPages);
            });
            // loadding.go(100);
            myClass.loadevent(oForm);
        }
    });
}
/**
 * Load màn hình danh sách
 *
 * @param oForm (tên form)
 *
 * @return void
 */
JS_Home.prototype.loadListTap1 = function (oForm, numberPage = 1, perPage = 15) {
    var myClass = this;
    // var loadding = NclLib.loadding();
    var url = this.urlPath + '/loadListTap1';
    data = 'offset=' + numberPage;
    data += '&limit=' + perPage;
    var oForm = 'form#frmLoadlist_list_tap1'
    var data = $(oForm).serialize();
    $.ajax({
        url: url,
        type: "GET",
        // cache: true,
        data: data,
        success: function (arrResult) {
            (arrResult)
            $("#table-tap1-container").html(arrResult);
            // phan trang
            $(oForm).find('.main_paginate .pagination a').click(function () {
                var page = $(this).attr('page');
                var perPage = $('#cbo_nuber_record_page').val();
                myClass.loadListTap1(oForm, page, perPage);
            });
            $(oForm).find('#cbo_nuber_record_page').change(function () {
                var page = $(oForm).find('#_currentPage').val();
                var perPages = $(oForm).find('#cbo_nuber_record_page').val();
                myClass.loadListTap1(oForm, page, perPages);
            });
            // loadding.go(100);
            myClass.loadevent(oForm);
        }
    });
}
/**
 * Hàm hiển thị modal edit
 *
 * @param oForm (tên form)
 *
 * @return void
 */
JS_Home.prototype.edit = function (oForm) {
    var url = this.urlPath + '/edit';
    var myClass = this;
    var data = $(oForm).serialize();
    var listitem = '';
    var i = 0;
    var p_chk_obj = $('#table-data').find('input[name="chk_item_id"]');
    $(p_chk_obj).each(function () {
        if ($(this).is(':checked')) {
            if (listitem !== '') {
                listitem += ',' + $(this).val();
            } else {
                listitem = $(this).val();
            }
            i++;
        }
    });
    if (listitem == '') {
        // EfyLib.alertMessage('danger', "Chưa chọn hồ sơ để chuyển xử lý");
        Swal.fire({
            position: 'top-start',
            icon: 'warning',
            title: 'Bạn chưa chọn đối tượng!',
            color: '#f5ae67',
            showConfirmButton: false,
            width:'30%',
            timer: 2500
          })
        return false;
    }
    if (i > 1) {
        Swal.fire({
            position: 'top-start',
            icon: 'warning',
            title: 'Bạn chỉ được chọn một đối tượng!',
            color: '#f5ae67',
            showConfirmButton: false,
            width:'30%',
            timer: 2500
          })
        return false;
    }
    $.ajax({
        url: url,
        type: "POST",
        //cache: true,
        data: data,
        success: function (arrResult) {
            $('#editmodal').html(arrResult);
            $('#editmodal').modal('show');
            myClass.loadevent(oForm);

        }
    });
}
// Xoa mot doi tuong
JS_Home.prototype.delete = function (oForm) {
    var myClass = this;
    var listitem = '';
    var p_chk_obj = $('#table-data').find('input[name="chk_item_id"]');
    $(p_chk_obj).each(function () {
        if ($(this).is(':checked')) {
            if (listitem !== '') {
                listitem += ',' + $(this).val();
            } else {
                listitem = $(this).val();
            }
        }
    });
    if (listitem == '') {
        Swal.fire({
            position: 'top-start',
            icon: 'warning',
            title: 'Bạn chưa chọn đối tượng để xóa!',
            color: '#f5ae67',
            showConfirmButton: false,
            width:'30%',
            timer: 2500
          })
        return false;
    }
    var data = $(oForm).serialize();
    var url = this.urlPath + '/delete';
    Swal.fire({
        title: 'Bạn có chắc chắn xóa vĩnh viễn người dùng này không?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#34bd57',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Xác nhận'
      }).then((result) => {
        if(result.isConfirmed == true){
            $.ajax({
                url: url,
                type: "POST",
                dataType: 'json',
                data: {
                    _token: $('#_token').val(),
                    listitem: listitem,
                },
                success: function (arrResult) {
                    if (arrResult['success'] == true) {
                        if (result.isConfirmed) {
                            Swal.fire({
                                position: 'top-start',
                                icon: 'success',
                                title: 'Xóa thành công',
                                showConfirmButton: false,
                                timer: 3000
                              })
                              myClass.loadList(oForm);
                          }
                    } else {
                        if (result.isConfirmed) {
                            Swal.fire({
                                position: 'top-start',
                                icon: 'error',
                                title: 'Quá trình xóa đã xảy ra lỗi',
                                showConfirmButton: false,
                                timer: 3000
                              })
                          }
                    }
                }
            });
        }
      })
}