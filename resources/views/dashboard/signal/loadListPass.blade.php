<div class="table-responsive pmd-card pmd-z-depth ">
    <table id="table-data" class="table  table-bordered table-striped table-condensed dataTable no-footer">
        <colgroup>
            <col width="3%">
            <col width="5%">
            <col width="14%">
            <col width="14%">
            <col width="10%">
            <col width="10%">
            <col width="10%">
            <col width="10%">
            <col width="10%">
            <col width="10%">
            <col width="3%">
        </colgroup>
        <thead>
            @if(isset($type) && $type == 'BAN')
            <tr style="height: 70px;">
                <td align="center" style="vertical-align: middle;"><input type="checkbox" name="chk_all_item_id"
                        onclick="checkbox_all_item_id(document.forms[0].chk_item_id);"></td>
                <td align="center" style="vertical-align: middle;"><b>STT</b></td>
                <td align="center" style="vertical-align: middle;"><b>Người thêm</b></td>
                <td align="center" style="vertical-align: middle;"><b>Mã CP & %</b></td>
                <td align="center" style="vertical-align: middle;"><b>Loại</b></td>
                <td align="center" style="vertical-align: middle;"><b>Giá mua TB</b></td>
                <td align="center" style="vertical-align: middle;"><b>% Còn lại</b></td>
                <td align="center" style="vertical-align: middle;"><b>Lãi lỗ</b></td>
                <!-- <td align="center" style="vertical-align: middle;"><b>Sắp xếp</b></td> -->
                <td align="center" style="vertical-align: middle;"><b>Ngày thêm</b></td>
                <td align="center" style="vertical-align: middle;"><b>Trạng thái</b></td>
                <td align="center" style="vertical-align: middle;"><b><span onclick="JS_Signal.addrow()" class="text-cursor text-primary"><i class="fas fa-plus-square"></i></span></b></td>
            </tr>
            @else
            <tr style="height: 70px;">
                <td align="center" style="vertical-align: middle;"><input type="checkbox" name="chk_all_item_id"
                        onclick="checkbox_all_item_id(document.forms[0].chk_item_id);"></td>
                <td align="center" style="vertical-align: middle;"><b>STT</b></td>
                <td align="center" style="vertical-align: middle;"><b>Người thêm</b></td>
                <td align="center" style="vertical-align: middle;"><b>Mã CP & %</b></td>
                <td align="center" style="vertical-align: middle;"><b>Loại</b></td>
                <td align="center" style="vertical-align: middle;"><b>Tỷ trọng</b></td>
                <td align="center" style="vertical-align: middle;"><b>Mục tiêu</b></td>
                <td align="center" style="vertical-align: middle;"><b>Dừng lỗ</b></td>
                <!-- <td align="center" style="vertical-align: middle;"><b>Sắp xếp</b></td> -->
                <td align="center" style="vertical-align: middle;"><b>Ngày thêm</b></td>
                <td align="center" style="vertical-align: middle;"><b>Trạng thái</b></td>
                <td align="center" style="vertical-align: middle;"><b><span onclick="JS_Signal.addrow()" class="text-cursor text-primary"><i class="fas fa-plus-square"></i></span></b></td>
            </tr>
            @endif
        </thead>
        <tbody id="body_data">
            @if(count($datas) > 0)
                @foreach ($datas as $key => $data)
                    @php $id = $data->id; @endphp
                    @if($data->type == 'MUA')
                        <tr style="background:#18c524" >
                    @else
                        <tr style="background:#ff000096" >
                    @endif
                        <td align="center"><input type="checkbox" name="chk_item_id"
                                value="{{ $data->id }}"></td>
                        <td align="center">{{($datas->currentPage() - 1)*$datas->perPage() + ($key + 1)}}</td>
                        <td onclick="{select_row(this);}">{{ isset($data->users->name) ? $data->users->name : '' }}</td>
                       
                        <td class="td_code_{{$id}}" onclick="{select_row(this);}" ondblclick="click2('{{$id}}', 'code')">
                            <span id="span_code_{{$id}}" class="span_code_{{$id}}">{{ $data->code }}</span>
                        </td>
                        <td class="td_type_{{$id}}" onclick="{select_row(this);}" ondblclick="click2('{{$id}}', 'type')" align="center">
                            <span id="span_type_{{$id}}" class="span_type_{{$id}}">{{ $data->type }}</span>
                        </td>
                        @if(isset($type) && $type == 'BAN')
                            <td align="center" class="td_price_buy_{{$id}}" onclick="{select_row(this);}" ondblclick="click2('{{$id}}', 'price_buy')">
                                <span id="span_price_buy_{{$id}}" class="span_price_buy_{{$id}}">{{ $data->price_buy }}</span>
                            </td>
                            <td align="center" style="text-wrap: auto;" class="td_stop_loss_{{$id}}" onclick="{select_row(this);}" ondblclick="click2('{{$id}}', 'stop_loss')">
                                <span id="span_stop_loss_{{$id}}" class="span_stop_loss_{{$id}}">{{ $data->stop_loss }}</span>
                            </td>
                            <td align="center" class="td_target_{{$id}}" onclick="{select_row(this);}" ondblclick="click2('{{$id}}', 'target')">
                                <span id="span_target_{{$id}}" class="span_target_{{$id}}">{{ $data->target }}</span>
                            </td>
                        @else
                            <td align="center" class="td_price_buy_{{$id}}" onclick="{select_row(this);}" ondblclick="click2('{{$id}}', 'price_buy')">
                                <span id="span_price_buy_{{$id}}" class="span_price_buy_{{$id}}">{{ $data->price_buy }}</span>
                            </td>
                            <td align="center" class="td_target_{{$id}}" onclick="{select_row(this);}" ondblclick="click2('{{$id}}', 'target')">
                                <span id="span_target_{{$id}}" class="span_target_{{$id}}">{{ $data->target }}</span>
                            </td>
                            
                            <td align="center" style="text-wrap: auto;" class="td_stop_loss_{{$id}}" onclick="{select_row(this);}" ondblclick="click2('{{$id}}', 'stop_loss')">
                                <span id="span_stop_loss_{{$id}}" class="span_stop_loss_{{$id}}">{{ $data->stop_loss }}</span>
                            </td>
                        @endif
                        <!-- <td class="text-center td_order_{{$id}}" onclick="{select_row(this);}" ondblclick="click2('{{$id}}', 'order')">
                            <span id="span_order_{{$id}}" class="span_order_{{$id}}">{{ $data->order }}</span>
                        </td> -->
                        <td class="" onclick="{select_row(this);}">
                            <span id="" class="">{{ $data->created_at }}</span>
                        </td>
                        <td onclick="{select_row(this);}" align="center">
                            <label class="custom-control custom-checkbox p-0 m-0 pointer " style="cursor: pointer;">
                                <input type="checkbox" hidden class="custom-control-input toggle-status" id="status_{{$id}}" data-id="{{$id}}" {{ $data->status == 1 ? 'checked' : '' }}>
                                <span class="custom-control-indicator p-0 m-0" onclick="JS_Signal.changeStatusSignal('{{$id}}')"></span>
                            </label>
                        </td>
                        <td align="center">
                            <span class="text-cursor text-warning" onclick="JS_Signal.edit('{{$id}}')"><i class="fas fa-edit"></i></span>
                            <span class="text-cursor text-trash" onclick="JS_Signal.remote('{{$id}}')"><i class="fas fa-trash"></i></span>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
        <tfoot>
            @if(count($datas) > 0)
            <tr class="fw-bold" id="pagination">
                <td colspan="20">{{$datas->links('pagination.phantrang')}}</td>
            </tr>
            @else
            <tr id="pagination" align="center">
                <td colspan="20">Không tìm thấy dữ liệu!</td>
            </tr>
            @endif
        </tfoot>
    </table>
</div>
