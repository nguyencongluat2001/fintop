function JS_Client(baseUrl, module, controller) {
    // $("#collapsesupport").attr("class", "collapse show");
    // $("#main_support").attr("class", "active nav-item");
    // $("#child_support").attr("class", "active nav-item");
    this.module = module;
    this.baseUrl = baseUrl;
    this.controller = controller;
    NclLib.active('.link-client');
    this.urlPath = baseUrl + '/' + module + '/' + controller;
}

/**
 * Hàm load các sử kiện cho màn hình index
 *
 * @return void
 */
JS_Client.prototype.loadIndex = function () {
    var myClass = this;
    var oForm = 'form#frmClient_index';
    var oFormCreate = 'form#frmAdd';
    myClass.loadList(oForm);

    $(oForm).find('#btn_add').click(function () {
        myClass.add(oForm);
    });
    $('form#frmAdd').find('#btn_create').click(function () {
        myClass.store('form#frmAdd');
    })
    $(oForm).find('#btn_edit').click(function () {
        myClass.edit(oForm);
    });
    $('form#frmChangePass').find('#btn_changePass').click(function () {
        myClass.changePass(oForm);
    })
    $('form#frmChangePass').find('#btn_updatePass').click(function () {
        myClass.updatePass('form#frmChangePass');
    })
     // form load
     $(oForm).find('#role').change(function () {
        var page = $(oForm).find('#limit').val();
        var perPage = $(oForm).find('#cbo_nuber_record_page').val();
        myClass.loadList(oForm, page, perPage);
    });
    $(oForm).find('#txt_search').click(function () {
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
JS_Client.prototype.loadevent = function (oForm) {
    var myClass = this;
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
 * Hàm hiển thị modal
 *
 * @param oForm (tên form)
 *
 * @return void
 */
JS_Client.prototype.add = function (oForm) {
    var url = this.urlPath + '/createForm';
    var myClass = this;
    var data = $(oForm).serialize();
    $.ajax({
        url: url,
        type: "POST",
        //cache: true,
        data: data,
        success: function (arrResult) {
            $('#editmodal').html(arrResult);
            $('#editmodal').modal('show');
            $('.chzn-select').chosen({ height: '100%', width: '100%' });
            $('.chzn-select').trigger('chosen:updated');
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
JS_Client.prototype.store = function (oFormCreate) {
    var url = this.urlPath + '/create';
    var myClass = this;
    var formdata = new FormData();
    var check = myClass.checkValidate();
    if(check == false){
        return false;
    }
    var role = [];
    $('input[name="role"]:checked').each(function() {
        role.push(this.value); 
    });
    formdata.append('_token', $("#_token").val());
    formdata.append('id', $("#id").val());
    formdata.append('name', $("#name").val());
    formdata.append('email', $("#email").val());
    formdata.append('dateBirth', $("#dateBirth").val());
    formdata.append('phone', $("#phone").val());
    formdata.append('order', $("#order").val());
    formdata.append('address', $("#address").val());
    formdata.append('company', $("#company").val());
    formdata.append('position', $("#position").val());
    formdata.append('date_join', $("#date_join").val());
    formdata.append('id_personnel', $("#id_personnel").val());
    formdata.append('investment_time', $("#investment_time").val());
    formdata.append('investment_taste', $("#investment_taste").val());
    formdata.append('investment_company', $("#investment_company").val());
    formdata.append('account_tkck_vps', $("#account_tkck_vps").val());
    formdata.append('id_manage', $("#id_manage").val());
    formdata.append('role', role);
    if($("#frmAdd #status").is(':checked')){
        formdata.append('status', 1);
    }
    $('form#frmAdd input[type=file]').each(function () {
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
            if (arrResult['success'] == true) {
                  NclLib.alertMessageBackend('success', 'Thông báo', arrResult['message']);
                  $('#editmodal').modal('hide');
                  myClass.loadList(oFormCreate);

            } else {
                NclLib.successLoadding();
                NclLib.alerMesage('danger', 'Lỗi', 'Cập nhật thất bại');
            }
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
JS_Client.prototype.store_upgrade_ctv_sale = function (oFormCreate) {
    var url = this.urlPath + '/store_upgrade_ctv_sale';
    var myClass = this;
    var formdata = new FormData();
    formdata.append('_token', $("#_token").val());
    formdata.append('id', $("#id").val());
    formdata.append('id_personnel', $("#id_personnel").val());
    formdata.append('id_manage', $("#id_manage").val());
    $.ajax({
        url: url,
        type: "POST",
        data: formdata,
        dataType: 'json',
        cache: false,
        contentType: false,
        processData: false,
        success: function (arrResult) {
            if (arrResult['success'] == true) {
                  NclLib.alertMessageBackend('success', 'Thông báo', arrResult['message']);
                  $('#editmodal').modal('hide');
                  myClass.loadList(oFormCreate);

            } else {
                NclLib.successLoadding();
                NclLib.alertMessageBackend('danger', 'Thông báo', arrResult['message']);

                // NclLib.alerMesage('danger', 'Lỗi', arrResult['message']);
            }
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
JS_Client.prototype.upgradeAcc = function (oFormCreate) {
    var url = this.urlPath + '/create_upgradeAcc';
    var myClass = this;
    var formdata = new FormData();
    var check = myClass.checkValidate();
    if(check == false){
        return false;
    }
    formdata.append('_token', $("#_token").val());
    formdata.append('id', $("#id").val());
    formdata.append('account_type_vip', $("#account_type_vip").val());
    $.ajax({
        url: url,
        type: "POST",
        data: formdata,
        dataType: 'json',
        cache: false,
        contentType: false,
        processData: false,
        success: function (arrResult) {
            if (arrResult['success'] == true) {
                  NclLib.alertMessageBackend('success', 'Thông báo', arrResult['message']);
                  $('#editmodal').modal('hide');
                  myClass.loadList(oFormCreate);

            } else {
                NclLib.successLoadding();
                NclLib.alertMessageBackend('danger', 'Thông báo', arrResult['message']);

                // NclLib.alerMesage('danger', 'Lỗi', arrResult['message']);
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
JS_Client.prototype.loadList = function (oForm, numberPage = 1, perPage = 15) {
    var myClass = this;
    var url = this.urlPath + '/loadList';
    var data = 'search=' + $("#search").val();
    data += '&role=' +$("#role").val();
    data += '&offset=' + numberPage;
    data += '&limit=' + perPage;
    console.log(data)
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
            $(oForm).find('#cbo_nuber_record_page').val(perPage);
            var loadding = NclLib.successLoadding();
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
JS_Client.prototype.edit = function (id) {
    var url = this.urlPath + '/edit';
    var myClass = this;
    var data = 'chk_item_id=' + id;
    
    $.ajax({
        url: url,
        type: "GET",
        data: data,
        success: function (arrResult) {
            $('#editmodal').html(arrResult);
            $('#editmodal').modal('show');
            $('.chzn-select').chosen({ height: '100%', width: '100%' });
            $('.chzn-select').trigger('chosen:updated');
            // myClass.loadevent(oForm);
            
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
JS_Client.prototype.edit_data = function (id) {
    var url = this.urlPath + '/edit_data';
    var myClass = this;
    var data = '_token=' + $("#_token").val();
    data += '&id=' + id;
    $.ajax({
        url: url,
        type: "POST",
        data: data,
        success: function (arrResult) {
            $('#editmodal').html(arrResult);
            $('#editmodal').modal('show');
            $('.chzn-select').chosen({ height: '100%', width: '100%' });
            $('.chzn-select').trigger('chosen:updated');
            myClass.loadevent();
            
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
JS_Client.prototype.edit_upgradeAcc = function (id) {
    var url = this.urlPath + '/edit_upgradeAcc';
    var myClass = this;
    var data = 'chk_item_id=' + id;
    
    $.ajax({
        url: url,
        type: "GET",
        data: data,
        success: function (arrResult) {
            $('#editmodal').html(arrResult);
            $('#editmodal').modal('show');
            $('.chzn-select').chosen({ height: '100%', width: '100%' });
            $('.chzn-select').trigger('chosen:updated');
            // myClass.loadevent(oForm);
            
        }
    });
}
// Xoa mot doi tuong
JS_Client.prototype.delete = function (oForm) {
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
          var nameMessage = 'Bạn chưa chọn đối tượng để xóa!';
          var icon = 'warning';
          var color = '#f5ae67';
          NclLib.alerMesage(nameMessage,icon,color);
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
                                title: arrResult['message'],
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

/**
 * Thay đổi trạng thái
 */
JS_Client.prototype.changeStatus = function(id){
    var myClass = this;
    var url = myClass.urlPath + '/changeStatus';
    var data = '_token=' + $("#frmClient_index #_token").val();
    data += '&status=' + ($("#status_" + id).is(":checked") == true ? 0 : 1);
    data += '&id=' + id;
    $.ajax({
        url: url,
        type: "POST",
        data: data,
        success: function(arrResult){
            if(arrResult['success'] == true){
                NclLib.alertMessageBackend('success', 'Thông báo', arrResult['message']);
            }else{
                NclLib.alertMessageBackend('danger', 'Lỗi', arrResult['message']);
            }
            NclLib.successLoadding();
        }, error: function(e){
            console.log(e);
            NclLib.successLoadding();
        }
    });
}
/**
 * Check Validate
 */
JS_Client.prototype.checkValidate = function(){
    if ($("#name").val() == '') {
        var nameMessage = 'Tên người dùng không được để trống!';
        NclLib.alertMessageBackend('warning', 'Cảnh báo', nameMessage);
        $("#name").focus();
        return false;
    }
    if ($("#email").val() == '') {
        var nameMessage = 'Địa chỉ email không được để trống!';
        NclLib.alertMessageBackend('warning', 'Cảnh báo', nameMessage);
        $("#email").focus();
        return false;
    }
    if ($("#dateBirth").val() == '') {
        var nameMessage = 'Ngày sinh không được để trống!';
        NclLib.alertMessageBackend('warning', 'Cảnh báo', nameMessage);
        $("#dateBirth").focus();
        return false;
    }
    if ($("#phone").val() == '') {
        var nameMessage = 'Số điện thoại không được để trống!';
        NclLib.alertMessageBackend('warning', 'Cảnh báo', nameMessage);
        $("#phone").focus();
        return false;
    }
    // if ($("#order").val() == '') {
    //     var nameMessage = 'Số thứ tự không được để trống!';
    //     NclLib.alertMessageBackend('warning', 'Cảnh báo', nameMessage);
    //     $("#order").focus();
    //     return false;
    // }
    if ($("#id").val() == ''){
        // if ($("#password").val() == '') {
        //     var nameMessage = 'Mật khẩu không được để trống!';
        //     NclLib.alertMessageBackend('warning', 'Cảnh báo', nameMessage);
        //     $("#password").focus();
        //     return false;
        // }
        // if ($("#password_retype").val() == '') {
        //     var nameMessage = 'Chưa nhập mật khẩu xác nhận!';
        //     NclLib.alertMessageBackend('warning', 'Cảnh báo', nameMessage);
        //     $("#password_retype").focus();
        //     return false;
        // }
        // if($("#password").val() != $("#password_retype").val()){
        //     var nameMessage = 'Mật khẩu xác nhận không khớp';
        //     NclLib.alertMessageBackend('warning', 'Cảnh báo', nameMessage);
        //     $("#email").focus();
        //     return false;
        // }
        // formdata.append('password', $("#password").val());
    }
    if ($('input[name="is_checkbox_role"]:checked').val() == '') {
        var nameMessage = 'Quyền truy cập không được để trống!';
        NclLib.alertMessageBackend('warning', 'Cảnh báo', nameMessage);
        return false;
    }
}

/**
 * Sự kiện khi nhấn 2 lần vào dòng td để sửa
 */
function click2(id, type) {
    $(".td_"+type+"_" + id).removeAttr('ondblclick');
    var text = $("#span_"+type+"_" + id).html();
    $("#"+type+"_" + id).removeAttr('hidden');
    $("#span_"+type+"_" + id).html('<textarea name="'+type+'" id="'+type+'_' + id + '" rows="3">'+text+'</textarea>');
    $("#"+type+"_" + id).focus();
    $("#span_"+type+"_" + id).removeAttr('id');
    $("#"+type+"_" + id).focusout(function(){
        $(".td_"+type+"_" + id).attr('ondblclick', "click2('"+id+"', '"+type+"')");
        $("#"+type+"_" + id).attr('hidden', true);
        $(".span_"+type+"_" + id).attr('id', 'span_'+type+'_' + id);
        $(".span_"+type+"_" + id).html($("#"+type+"_" + id).val());
        if(text != $(".span_" + type + '_' + id).html()){
            JS_Client.updateUser(id, type, $(".span_" + type + '_' + id).html());
        }
    })
}
/**
 * Cập nhật khi ở màn hình hiển thị danh sách
 */
JS_Client.prototype.updateUser = function(id, column, value = '') {
    var myClass = this;
    var url = myClass.urlPath + '/updateUser';
    var data = 'id=' + id;
    data += '&_token=' + $('#frmUsers_index #_token').val();
    if(column == 'code_cp'){ data += '&code_cp=' + (column == 'code_cp' ? value : ""); }
    else if(column == 'order') {data += '&order=' + value}
    $.ajax({
        url: url,
        data: data,
        type: "POST",
        success: function (arrResult) {
            if (arrResult['success'] == true) {
                NclLib.alertMessageBackend('success', 'Thông báo', arrResult['message']);
                if(column == 'order'){
                    myClass.loadList('#frmUsers_index');
                }
            } else {
                NclLib.alertMessageBackend('danger', 'Lỗi', arrResult['message']);
                myClass.loadList('#frmUsers_index');
            }
        }, error: function(e){
            console.log(e);
            NclLib.successLoadding();
        }
    });
    $("#" + id).prop('readonly');
}
/**
 * Thay đổi dòng
 */
JS_Client.prototype.upNdown = function(type, id, _this){
    var row = $(_this).parents("tr:first");
    var myClass = this;
    var url = myClass.urlPath + '/upNdown';
    var data = {
        _token: $("#_token").val(),
        id: id,
        type: type
    };
    if(type == 'up'){
        $.ajax({
            url: url,
            data: data,
            type: "POST",
            success: function (arrResult) {
                if(arrResult['success'] == true){
                    row.insertBefore(row.prev());
                    $.each(arrResult, function(key, value) {
                        $("#span_order_" + key).html(value);
                    });
                }
            }, error: function(e){
                console.log(e);
                NclLib.successLoadding();
            }
        });
        // row.insertBefore(row.prev());
    }else{
        $.ajax({
            url: url,
            data: data,
            type: "POST",
            success: function (arrResult) {
                if(arrResult['success'] == true){
                    row.insertAfter(row.next());
                    $.each(arrResult, function(key, value) {
                        $("#span_order_" + key).html(value);
                    });
                }
            }, error: function(e){
                console.log(e);
                NclLib.successLoadding();
            }
        });
        // row.insertAfter(row.next());
    }
}
/**
 * Tìm kiếm
 */
JS_Client.prototype.search = function(){
    JS_Client.loadList();
}