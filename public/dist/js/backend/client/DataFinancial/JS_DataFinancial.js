function JS_DataFinancial(baseUrl, module, controller) {
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
JS_DataFinancial.prototype.loadIndex = function () {
    var myClass = this;
    NclLib.menuActive('.link-index');
    NclLib.menuActive_child('.link-index');
    // $('.chzn-select').chosen({ height: '100%', width: '100%' });
    var oForm = 'form#frmSearchCP';
    var oFormData = 'form#frmLoadlist_data';
    myClass.index();
    myClass.loadData(oFormData);
    $(oForm).find('#search_code_CP').click(function () {
        myClass.searchDataCP(oForm);
    });
}
JS_DataFinancial.prototype.loadevent = function (oForm) {
    var myClass = this;
    $('form#frmAdd').find('#btn_create').click(function () {
        myClass.store('form#frmAdd');
    })
    $('form#frmVideo').find('#btn_create').click(function () {
        myClass.store('form#frmVideo');
    })
}
/**
 * Hàm hiển thị modal
 *
 * @param oForm (tên form)
 *
 * @return void
 */
JS_DataFinancial.prototype.fireAntChart = function () {
    var url = this.urlPath + '/fireAntChart';
    // var myClass = this;
    var oForm = 'form#frmDataFinancial_index';

    var data = $(oForm).serialize();
    data += '&_token=' + $('#_token').val();

    $.ajax({
        url: url,
        type: "POST",
        //cache: true,
        data: data,
        success: function (arrResult) {
            $('#editmodal_fireAnt').html(arrResult);
            $('#editmodal_fireAnt').modal('show');
            myClass.loadevent(oForm);

        }
    });
}

/**
 * Thêm một dòng mới trên danh sách
 */
JS_DataFinancial.prototype.addrow = function (arrResult) {
    var id = broofa();
    // var created_at = moment(arrResult.created_at).format('DD/MM/YYYY');
    var html = '';
    // stt
    html += '<td style="vertical-align: middle;" align="center">' + arrResult.id + '</td>';
    // code_cp
    html += '<td style="vertical-align: middle;" align="center" class="tdfull td_code_cp_' + arrResult.id + '" ondblclick="click2(\'' + arrResult.id + '\', \'code_cp\')">';
    html += '<span id="span_code_cp_' + arrResult.id + '" class="text-success text-uppercase fw-bold span_code_cp_' + arrResult.id + '" onclick="click2(\'' + arrResult.id + '\', \'code_cp\',this)">' + arrResult.code_cp + '</span>';
    html += '</td>';
    // exchange
    html += '<td class="td_exchange_' + arrResult.id + '" style="vertical-align: middle;" align="center">';
    html += '<span id="span_exchange_' + arrResult.id + '" class="span_exchange_' + arrResult.id + '">' + arrResult.exchange + '</span>';
    html += '</td>';
    // code_category
    html += '<td class="td_code_category_' + arrResult.id + '" style="vertical-align: middle;" align="center">';
    html += '<span id="span_code_category_' + arrResult.id + '" class="span_code_category_' + arrResult.id + '">' + arrResult.code_category + '</span>';
    html += '</td>';
    // created_at
    html += '<td class="td_created_at_' + arrResult.id + '" style="vertical-align: middle;" align="center">';
    html += '<span id="span_created_at_' + arrResult.id + '" class="span_created_at_' + arrResult.id + '">' + arrResult.created_at + '<br>' + arrResult.created_at_day +'</span>';
    html += '</td>';
    // ratings_TA
    html += '<td class="td_ratings_TA_' + arrResult.id + '" style="vertical-align: middle;color:#ff7c00" align="center">';
    html += '<span id="span_ratings_TA_' + arrResult.id + '" class="span_ratings_TA_' + arrResult.id + '"><b>' + arrResult.ratings_TA + '</b></span>';
    html += '</td>';
    // identify_trend
    html += '<td class="td_identify_trend_' + arrResult.id + '" style="vertical-align: middle;background:#a3f1fe5e" align="center">';
    html += '<span id="span_identify_trend_' + arrResult.id + '" class="span_identify_trend_' + arrResult.id + '">' + arrResult.identify_trend + '</span>';
    html += '</td>';
    // act
    html += '<td class="td_act_' + arrResult.id + '" style="vertical-align: middle;background:#ffb75c" align="center">';
    html += '<span id="span_act_' + arrResult.id + '" class="span_act_' + arrResult.id + '"><b>' + arrResult.act + '</b></span>';
    html += '</td>';
    // trading_price_range
    html += '<td class="td_trading_price_range_' + arrResult.id + '" style="vertical-align: middle;" align="center">';
    html += '<span id="span_trading_price_range_' + arrResult.id + '" class="span_trading_price_range_' + arrResult.id + '"><b>' + arrResult.trading_price_range + '</b></span>';
    html += '</td>';
    // ratings_FA
    html += '<td class="td_ratings_FA_' + arrResult.id + '" style="vertical-align: middle;" align="center">';
    html += '<span id="span_ratings_FA_' + arrResult.id + '" class="span_ratings_FA_' + arrResult.id + '"><b>' + arrResult.ratings_FA + '</b></span>';
    html += '</td>';
    // onclick="JS_DataFinancial.fireAntChart(\'' + id + '\')"
    html += '<td class="td_view_' + arrResult.id + '" style="vertical-align: middle;" align="center"><a href="' + arrResult.url_link + '" target="_blank">Chi tiết</a></td>';
    // html += '</tr>';
    $('#code_' + arrResult.id).html(html);
    // if($("#span_code_cp_" + (parseInt(arrResult.id) + 1)).html() === undefined && $("#span_code_cp_" + (parseInt(arrResult.id) + 1)).html() !== '-' && (parseInt(arrResult.id) + 1) <= 5){
    //     $('#body_data').append(
    //         '<tr id="code_' + (parseInt(arrResult.id) + 1) + '">'
    //         + '<td style="vertical-align: middle;color:#83beff" align="center">'
    //         + '<span>' + (parseInt(arrResult.id) + 1) + '</span></td>'
    //         + '<td class="td_code_cp_' + (parseInt(arrResult.id) + 1) + '" style="vertical-align: middle;" align="center" ondblclick="click2(\'' + (parseInt(arrResult.id) + 1) + '\', \'code_cp\',this)">'
    //         + '<span id="span_code_cp_' + (parseInt(arrResult.id) + 1) + '" class="text-success span_code_cp_' + (parseInt(arrResult.id) + 1) + '" onclick="click2(\'' + (parseInt(arrResult.id) + 1) + '\', \'code_cp\',this)">-</span>'
    //         + '</tr>'
    //     );
    // }
    // JS_DataFinancial.loadEvent();
}
/**
 * Tạo một id mới ngẫu nhiên
 */
function broofa() {
    return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function (c) {
        var r = Math.random() * 16 | 0, v = c == 'x' ? r : (r & 0x3 | 0x8);
        return v.toString(16);
    });
}
/**
 * Load màn hình danh sách
 *
 * @param oForm (tên form)
 *
 * @return void
 */
JS_DataFinancial.prototype.index = function () {
    var myClass = this;
    var url = this.urlPath + '/index';
    $.ajax({
        url: url,
        type: "GET",
        success: function (arrResult) {
            $("#table-container").html(arrResult);
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
JS_DataFinancial.prototype.loadData = function (oForm) {
    var myClass = this;
    var url = this.urlPath + '/loadData';
    var data = $(oForm).serialize();
    data += '&limit=' + 5;
    $.ajax({
        url: url,
        type: "POST",
        // cache: true,
        data: data,
        success: function (arrResult) {
            $("#table-container-data").html(arrResult);
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
JS_DataFinancial.prototype.edit = function (id) {
    var url = this.urlPath + '/changeUpdate';
    var myClass = this;
    var data = '_token=' + $('#frmDataFinancial_index #_token').val();
    data += '&id=' + id;
    $.ajax({
        url: url,
        type: "GET",
        //cache: true,
        data: data,
        success: function (arrResult) {
            $('#editmodal').html(arrResult);
            $('.chzn-select').chosen({ height: '100%', width: '100%' });
            $('#status').attr('checked', true);
            $('#editmodal').modal('show');
            $('form#frmAdd').find('#btn_create').click(function () {
                myClass.store('form#frmAdd');
            })
        }
    });
}
/**
 * Sự kiện khi nhấn 2 lần vào dòng td để sửa
 */
function click2(id, type) {
    var text = $("#span_" + type + "_" + id).html();
    $("#" + type + "_" + id).removeAttr('hidden');
    // $("#span_"+type+"_" + id).html('<textarea name="'+type+'" id="'+type+'_' + id + '" rows="1" style="width: 100%;"></textarea>');
    // $("#span_" + type + "_" + id).html(`<input class="text-uppercase code_cp" name="${type}" id="${type}_${id}" rows="1" style="text-align: center; width: 100%;height: 40px;border: none;outline: none; background-color: #ffffff" maxlength="3" onkeydown="if (event.key == 'Enter'){JS_DataFinancial.updateDataFinancial('${id}', '${type}');return false;}">`);
    $("#span_" + type + "_" + id).html(`<input class="text-uppercase code_cp fw-bold" name="${type}" id="${type}_${id}" rows="1" placeholder="..." style="text-align: center; width: 100%;height: 40px;border: none;outline: none; background-color: #ffffff;" maxlength="3" onkeydown="if (event.key == 'Enter'){JS_DataFinancial.updateDataFinancial('${id}', '${type}');return false;}">`);

    $("#" + type + "_" + id).focus();
    $(".td_" + type + "_" + id).removeAttr('onclick');
    $("#span_" + type + "_" + id).removeAttr('id');
    
    $(".code_cp").keyup(function(){
        if($(".code_cp").val().length == 3){
            JS_DataFinancial.updateDataFinancial(id, type, $(".span_" + type + '_' + id).html());
        }
    })
    $("#" + type + "_" + id).focusout(function () {
        var nhap = $("#" + type + "_" + id).val() != '' ? $("#" + type + "_" + id).val() : text;
        $("#" + type + "_" + id).attr('hidden', true);
        $(".span_" + type + "_" + id).attr('id', 'span_' + type + '_' + id);
        $(".td_" + type + "_" + id).attr('onclick', "click2(" + id + ", 'code_cp',this)");
        $(".span_" + type + "_" + id).html(nhap);
        if (text != $(".span_" + type + "_" + id).html()) {
            JS_DataFinancial.updateDataFinancial(id, type, $(".span_" + type + '_' + id).html());
        }
    })
}
/**
 * Cập nhật khi ở màn hình hiển thị danh sách
 */
JS_DataFinancial.prototype.updateDataFinancial = function (id, column, value = '') {
    var myClass = this;
    var url = myClass.urlPath + '/searchDataCP';
    var data = 'id=' + id;
    data += '&_token=' + $('#frmSearchCP').find('#_token').val();
    if (column == 'code_cp') { data += '&code_cp=' + (column == 'code_cp' && $("#code_cp_" + id).val() != undefined ? $("#code_cp_" + id).val() : value); }
    else if (column == 'status') { data += '&status=' + value }
    NclLib.loadding();
    $.ajax({
        url: url,
        data: data,
        type: "POST",
        success: function (arrResult) {
            if (arrResult['status'] == 401) {
                Swal.fire({
                    title: arrResult['message'],
                    showCloseButton: true,
                    confirmButtonText: "Đăng nhập",
                    confirmButtonColor: "rgb(31 140 64)",
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.replace('/login');
                    }
                })
                // $(".swal2-modal").css('background-color', '#700e13');
                // $(".swal2-modal").css('color', '#ffffff');
                $(".swal2-modal").css('background-color', 'rgb(112 14 14)');
                $(".swal2-modal").css('color', '#ffffff');
                $(".swal2-modal").css('font-size', '15px');
                $(".swal2-modal").css('font-family', 'FontAwesome');
            }
            else if (arrResult['status'] == 2) {
                $(".td_exchange_" + id).html('-');
                $(".td_code_category_" + id).html('-');
                $(".td_created_at_" + id).html('-');
                $(".td_ratings_TA_" + id).html('-');
                $(".td_act_" + id).html('-');
                $(".td_trading_price_range_" + id).html('-');
                $(".td_ratings_FA_" + id).html('-');
                $(".td_view_" + id).html('-');
                $(".td_identify_trend_" +id).attr('style', 'vertical-align: middle;');
                $(".td_act_" +id).attr('style', 'vertical-align: middle;');
                $("#span_identify_trend_" + id).html(arrResult['message']);
                $("#code_cp_" + id).focusout();
                return false;
            } else {
                JS_DataFinancial.addrow(arrResult);
            }
        }, error: function (e) {
            console.log(e);
            NclLib.successLoadding();
        }
    });
}
/**
 * Cập nhật khi ở màn hình hiển thị danh sách
 */
JS_DataFinancial.prototype.updateDataFinancialMobile = function (id, column, value = '') {
    var myClass = this;
    var url = myClass.urlPath + '/searchDataCP';
    var data = {
        _token: $('#_token').val(),
        id: id,
    }
    let code_cp = '';
    if (column == 'code_cp') { code_cp = (column == 'code_cp' && $("#code_cp_mobile").val() != undefined ? $("#code_cp_mobile").val() : value); }
    data.code_cp = code_cp;

    NclLib.loadding();
    $.ajax({
        url: url,
        data: data,
        type: "POST",
        success: function (arrResult) {
            if (arrResult['status'] == 401) {
                Swal.fire({
                    title: arrResult['message'],
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
            }else if (arrResult['status'] == 2) {
                Swal.fire({
                    title: arrResult['message'],
                    showCloseButton: true,
                    showConfirmButton: false,
                    confirmButtonColor: '#f5ae67',
                    icon: 'warning',
                    timer: 3000
                })
                $("#code_cp").focusout();
                return false;
            }else if(data['code_cp'] != ''){
                $(".td_exchange_mobile").html(arrResult['exchange']);
                $(".td_code_category_mobile").html(arrResult['code_category']);
                $(".td_created_at_mobile").html(arrResult['created_at'] + ' ' + arrResult['created_at_day']);
                $(".td_ratings_TA_mobile").html(arrResult['ratings_TA']);
                $(".td_identify_trend_mobile").html(arrResult['identify_trend']);
                $(".td_act_mobile").html(arrResult['act']);
                $(".td_trading_price_range_mobile").html(arrResult['trading_price_range']);
                $(".td_ratings_FA_mobile").html(arrResult['ratings_FA']);
                $(".td_view_mobile").html('<a href="'+arrResult['url_link']+'" target="_blank">Chi tiết</a>');
                $(".td_identify_trend_mobile").css('background-color', '#a3f1fe5e')
                $(".td_act_mobile").css('background-color', '#ffb75c');
                $(".td_ratings_FA_mobile").css('color', '#ff7c00');
            }
        }, error: function (e) {
            console.log(e);
            NclLib.successLoadding();
        }
    });
}
/**
 * Cập nhật khi ở màn hình hiển thị danh sách
 */
JS_DataFinancial.prototype.searchDataCP = function (oFormData) {
    var myClass = this;
    var url = myClass.urlPath + '/searchDataCP';
    var data = $(oFormData).serialize();
    $.ajax({
        url: url,
        data: data,
        type: "POST",
        success: function (arrResult) {
            if (arrResult['status'] == 2) {
                Swal.fire({
                    position: 'top-end',
                    icon: 'warning',
                    // background:'#dcffbe',
                    title: arrResult['message'],
                    showConfirmButton: false,
                    timer: 3000
                })
            } else {
                JS_DataFinancial.addrow(arrResult);
            }
        }, error: function (e) {
            console.log(e);
            NclLib.successLoadding();
        }
    });
}
/**
 * Hàm hiển thị modal ghi chú
 *
 * @param oForm (tên form)
 *
 * @return void
 */
JS_DataFinancial.prototype.noteTaFa = function () {
    var url = this.urlPath + '/noteTaFa';
    // var myClass = this;
    var oForm = 'form#frmDataFinancial_index';

    var data = $(oForm).serialize();
    // data += '&_token=' +  $('#_token').val();

    $.ajax({
        url: url,
        type: "GET",
        //cache: true,
        data: data,
        success: function (arrResult) {
            $('#editmodal_noteTaFa').html(arrResult);
            $('#editmodal_noteTaFa').modal('show');
            // myClass.loadevent(oForm);

        }
    });
}
JS_DataFinancial.prototype.checkLogin = function(){
    Swal.fire({
        title: 'Đăng nhập để tra cứu miễn phí!',
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