<div class="modal-dialog modal-lg">
    <div class="modal-content card">
        <div class="modal-header">
            <h5 class="modal-title">Thông tin đăng nhập</h5>
            <button type="button" class="btn btn-sm" data-bs-dismiss="modal">
                X
            </button>
        </div>
        <div class="modal-body">
            <table class="table">
                <colgroup>
                    <col width="25%">
                    <col width="75%">
                </colgroup>
                <tbody>
                    <tr>
                        <td colspan="2"><h6 style="color: #fff079 !important;">Thông tin cơ bản</h6></td>
                    </tr>
                    <tr>
                        <td>Họ và tên</td>
                        <td>{{ $datas->name ?? '' }}</td>
                    </tr>
                    <tr>
                        <td>Địa chỉ email</td>
                        <td>{{ $datas->email ?? '' }}</td>
                    </tr>
                    <tr>
                        <td>Ngày sinh</td>
                        <td>{{ !empty($datas->dateBirth) ? date('d/m/Y', strtotime($datas->dateBirth)) : '' }}</td>
                    </tr>
                    <tr>
                        <td>Số điện thoại</td>
                        <td>{{ $datas->phone ?? '' }}</td>
                    </tr>
                    <tr>
                        <td>Địa chỉ</td>
                        <td>{{ $datas->address ?? '' }}</td>
                    </tr>
                    <tr>
                        <td>Công ty</td>
                        <td>{{ $datas->company ?? '' }}</td>
                    </tr>
                    <tr>
                        <td>Chức vụ</td>
                        <td>{{ $datas->position ?? '' }}</td>
                    </tr>
                    <tr>
                        <td>Gia nhập ngày</td>
                        <td>{{ !empty($datas->date_join) ? date('d/m/Y', strtotime($datas->date_join)) : '' }}</td>
                    </tr>
                    <tr>
                        <td colspan="2"><h6 style="color: #fff079 !important;">Thông tin khác</h6></td>
                    </tr>
                    <tr>
                        <td>Địa chỉ IP</td>
                        <td>{{ $datas->ip ?? '' }}</td>
                    </tr>
                    <tr>
                        <td>Thời gian đăng nhập</td>
                        <td>{{ !empty($datas->login_date) ? date('H:i:s d/m/Y', strtotime($datas->login_date)) : '' }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>