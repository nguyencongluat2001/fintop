<style>
    .unit-edit span {
        font-size: 19px;
    }

    body {
        margin: 2rem;
    }

    .modal-dialog {
        max-width: 800px;
        margin: 30px auto;
    }



    .modal-body {
        position: relative;
        padding: 0px;
    }

    .close {
        position: absolute;
        right: -30px;
        top: 0;
        z-index: 999;
        font-size: 2rem;
        font-weight: normal;
        color: #fff;
        opacity: 1;
    }

    td>p {
        overflow-y: scroll;
        overflow-x: hidden;
    }
</style>
{{-- @php
use Modules\System\Recordtype\Helpers\WorkflowHelper;
@endphp --}}
<div class="table-responsive pmd-card pmd-z-depth ">
    <table id="table-data" class="table  table-bordered table-striped table-condensed dataTable no-footer">
        <colgroup>
            <col width="7%">
            <col width="7%">
            <col width="65%">
            <col width="20%">
        </colgroup>
        <thead>
            <tr>
                <td align="center"><input type="checkbox" name="chk_all_item_id" onclick="checkbox_all_item_id(document.forms[0].chk_item_id);"></td>
                <td align="center"><b>STT</b></td>
                <td align="center"><b>Tên cẩm nang</b></td>
                <td align="center"><b>#</b></td>
            </tr>
        </thead>
        <tbody>

            @foreach ($datas as $key => $data)
            <tr>
                <td style="padding-top: 20px;" align="center"><input type="checkbox" name="chk_item_id" value="{{ $data->id }}"></td>
                <td style="padding-top: 20px;" align="center">{{ $data->order }}
                <td style="padding-top: 20px;white-space: inherit;" ondblclick="" onclick="{select_row(this);}">
                    {{$data->name_handbook}}
                </td>
                <td style="padding-top: 15px" align="center">
                    <a target="_blank" href="{{$data->url_link}}" class="btn btn-info" title="Xem trước"><i class="fas fa-external-link-alt"></i></a>
                    {{--
                        <button type="button" class="btn btn-info" title="Sao chép đường dẫn" onclick="coppy('{{$data->url_link}}')">
                    <i class="fas fa-copy"></i>
                    </button>
                    <button type="button" class="btn btn-success" title="Xem trực tuyến" onclick="JS_Handbook.seeVideo('{{$data->id}}')"><i class="fas fa-eye"></i></button>
                    --}}
                    <span class="btn btn-warning text-cursor" title="Sửa" onclick="JS_Handbook.edit('{{$data->id}}')"><i class="fas fa-edit"></i></span>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <tfoot>
        <tr>
            <td colspan="10">
                {{$datas->links('pagination.phantrang')}}
            </td>
        </tr>
    </tfoot>
</div>
<!-- <div class="modal" id="videomodal" role="dialog"></div> -->

<script>
    function coppy(e) {
        navigator.clipboard.writeText(e);
        // Alert the copied text
        Swal.fire({
            position: 'top-start',
            icon: 'success',
            title: 'Coppy đường dẫn thành công!',
            showConfirmButton: false,
            timer: 3000
        })
    }
</script>