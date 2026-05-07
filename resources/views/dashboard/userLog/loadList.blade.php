<style>
    .unit-edit span {
        font-size: 19px;
    }
</style>
@php
use Modules\System\Dashboard\Blog\Models\BlogImagesModel;

@endphp
<div class="table-responsive pmd-card pmd-z-depth ">
    <table id="table-data" class="table  table-bordered table-striped table-condensed dataTable no-footer">
        <colgroup>
            <col width="5%">
            <col width="20%">
            <col width="20%">
            <col width="20%">
            <col width="15%">
            <col width="10%">
        </colgroup>
        <thead>
            <tr>
                {{--<td align="center"><input type="checkbox" name="chk_all_item_id"
                        onclick="checkbox_all_item_id(document.forms[0].chk_item_id);"></td>--}}
                <td align="center"><b>STT</b></td>
                <td align="center"><b>Tên</b></td>
                <td align="center"><b>Email</b></td>
                <td align="center"><b>IP</b></td>
                <td align="center"><b>Thời gian</b></td>
                <td align="center"><b>#</b></td>
            </tr>
        </thead>
        <tbody>
            @if(count($datas) > 0)
            @foreach ($datas as $key => $data)
            <tr>
                {{--<td style="width:5% ;vertical-align: middle;" align="center"><input type="checkbox" name="chk_item_id"
                        value="{{ $data->TABLE_NAME }}"></td>--}}
                <td style="vertical-align: middle;" align="center">{{ $key + 1 }}</td>
                <td style="vertical-align: middle;">{{ $data->name }}</td>
                <td style="vertical-align: middle;">{{ $data->email }}</td>
                <td style="vertical-align: middle;" align="center">{{ $data->ip }}</td>
                <td style="vertical-align: middle;" align="center">{{ date('H:i:s d/m/Y', strtotime($data->created_at)) }}</td>
                <td style="vertical-align: middle;" align="center">
                    <button type="button" class="btn btn-primary" onclick="JS_UserLog.view('{{ $data->user_id }}')"><i class="fas fa-eye"></i></button>
                </td>
            </tr>
            @endforeach
            @endif
        </tbody>
        <tfoot>
            @if(count($datas) > 0)
            <tr>
                <td colspan="10">{{ $datas->links('pagination.phantrang') }}</td>
            </tr>
            @else
            <tr>
                <td colspan="10">Không tìm thấy dữ liệu</td>
            </tr>
            @endif
        </tfoot>
    </table>
</div>