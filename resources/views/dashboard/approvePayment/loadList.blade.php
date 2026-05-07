<div class="table-responsive pmd-card pmd-z-depth ">
    <table id="table-data" class="table  table-bordered table-striped table-condensed dataTable no-footer">
        <!-- <colgroup>
            <col width="5%">
            <col width="5%">
            <col width="20%">
            <col width="20%">
            <col width="15%">
            <col width="15%">
            <col width="15%">
            <col width="10%">
            <col width="5%">
        </colgroup> -->
        <thead>
            <tr>
                <td align="center"><input type="checkbox" name="chk_all_item_id"
                        onclick="checkbox_all_item_id(document.forms[0].chk_item_id);"></td>
                <td align="center"><b>STT</b></td>
                <td align="center"><b>Thông tin</b></td>
                <td align="center"><b>Gói nâng cấp</b></td>
                <td align="center"><b>Phê duyệt</b></td>
                <td align="center"><b>#</b></td>
            </tr>
        </thead>
        <tbody id="body_data">
            @if(count($datas) > 0)
                @foreach ($datas as $key => $data)
                @php $id = $data->id; $i = 1; @endphp
                    @if($data->status_name == 'Đã phê duyệt')
                    <tr style="background:#04ff0033">
                    @else
                    <tr>
                    @endif
                        <td style="width:5% ;vertical-align: middle;" align="center" ><input type="checkbox" name="chk_item_id"
                                value="{{ $data->id }}"></td>
                        <td style="width:5% ;vertical-align: middle;" align="center" >{{($datas->currentPage() - 1)*$datas->perPage() + ($key + 1)}}</td>
                        <!-- <td style="white-space: inherit;vertical-align: middle;" align="center">{{ isset($data->money) ? $data->money : '' }}</td> -->
                        <td style="width:35% ;color:#00ab5f;white-space: inherit;vertical-align: middle;">
                            <span>Tên khách hàng: {{ isset($data->user_name) ? $data->user_name : '' }}</span> <br>
                            <span>Số điện thoại: {{ isset($data->phone) ? $data->phone : '' }}</span><br>
                            <span>Email: {{ isset($data->email) ? $data->email : '' }}</span><br>
                            <span>Địa chỉ: {{ isset($data->address) ? $data->address : '' }}</span><br>
                            <span>Tham gia ngày: {{ isset($data->created_at) ? $data->created_at : '' }}</span><br>
                        </td>
                        <?php $dataJson = json_decode($data->package);
                         ?>
                        <td style="width:35% ;color:#00ab5f;white-space: inherit;vertical-align: middle;">
                            <span>Gói nâng cấp: {{ isset($dataJson->name) ? $dataJson->name : '' }}</span> <br>
                            <span>Giá giói: <span style="color:#ffcd6a;font-weight">{{ isset($dataJson->money) ? number_format($dataJson->money,0, '', ',') : '' }}</span>  đ</span><br>
                            <span>Thành tiền (+10% VAT): <span style="color:#ffcd6a;font-weight">{{ isset($data->money_vat) ? number_format($data->money_vat,0, '', ',') : '' }}</span> đ</span><br>
                            <span>Ngày đăng ký: {{ isset($data->created_at) ? $data->created_at : '' }}</span><br>
                            <span>Trạng thái: {{ isset($data->status_name) ? $data->status_name : '' }}</span><br>
                        </td>
                        <td style="width:5% ;vertical-align: middle;" align="center" onclick="{select_row(this);}" align="center">
                            <label class="custom-control custom-checkbox p-0 m-0 pointer " style="cursor: pointer;">
                                <input type="checkbox" hidden class="custom-control-input toggle-status" id="status_{{$id}}" data-id="{{$id}}" {{ $data->status == 1 ? 'checked' : '' }}>
                                <span class="custom-control-indicator p-0 m-0" onclick="JS_ApprovePayment.changeStatusApprovePayment('{{$id}}')"></span>
                            </label>
                        </td>
                        <td style="width:5% ;color: #ffb600;white-space: inherit;vertical-align: middle;" align="center" onclick="JS_ApprovePayment.edit('{{$id}}')"><i class="far fa-eye"></i></td>
                    </tr>
                @endforeach
            @endif
        </tbody>
        <tfoot>
            @if(count($datas) > 0)
            <tr class="fw-bold" id="pagination">
                <td colspan="10">{{$datas->links('pagination.phantrang')}}</td>
            </tr>
            @else
            <tr id="pagination" align="center">
                <td colspan="10">Không tìm thấy dữ liệu!</td>
            </tr>
            @endif
        </tfoot>
    </table>
</div>
