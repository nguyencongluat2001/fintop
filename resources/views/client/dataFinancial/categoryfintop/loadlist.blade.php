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
    border-color: rgba(0, 0, 0, 0.2);
  }
</style>
<div id="style-1" style="padding-right:10px;height:850px">
<div class="table-responsive pmd-card pmd-z-depth">
    <table id="table-data" class="table  table-bordered table-striped table-condensed dataTable no-footer" >
        <colgroup>
            <col width="8%"> <!-- % Chot -->
            <col width="8%"> <!-- ma cp -->
            <col width="8%"> <!-- nhom nganh -->
            <col width="8%"> <!-- ngay mua -->
            <col width="9%"> <!-- % tai san -->
            <col width="8%"> <!-- gia mua -->
            <col width="8%"> <!-- ngay chot -->
            <col width="8%"> <!-- gia chot -->
            <col width="8%"> <!-- lai lo -->
            <col width="25%"> <!-- ghi chu -->
        </colgroup>
        <thead>
            <tr style="background:#3a760c;color:white">
                {{--<td align="center" style="white-space: inherit; vertical-align: middle;"><b>STT</b></td>--}}
                <td class="text-mobile" align="center" style="white-space: inherit; vertical-align: middle;background:#ffef6d;color:red"><b>% Bán</b></td>
                <td class="text-mobile" align="center" style="white-space: inherit; vertical-align: middle;"><b>Mã <br>cổ phiếu</b></td>
                <td class="text-mobile" align="center" style="white-space: inherit; vertical-align: middle;"><b>Nhóm ngành</b></td>
                <td class="text-mobile" align="center" style="white-space: inherit; vertical-align: middle;"><b>Ngày mua</b></td>
                <td class="text-mobile" align="center" style="white-space: inherit; vertical-align: middle;"><b>Tỷ trọng <br> (%NAV)</b></td>
                <td class="text-mobile" align="center" style="white-space: inherit; vertical-align: middle;"><b>Giá mua <br> TB</b></td>
                <td class="text-mobile" align="center" style="white-space: inherit; vertical-align: middle;"><b>Ngày bán</b></td>
                <td class="text-mobile" align="center" style="white-space: inherit; vertical-align: middle;"><b>Giá bán</b></td>
                <td class="text-mobile" align="center" style="white-space: inherit; vertical-align: middle;"><b>Lãi/Lỗ</b></td>
                <td class="text-mobile" align="center" style="white-space: inherit; vertical-align: middle;"><b>Ghi chú</b></td>
            </tr>
        </thead>
        <tbody>
            @if(isset($datas) && count($datas) > 0)
            @foreach ($datas as $key => $data)
                <tr >
                    {{--<td align="center" >{{ $key + 1 }}</td>--}}
                    <td class="text-mobile" align="center" style="white-space: inherit; vertical-align: middle;background:#ffef6d;color:red;font-weight:bold;">
                        <span>{{ $data['closing_percentage']}}</span>
                    </td>
                    <td class="text-mobile" align="center" class="text-uppercase" style="white-space: inherit; vertical-align: middle;font-weight:bold;">
                        <span>{{ $data['code_cp']}}</span>
                    </td>
                    <td class="text-mobile" align="center" style="white-space: inherit; vertical-align: middle;">
                        <span>{{ $data['name_category']}}</span>
                    </td>
                    <td>{{ !empty($data['created_at']) ? date('d/m/Y', strtotime($data['created_at'])) : '' }}</td>
                    <td class="text-mobile" align="center" style="white-space: inherit; vertical-align: middle;">
                        <span>{{ $data['percent_of_assets']}}</span>
                    </td>
                    <td class="text-mobile" align="center" style="white-space: inherit; vertical-align: middle;">
                        <span>{{ $data['price']}}</span>
                    </td>
                    <td class="text-mobile" align="center" style="white-space: inherit; vertical-align: middle;">
                        {{ !empty($data['date_close']) ? date('d/m/Y', strtotime($data['date_close'])) : '' }}
                    </td>
                    <td class="text-mobile" align="center" style="white-space: inherit; vertical-align: middle;">
                        <span>{{ $data['price_close']}}</span>
                    </td>
                    <td class="text-mobile" align="center"
                    @if(isset($data['pickcolor'])) style="white-space: inherit; vertical-align: middle;background:{{$data['pickcolor']}};font-weight:bold;"
                    @else style="white-space: inherit; vertical-align: middle;background:#218838;font-weight:bold;"
                    @endif 
                    style="white-space: inherit; vertical-align: middle">
                        <span>{{ $data['profit_and_loss']}}</span>
                    </td>
                    <td class="text-mobile" align="center" style="white-space: inherit; vertical-align: middle;font-weight:bold;">
                        <span>{{ $data['note']}}</span>
                    </td>
                </tr>
            @endforeach
            @endif
        </tbody>
    </table>
</div>
</div>

