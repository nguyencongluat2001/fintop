<form id="frmSearchCP" action="index" method="POST" autocomplete="off">
    <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
    <!-- <div class="table-responsive pmd-card pmd-z-depth "> -->
    <table id="table-data" class="table  table-bordered table-condensed dataTable no-footer" style="background: #0000000d;" @if(!isset($_SESSION['id'])) onclick="JS_DataFinancial.checkLogin()" @endif>
        <colgroup>
            <col width="50%">
            <col width="50%">
        </colgroup>
        <tbody>
            <tr class="fw-bold">
                <td style="white-space: inherit;vertical-align: middle;font-size: 25px;background:#700e13;color:#fff49b;height: 80px;">
                    <center>NHẬP MÃ CP</center>
                </td>
                <td class="td_code_cp" style="vertical-align: middle;background-color:#fff;">
                    <span id="span_code_cp" class="span_code_cp text-success text-uppercase fw-bold" style="font-size: 25px;">
                        <input class="text-uppercase code_cp fw-bold" placeholder="..." 
                                name="code_cp_mobile" id="code_cp_mobile" rows="1" 
                                style="text-align: center; width: 100%;height: 40px;border: none;outline: none; background-color: #ffffff;color: #cc0000 !important;"
                                maxlength="3" autocomplete="off"
                                onchange="JS_DataFinancial.updateDataFinancialMobile(1,'code_cp')"
                                oninput="if(this.value.length === 3){JS_DataFinancial.updateDataFinancialMobile(1,'code_cp')}"
                                onkeydown="if(event.key == 'Enter'){JS_DataFinancial.updateDataFinancialMobile(1,'code_cp')}"
                            >
                    </span>
                </td>
            </tr>
        </tbody>
    </table>
    <table id="table-data" class="table  table-bordered table-condensed dataTable no-footer" style="background:#ffffffe6 !important;" @if(!isset($_SESSION['id'])) onclick="JS_DataFinancial.checkLogin()" @endif>
        <colgroup>
            <col width="30%">
            <col width="70%">
        </colgroup>
        <tbody>
            <tr>
                <td align="center" style="background:#529845;font-size:.8rem;color:white;white-space: inherit;vertical-align: middle"><b>Sàn</b></td>
                <td class="td_exchange_mobile" align="center" style="vertical-align: middle;">-</td>
            </tr>
            <tr>
                <td align="center" style="background:#529845;font-size:.8rem;color:white;white-space: inherit;vertical-align: middle"><b>Nhóm nghành<br>HĐKD</b></td>
                <td class="td_code_category_mobile" align="center" style="vertical-align: middle;">-</td>
            </tr>
            <tr>
                <td align="center" style="background:#529845;font-size:.8rem;color:white;white-space: inherit;vertical-align: middle"><b>Thời gian<br>cập nhật</b></td>
                <td class="td_created_at_mobile" align="center" style="vertical-align: middle;">-</td>
            </tr>
            <tr>
                <td align="center" style="background:#529845;font-size:.8rem;color:white;white-space: inherit;vertical-align: middle"><b>Xếp hạng TA</b></td>
                <td class="td_ratings_TA_mobile" align="center" style="vertical-align: middle;">-</td>
            </tr>
            <tr>
                <td align="center" style="background:#529845;font-size:.8rem;color:white;white-space: inherit;vertical-align: middle"><b>Xu hướng<br>cổ phiếu</b></td>
                <td class="td_identify_trend_mobile" align="center" style="vertical-align: middle;">
                </td>
            </tr>
            <tr>
                <td align="center" style="background:#529845;font-size:.8rem;color:white;white-space: inherit;vertical-align: middle"><b>Tín hiệu<br>hành động</b></td>
                <td class="td_act_mobile" align="center" style="vertical-align: middle;">-</td>
            </tr>
            <tr>
                <td align="center" style="background:#529845;font-size:.8rem;color:white;white-space: inherit;vertical-align: middle"><b>Vùng giá<br>giao dịch</b></td>
                <td class="td_trading_price_range_mobile" align="center" style="vertical-align: middle;">-</td>
            </tr>
            <tr>
                <td align="center" style="background:#529845;font-size:.8rem;color:white;white-space: inherit;vertical-align: middle"><b>Xếp hạng FA</b></td>
                <td class="td_ratings_FA_mobile" align="center" style="vertical-align: middle;">-</td>
            </tr>
            <tr>
                <td align="center" style="background:#529845;font-size:.8rem;color:white;white-space: inherit;vertical-align: middle"><b>Thông tin/<br>Phân tích</b></td>
                <td class="td_view_mobile" align="center" style="vertical-align: middle;">-</td>
            </tr>
        </tbody>
    </table>
</form>