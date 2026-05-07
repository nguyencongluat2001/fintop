<style>
    .title_table{
        font-size:16px !important;
    }
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
    border-color:  rgba(0, 0, 0, 0.2);
  }
</style>
<div id="style-1" style="padding-right:10px;">
    <div class="table-responsive pmd-card pmd-z-depth">
        <table style="" id="table-data" class="table  table-bordered table-striped table-condensed dataTable no-footer"  
            @if(!Auth::check()) 
                onclick="JS_CategoryFintop.checkLogin()" 
            @elseif(Auth::check() && ((isset($_SESSION['role']) && $_SESSION['role'] == 'USERS') && (!empty($_SESSION['account_type_vip']) && ($_SESSION['account_type_vip'] != 'VIP1' && $_SESSION['account_type_vip'] != 'VIP2' && $_SESSION['account_type_vip'] != 'KIM_CUONG'))))
                onclick="JS_CategoryFintop.checkVIP()" 
            @endif
            >
            <colgroup>
                <col width="7%"> <!-- ma cp -->
                <col width="9%"> <!-- nhom nganh --> 
                <col width="6%"> <!-- ngay mua -->
                <col width="6%"> <!-- %  tai san -->
                <col width="6%"> <!-- gia mua -->
                <col width="6%"> <!-- gia hien tai -->
                <col width="6%"> <!-- lai/lo -->
                <col width="14%"> <!-- khuyen nghi hanh đong -->
                <col width="5%"> <!-- vung gia muc tieu -->
                <col width="5%"> <!-- vung gia muc tieu -->
                <col width="5%"> <!-- vung gia muc tieu -->
                <col width="7%"> <!-- dung lo -->
                <col width="18%"> <!-- ghi chu -->
            </colgroup>
            <thead style="background:#3a760c;color:white">
                <tr>
                    {{--<td class="text-mobile" rowspan="2" align="center" style="white-space: inherit; vertical-align: middle;"><b>STT</b></td>--}}
                    <td class="text-mobile" rowspan="2" align="center" style="white-space: inherit; vertical-align: middle;"><b>Mã <br>cổ phiếu</b></td>
                    <td class="text-mobile" rowspan="2" align="center" style="white-space: inherit; vertical-align: middle;"><b>Nhóm ngành</b></td>
                    <td class="text-mobile" rowspan="2" align="center" style="white-space: inherit; vertical-align: middle;"><b>Ngày mua</b></td>
                    <td class="text-mobile" rowspan="2" align="center" style="white-space: inherit; vertical-align: middle;background:#fbff2f;color:#f82f15"><b>Tỷ trọng <br> (%NAV)</b></td>
                    <td class="text-mobile" rowspan="2" align="center" style="white-space: inherit; vertical-align: middle;"><b>Giá mua <br> TB</b></td>
                    <td class="text-mobile" rowspan="2" align="center" style="white-space: inherit; vertical-align: middle;"><b>Giá <br> hiện tại</b></td>
                    <td class="text-mobile" rowspan="2" align="center" style="white-space: inherit; vertical-align: middle;"><b>Lãi/Lỗ</b></td>
                    <td class="text-mobile" rowspan="2" align="center" style="white-space: inherit; vertical-align: middle;"><b>Tín hiệu <br> hành động</b></td>
                    <!-- <td class="text-mobile" rowspan="2" align="center" style="white-space: inherit; vertical-align: middle;"><b>Vùng giá mục tiêu (TA1)</b></td> -->
                    <!-- <td class="text-mobile" rowspan="2" align="center" style="white-space: inherit; vertical-align: middle;"><b>Vùng giá mục tiêu (TA2)</b></td> -->
                    <td class="text-mobile" colspan="3" align="center" style="white-space: inherit; vertical-align: middle;background:#fbff2f;color:#f82f15"><b>Vùng giá mục tiêu</b></td>
                    <td class="text-mobile" rowspan="2" align="center" style="white-space: inherit; vertical-align: middle;"><b>Dừng lỗ</b></td>
                    <!-- <td class="text-mobile" rowspan="2" align="center" style="white-space: inherit; vertical-align: middle;background:#fbff2f;color:#f82f15"><b>% Chốt</b></td> -->
                    <td class="text-mobile" rowspan="2" align="center" style="white-space: inherit; vertical-align: middle;"><b>Ghi chú</b></td>
                </tr>
                <tr>
                    <td class="text-mobile" align="center" style="white-space: inherit; vertical-align: middle;background:#fbff2f;color:#f82f15"><b>Tar1</b></td>
                    <td class="text-mobile" align="center" style="white-space: inherit; vertical-align: middle;background:#fbff2f;color:#f82f15"><b>Tar2</b></td>
                    <td class="text-mobile" align="center" style="white-space: inherit; vertical-align: middle;background:#fbff2f;color:#f82f15"><b>Tar3</b></td>
                </tr>
            </thead>
            <tbody>
                @foreach ($datas as $key => $data)
                    <tr>
                        <td align="center" class="text-uppercase text-mobile" style="white-space: inherit; vertical-align: middle;font-weight:bold;">
                            @if((isset($_SESSION['role']) && $_SESSION['role'] != 'USERS') || Auth::check() && isset($_SESSION['account_type_vip']) && ($_SESSION['account_type_vip'] == 'VIP1' || $_SESSION['account_type_vip'] == 'VIP2' || $_SESSION['account_type_vip'] == 'KIM_CUONG'))
                            <span>{{ $data['code_cp'] }}</span>
                            @else
                            <span style="color:#00a25f"><i class="fas fa-eye-slash"></i></span>
                            @endif
                        </td>
                        <td align="center" class="text-mobile" style="white-space: inherit; vertical-align: middle;">
                            @if((isset($_SESSION['role']) && $_SESSION['role'] != 'USERS') || Auth::check() && isset($_SESSION['account_type_vip']) && ($_SESSION['account_type_vip'] == 'VIP1' || $_SESSION['account_type_vip'] == 'VIP2' || $_SESSION['account_type_vip'] == 'KIM_CUONG'))
                            <span>{{ $data['name_category'] }}</span>
                            @else
                            <span style="color:#00a25f"><i class="fas fa-eye-slash"></i></span>
                            @endif
                        </td>
                        <td class="text-mobile" align="center" style="white-space: inherit; vertical-align: middle;">
                            {{ !empty($data['created_at']) ? date('d/m', strtotime($data['created_at'])) : '' }} <br>
                            {{ !empty($data['created_at']) ? date('Y', strtotime($data['created_at'])) : '' }}
                        </td>
                        <td class="text-mobile" align="center" style="white-space: inherit; vertical-align: middle;background:#ffef6d;color:red;">
                            @if((isset($_SESSION['role']) && $_SESSION['role'] != 'USERS') || Auth::check() && isset($_SESSION['account_type_vip']) && ($_SESSION['account_type_vip'] == 'VIP1' || $_SESSION['account_type_vip'] == 'VIP2' || $_SESSION['account_type_vip'] == 'KIM_CUONG'))
                            <span>{{ $data['percent_of_assets'] }}</span>
                            @else
                            <span style="color:#00a25f"><i class="fas fa-eye-slash"></i></span>
                            @endif
                        </td>
                        <td class="text-mobile" align="center" style="white-space: inherit; vertical-align: middle;font-weight:bold;">
                            {{--@if(Auth::check() && isset($_SESSION['account_type_vip']) && ($_SESSION['account_type_vip'] == 'VIP1' || $_SESSION['account_type_vip'] == 'VIP2' || $_SESSION['account_type_vip'] == 'KIM_CUONG'))
                            <span>{{ $data['price'] }}</span>
                            @else
                            <span style="color:#00a25f"><i class="fas fa-eye-slash"></i></span>
                            @endif--}}
                            <span>{{ $data['price'] }}</span>
                        </td>
                        <td class="text-mobile" align="center" style="white-space: inherit; vertical-align: middle;font-weight:bold;">
                        {{--@if(Auth::check() && isset($_SESSION['account_type_vip']) && ($_SESSION['account_type_vip'] == 'VIP1' || $_SESSION['account_type_vip'] == 'VIP2' || $_SESSION['account_type_vip'] == 'KIM_CUONG'))
                            <span>{{ $data['current_price'] }}</span>
                            @else
                            <span style="color:#00a25f"><i class="fas fa-eye-slash"></i></span>
                            @endif
                            --}}
                            <span>{{ $data['current_price'] }}</span>

                        </td>
                        <td class="text-mobile" align="center" 
                        @if(isset($data['pickcolor'])) style="white-space: inherit; vertical-align: middle;background:{{$data['pickcolor']}};font-weight:bold;"
                        @else style="white-space: inherit; vertical-align: middle;background:#218838;font-weight:bold;"
                        @endif>
                            {{--@if(Auth::check() && isset($_SESSION['account_type_vip']) && ($_SESSION['account_type_vip'] == 'VIP1' || $_SESSION['account_type_vip'] == 'VIP2' || $_SESSION['account_type_vip'] == 'KIM_CUONG'))
                            <span>{{ $data['profit_and_loss'] }}</span>
                            @else
                            <span style="color:#00a25f"><i class="fas fa-eye-slash"></i></span>
                            @endif--}}
                            <span>{{ $data['profit_and_loss'] }}</span>
                        </td>
                        <td class="text-mobile" align="center" style="white-space: inherit; vertical-align: middle;">
                            <span>{{ $data['act'] }}</span>
                        </td>
                        <td class="text-mobile" align="center" style="white-space: inherit; vertical-align: middle;font-weight:bold;background: #ffef6d;">
                            @if((isset($_SESSION['role']) && $_SESSION['role'] != 'USERS') || Auth::check() && isset($_SESSION['account_type_vip']) && ($_SESSION['account_type_vip'] == 'VIP1' || $_SESSION['account_type_vip'] == 'VIP2' || $_SESSION['account_type_vip'] == 'KIM_CUONG'))
                            <span>{{ $data['ta1'] }}</span>
                            @else
                            <span style="color:#00a25f"><i class="fas fa-eye-slash"></i></span>
                            @endif
                        </td>
                        <td class="text-mobile" align="center" style="white-space: inherit; vertical-align: middle;font-weight:bold;background: #ffef6d;">
                            @if((isset($_SESSION['role']) && $_SESSION['role'] != 'USERS') || Auth::check() && isset($_SESSION['account_type_vip']) && ($_SESSION['account_type_vip'] == 'VIP1' || $_SESSION['account_type_vip'] == 'VIP2' || $_SESSION['account_type_vip'] == 'KIM_CUONG'))
                            <span>{{ $data['ta2'] }}</span>
                            @else
                            <span style="color:#00a25f"><i class="fas fa-eye-slash"></i></span>
                            @endif
                        </td>
                        <td class="text-mobile" align="center" style="white-space: inherit; vertical-align: middle;font-weight:bold;background: #ffef6d;">
                            @if((isset($_SESSION['role']) && $_SESSION['role'] != 'USERS') || Auth::check() && isset($_SESSION['account_type_vip']) && ($_SESSION['account_type_vip'] == 'VIP1' || $_SESSION['account_type_vip'] == 'VIP2' || $_SESSION['account_type_vip'] == 'KIM_CUONG'))
                            <span>{{ $data['ta3'] }}</span>
                            @else
                            <span style="color:#00a25f"><i class="fas fa-eye-slash"></i></span>
                            @endif
                        </td>
                        <td class="text-mobile" align="center" style="white-space: inherit; vertical-align: middle;color:red;font-weight:bold;">
                            @if((isset($_SESSION['role']) && $_SESSION['role'] != 'USERS') || Auth::check() && isset($_SESSION['account_type_vip']) && ($_SESSION['account_type_vip'] == 'VIP1' || $_SESSION['account_type_vip'] == 'VIP2' || $_SESSION['account_type_vip'] == 'KIM_CUONG'))
                            <span>{{ $data['stop_loss'] }}</span>
                            @else
                            <span style="color:#00a25f"><i class="fas fa-eye-slash"></i></span>
                            @endif
                        </td>
                        <!-- <td align="center" style="white-space: inherit; vertical-align: middle;background:#ffef6d;color:red;font-weight:bold;">
                            @if(Auth::check() && isset($_SESSION['account_type_vip']) && ($_SESSION['account_type_vip'] == 'VIP1' || $_SESSION['account_type_vip'] == 'VIP2' || $_SESSION['account_type_vip'] == 'KIM_CUONG'))
                            <span>{{ $data['closing_percentage'] ?? '' }}</span>
                            @else
                            <span style="color:#00a25f"><i class="fas fa-eye-slash"></i></span>
                            @endif
                        </td> -->
                        <td class="text-mobile" align="center" style="white-space: inherit; vertical-align: middle;font-weight:bold;">
                        @if((isset($_SESSION['role']) && $_SESSION['role'] != 'USERS') || Auth::check() && isset($_SESSION['account_type_vip']) && ($_SESSION['account_type_vip'] == 'VIP1' || $_SESSION['account_type_vip'] == 'VIP2' || $_SESSION['account_type_vip'] == 'KIM_CUONG'))
                        <span>{{ $data['note'] }}</span>
                            @else
                            <span style="color:#00a25f"><i class="fas fa-eye-slash"></i></span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

