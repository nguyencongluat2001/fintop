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
            <col width="5%">
            <col width="70%">
            <col width="20%">
        </colgroup>
        <thead>
            <tr>
                <td align="center"><input type="checkbox" name="chk_all_item_id"
                        onclick="checkbox_all_item_id(document.forms[0].chk_item_id);"></td>
                <td align="center"><b>STT</b></td>
                <td align="center"><b>Bảng cần sao lưu</b></td>
                <td align="center"><b>#</b></td>
            </tr>
        </thead>
        <tbody>
            @if(count($datas) > 0)
            @foreach ($datas as $key => $data)
            <tr>
                <td style="width:5% ;vertical-align: middle;" align="center">
                    <input type="checkbox" name="chk_item_id" value="{{ $data->TABLE_NAME }}">
                </td>
                <td style="vertical-align: middle;" align="center" onclick="{select_row(this);}">{{ $key + 1 }}</td>
                <td style="vertical-align: middle;" onclick="{select_row(this);}">{{ $data->TABLE_NAME }}</td>
                <td style="vertical-align: middle;" align="center">
                    <button type="button" class="btn btn-primary" onclick="JS_BackupData.exportSQL('{{ $data->TABLE_NAME }}')">Xuất SQL</button>
                    <button type="button" class="btn btn-success" onclick="JS_BackupData.exportEXCEL('{{ $data->TABLE_NAME }}')">Xuất EXCEL</button>
                </td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
</div>