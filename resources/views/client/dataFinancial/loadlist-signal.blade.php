<style>
  .scrollbar {
    margin-left: 30px;
    /* float: left; */
    height: 1000px;
    /* width: 65px; */
    /* background: #F5F5F5; */
    overflow-y: scroll;
    margin-bottom: 25px;
  }

  .force-overflow {
    min-height: 1000px;
  }

  #wrapper {
    text-align: center;
    width: 500px;
    margin: auto;
  }

  /*
    *  STYLE 2
    */

  #style-2::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
    border-radius: 10px;
    background-color: #F5F5F5;
  }

  #style-2::-webkit-scrollbar {
    width: 12px;
    background-color: #F5F5F5;
  }

  #style-2::-webkit-scrollbar-thumb {
    border-radius: 10px;
    -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, .3);
    background-color: #D62929;
  }

  .tv-lightweight-charts {
    width: 100%;
    padding-right: var(--bs-gutter-x, 0.5rem) !important;
    padding-left: var(--bs-gutter-x, 0.5rem) !important;
    margin-right: auto !important;
    margin-left: auto !important;
  }

  .table {
    border-color: #670000;
  }

  .table-responsive.pmd-card.pmd-z-depth {
    height: 100%;
    max-height: 1200px;
  }

  #style-1 #table-data thead tr td {
    position: sticky;
    top: 0;
    background: #529845;
  }

  #frmLoadlist_signal .blur {
    /* opacity: 0.2; */
    border-color: rgba(0, 0, 0, 0.2);
  }
</style>
<div id="style-1" style="padding-right:10px;">
  <div class="table-responsive pmd-card pmd-z-depth table-container">
    <table id="table-data" class="table  table-bordered table-striped table-condensed dataTable no-footer @if(!Auth::check()) onload @endif" 
    @if(!Auth::check()) 
       onclick="JS_Signal.checkLogin()" 
    @elseif(Auth::check() && ((isset($_SESSION['role']) && $_SESSION['role'] == 'USERS') && (!empty($_SESSION['account_type_vip']) && ($_SESSION['account_type_vip'] != 'VIP2' && $_SESSION['account_type_vip'] != 'KIM_CUONG'))))
       onclick="JS_Signal.checkVIP()" 
    @endif

    >
      <colgroup>
        <col width="3%">
        <col width="5%"> <!-- macp -->
        <col width="6%"> <!-- san -->
        <col width="9%"> <!-- nhom nganh -->
        <col width="7%"> <!-- thoi gian -->
        <col width="7%"> <!-- xep hang -->
        <col width="20%"> <!-- nhan dinh TA -->
        <col width="12%"> <!-- hanh dong -->
        <col width="7%"> <!-- vung gia -->
        <col width="7%"> <!-- vung gia cat lo -->
        <col width="7%"> <!-- xep hang FA -->
        <col width="8%"> <!-- thong tin -->
      </colgroup>
      <thead>
        <tr>
          <!-- <th style="white-space: inherit;vertical-align: middle;font-size: 17px;background:#fff5dc;color:#dd0000;" align="center" colspan="3"><center>NHẬP MÃ CỔ PHIẾU</center></th> -->
          <th style="white-space: inherit;vertical-align: middle;font-size: 25px;background:#700e13;color:#fff49b;height: 80px;" align="center" colspan="12">
            <center>BỘ LỌC CỔ PHIẾU - TOP TRẠNG THÁI NGÀNH ĐẦU TƯ</center>
          </th>
        </tr>
        <tr style="background:#529845;color:white">
          <td style="white-space: inherit;vertical-align: middle" align="center"><b>STT</b></td>
          <!-- <td style="white-space: inherit;vertical-align: middle;background: #00ad34;animation: lights 2s 750ms linear infinite;" align="center"><b> </i>Nhập mã cổ phiếu</b> <br> <i class="fas fa-angle-double-down"></td> -->
          <td style="white-space: inherit;vertical-align: middle" align="center"><b>Mã CP</b></td>
          <td style="white-space: inherit;vertical-align: middle" align="center"><b>Sàn</b></td>
          <td style="white-space: inherit;vertical-align: middle" align="center"><b>Nhóm nghành HĐKD</b></td>
          <td style="white-space: inherit;vertical-align: middle" align="center"><b>Thời gian <br>cập nhật</b></td>
          <td style="white-space: inherit;vertical-align: middle" align="center"><b>Xếp hạng <br>TA</b></td>
          <td style="white-space: inherit;vertical-align: middle" align="center">
            <b class="xh-w">Mô tả mô hình (Model)</b>
            <b class="xh-mb">Mô tả mô hình<br>(Model)</b>
          </td>
          <td style="white-space: inherit;vertical-align: middle" align="center"><b>Trạng thái Model</b></td>
          <td style="white-space: inherit;vertical-align: middle" align="center"><b>Vùng giá <br> tham chiếu</b></td>
          <td style="white-space: inherit;vertical-align: middle; background-color: #fbff2f;" align="center"><b style="color:#ff0000">Vùng giá <br> cắt lỗ</b></td>
          <td style="white-space: inherit;vertical-align: middle" align="center"><b>Xếp hạng <br> FA</b></td>
          <td style="white-space: inherit;vertical-align: middle" align="center"><b>Thông tin/ <br>Phân tích</b></td>
        </tr>
      </thead>
      <tbody id="body_data" style="background:#dbead3;" @if(!Auth::check()) class="blur" @endif>
        @if(Auth::check() && ((isset($_SESSION['role']) && $_SESSION['role'] != 'USERS') || (!empty($_SESSION['account_type_vip']) && ($_SESSION['account_type_vip'] == 'VIP2' || $_SESSION['account_type_vip'] == 'KIM_CUONG'))))
        @foreach ($datas as $key => $data)
        @php $id = $data->id; @endphp
        <tr>
          <td style="vertical-align: middle;" align="center"><b>{{$key + 1}}</b></td>
          <td style="vertical-align: middle;" class="td_code_cp_{{$id}}" align="center">
            <span id="span_code_cp_{{$id}}" value="" class="span_code_cp_{{$id}}"><b>{{$data->code_cp}}</b></span>
          </td>
          <td style="vertical-align: middle;" class="td_exchange_{{$id}}" align="center">
            <span id="span_exchange_{{$id}}" class="span_exchange_{{$id}}">{{$data->exchange}}</span>
          </td>
          <td style="vertical-align: middle;white-space: inherit;" class="td_code_category_{{$id}}" align="center">
            <span id="span_code_category_{{$id}}" class="span_code_category_{{$id}}">{{!empty($data->category->name_category) ? $data->category->name_category : ''}}</span>
          </td>
          <td style="vertical-align: middle;white-space: inherit;" class="td_created_at_{{$id}}" align="center">
            <span id="span_created_at_{{$id}}" class="span_created_at_{{$id}}">{{!empty($data->created_at) ? date('H:i', strtotime($data->created_at)) : ''}} <br> {{!empty($data->created_at) ? date('d/m', strtotime($data->created_at)) : ''}}</span>
          </td>
          <td style="vertical-align: middle;font-weight: 500;" class="td_ratings_TA_{{$id}}" align="center">
            <span id="span_ratings_TA_{{$id}}" class="span_ratings_TA_{{$id}}">{{$data->ratings_TA}}</span>
          </td>
          <td style="vertical-align: middle;" class="td_identify_trend_{{$id}}" align="center">
            <span id="span_identify_trend_{{$id}}" class="span_identify_trend_{{$id}}" style="display: -webkit-box;-webkit-line-clamp: 3;-webkit-box-orient: vertical;white-space: break-spaces;overflow:hidden;">{{$data->identify_trend}}</span>
          </td>
          <td style="vertical-align: middle;white-space: inherit;font-weight: 500;" class="td_act_{{$id}}" align="center">
            <span id="span_act_{{$id}}" class="span_act_{{$id}}">{{$data->act}}</span>
          </td>
          <td style="vertical-align: middle;font-weight: 500;" class="td_trading_price_range_{{$id}}" align="center">
            <span id="span_trading_price_range_{{$id}}" class="span_trading_price_range_{{$id}}">{{$data->trading_price_range}}</span>
          </td>
          <td style="vertical-align: middle;background-color: #fce69b; color: #ff0000;font-weight: 500;" class="td_stop_loss_price_zone_{{$id}}" align="center">
            <span id="span_stop_loss_price_zone_{{$id}}" class="span_stop_loss_price_zone_{{$id}}">{{$data->stop_loss_price_zone}}</span>
          </td>
          <td style="vertical-align: middle;font-weight: 500;" class="td_ratings_FA_{{$id}}" align="center">
            <span id="span_ratings_FA_{{$id}}" class="span_ratings_FA_{{$id}}">{{$data->ratings_FA}}</span>
          </td>
          <td style="vertical-align: middle;" align="center">
          <span id="span_ratings_FA_{{$id}}" class="span_ratings_FA_{{$id}}"><a href="{{$data->url_link}}" target="_blank"><b class="text-mobile-top-cp">Chi tiết</b></a></span>
            <!-- <a target="_blank" @if(isset($data->url_link) && !empty($data->url_link))  href="{{$data->url_link}}" @else href="javascript:;" @endif>Chi tiết</a> -->
          </td>
        </tr>
        @endforeach
        @else
        @foreach ($datas as $key => $data)
        @php $id = $data->id; @endphp
        <tr>
          <td style="vertical-align: middle;" align="center"><b>{{$key + 1}}</b></td>
          <td style="vertical-align: middle;" class="td_code_cp_{{$id}}" align="center">
            <span id="span_code_cp_{{$id}}" value="" class="span_code_cp_{{$id}}"><b><span style="color:#00a25f"><i class="fas fa-eye-slash"></i></span></b></span>
          </td>
          <td style="vertical-align: middle;" class="td_exchange_{{$id}}" align="center">
            <span id="span_exchange_{{$id}}" class="span_exchange_{{$id}}"><b><span style="color:#00a25f"><i class="fas fa-eye-slash"></i></span></b></span>
          </td>
          <td style="vertical-align: middle;white-space: inherit;" class="td_code_category_{{$id}}" align="center">
            <span id="span_code_category_{{$id}}" class="span_code_category_{{$id}}"><b><span style="color:#00a25f"><i class="fas fa-eye-slash"></i></span></b></span>
          </td>
          <td style="vertical-align: middle;white-space: inherit;" class="td_created_at_{{$id}}" align="center">
            <span id="span_created_at_{{$id}}" class="span_created_at_{{$id}}">{{!empty($data->created_at) ? date('H:i', strtotime($data->created_at)) : ''}} <br> {{!empty($data->created_at) ? date('d/m', strtotime($data->created_at)) : ''}}</span>
          </td>
          <td style="vertical-align: middle;" class="td_ratings_TA_{{$id}}" align="center">
            <span id="span_ratings_TA_{{$id}}" class="span_ratings_TA_{{$id}}">{{$data->ratings_TA}}</span>
          </td>
          <td style="vertical-align: middle;" class="td_identify_trend_{{$id}}" align="center">
            <span id="span_identify_trend_{{$id}}" class="span_identify_trend_{{$id}}" style="display: -webkit-box;-webkit-line-clamp: 3;-webkit-box-orient: vertical;white-space: break-spaces;overflow:hidden;">{{$data->identify_trend}}</span>
          </td>
          <td style="vertical-align: middle;white-space: inherit;" class="td_act_{{$id}}" align="center">
            <span id="span_act_{{$id}}" class="span_act_{{$id}}">{{$data->act}}</span>
          </td>
          <td style="vertical-align: middle;" class="td_trading_price_range_{{$id}}" align="center">
            <span id="span_trading_price_range_{{$id}}" class="span_trading_price_range_{{$id}}">{{$data->trading_price_range}}</span>
          </td>
          <td style="vertical-align: middle;background-color: #fce69b; color: #fa2f18;" class="td_stop_loss_price_zone_{{$id}}" align="center">
            <span id="span_stop_loss_price_zone_{{$id}}" class="span_stop_loss_price_zone_{{$id}}">{{$data->stop_loss_price_zone}}</span>
          </td>
          <td style="vertical-align: middle;" class="td_ratings_FA_{{$id}}" align="center">
            <span id="span_ratings_FA_{{$id}}" class="span_ratings_FA_{{$id}}">{{$data->ratings_FA}}</span>
          </td>
          <td style="vertical-align: middle;" align="center">
            <span  value="" class="span_code_cp_{{$id}}"><b><span style="color:#00a25f"><i class="fas fa-eye-slash"></i></span></b></span>
          </td>
          <!-- <td style="vertical-align: middle;" align="center">
             <span class="span_code_cp_{{$id}}"><a href="" target="_blank"><b class="text-mobile-top-cp">Chi tiết</b></a></span>
          </td> -->
        </tr>
        @endforeach
        @endif

      </tbody>
    </table>
  </div>
</div>
