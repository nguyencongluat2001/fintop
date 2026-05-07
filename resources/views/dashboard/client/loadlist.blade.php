<!-- <style>
    .unit-edit span {
        font-size: 19px;
    }
</style> -->
@php
use Modules\System\Dashboard\Users\Models\UserModel;
@endphp
<!-- <div class="container">
    <div class="row">
        <div class="col-lg-6 mx-auto " style="display:flex">
            <div class="input-group box">
                    <input id="myInput" onkeyup="myFunction()"style="background: #000000;color: #ff9700;" type="text" class="input form-control form-control-lg rounded-pill rounded" placeholder="Từ kiếm theo từ khóa...">
            </div>
        </div>
    </div>
</div> -->
<div class="table-responsive pmd-card pmd-z-depth pt-2">
    <table  id="table-data" class="table  table-bordered table-striped table-condensed dataTable no-footer">
        <thead>
            <tr>
                <td align="center"><input type="checkbox" name="chk_all_item_id"
                        onclick="checkbox_all_item_id(document.forms[0].chk_item_id);"></td>
                <td align="center"><b>STT</b></td>
                <td align="center"><b>Thông tin người dùng</b></td>
                <td align="center"><b>Người quản lý</b></td>
                <!-- <td align="center"><b>Ảnh đại diện</b></td> -->
                <!-- <td align="center"><b>Thứ tự</b></td> -->
                <td align="center"><b>Trạng thái</b></td>
                <td align="center"><b>Nâng cấp</b></td>
            </tr>
        </thead>
        <tbody>
            @foreach ($datas as $key => $data)
            @php $id = $data['id']; @endphp
                <tr>
                    <td style="width:5%;vertical-align: middle;" align="center"><input type="checkbox" name="chk_item_id"
                            value="{{ $data['id'] }}"></td>
                    <td class="text-center td_order_{{$id}}" style="vertical-align: middle;" onclick="{select_row(this);}" ondblclick="click2('{{$id}}', 'order')">
                        <span id="span_order_{{$id}}" class="span_order_{{$id}}">{{ $key + 1 }}</span>
                    </td>
                    <td style="width:50%;height:150px;padding-left:30px;vertical-align: middle;" onclick="{select_row(this);}">
                       <div>
                           <div>Tên khách hàng: {{ $data['name'] }}</div>
                           <!-- <div>ID nhân sự : <span style="color:#ffb200">{{ $data['id_personnel'] }}</span> </div> -->
                           <div>Số điện thoại : {{ $data['phone'] }}</div>
                           <div>Địa chỉ Email : {{ $data['email'] }}</div>
                           <div>Địa chỉ : {{ $data['address'] }}</div>
                           <div>Ngày sinh : {{ $data['dateBirth'] }}</div>
                           <div>Ngày gia nhập : {{ $data['created_at'] }}</div>
                           <div>Thời gian đầu tư: 
                           @if($data['investment_time'] == '0-3')
                             0 - 3 tháng
                            @elseif($data['investment_time'] == '3-6')
                            3 - 6 tháng
                            @elseif($data['investment_time'] == '6-12')
                            6 - 12 tháng
                            @elseif($data['investment_time'] == '6-12')
                            1 năm
                            @endif
                        </div>

                           <div>Khẩu vị đầu tư : 
                            @if($data['investment_taste'] == 'nganhan')
                            Lướt sóng ngắn hạn
                            @elseif($data['investment_taste'] == 'daihan')
                            Trung và dài hạn
                            @elseif($data['investment_taste'] == 'linhhoat')
                            Linh hoạt kết hợp
                            @endif
                           </div>
                           <div>Công ty chứng khoán  : {{ $data['investment_company'] }}</div>
                           <div>Số TKCK VPS (nếu có) : {{ $data['account_tkck_vps'] }}</div>
                           <div>Loại tài khoản : @if( $data['account_type_vip'] == '') Thường @else 
                            <span style="color:#7dff00">{{ $data['account_type_vip'] }}</span>
                            @endif</div>
                           <div>Quyền truy cập : <span style="color:#ff7c00"> Khách hàng </span></div>
                       </div>
                        
                    </td>
                    <td style="width:20%;vertical-align: middle;" align="center" onclick="{select_row(this);}">
                        <span>
                            @php
                                $user =  UserModel::where('id_personnel',$data['id_manage'])->first(); 
                            @endphp
                            {{!empty($user->id_personnel)?$user->id_personnel:''}} - {{!empty($user->name)?$user->name:''}}
                        </span>
                    </td>
                    <!-- <td style="width:20%;vertical-align: middle;" align="center" onclick="{select_row(this);}">
                        <img  src="{{url('/file-image/avatar/')}}/{{$data['avatar']}}" alt="Image" style="height: 150px;width: 150px;object-fit: cover;">
                    </td> -->
                    <!-- <td class="text-center" style="vertical-align: middle;" onclick="{select_row(this);}">
                        <span class="me-3" style="cursor: pointer;" onclick="JS_User.upNdown('down','{{$id}}', this)"><i class="fas fa-long-arrow-alt-down"></i></span>
                        <span style="cursor: pointer;" onclick="JS_User.upNdown('up', '{{$id}}', this)"><i class="fas fa-long-arrow-alt-up"></i></span>
                    </td> -->
                    <td onclick="{select_row(this);}" align="center" style="vertical-align: middle;">
                        <label class="custom-control custom-checkbox p-0 m-0 pointer " style="cursor: pointer;">
                            <input type="checkbox" hidden class="custom-control-input toggle-status" id="status_{{$id}}" data-id="{{$id}}" {{ $data->status == 1 ? 'checked' : '' }}>
                            <span class="custom-control-indicator p-0 m-0" onclick="JS_Client.changeStatus('{{$id}}')"></span>
                        </label>
                    </td>
                    <td onclick="{select_row(this);}" align="center" style="vertical-align: middle;">
                        <!-- <span class="text-cursor text-warning" onclick="JS_Client.edit('{{$id}}')"><i style="font-size: 30px;" class="fas fa-edit"></i></span> -->
                        <span class="btn btn-warning " onclick="JS_Client.edit_data('{{$data['id']}}')"><i class="fas fa-edit"> Sửa</i></span>
                        <span class="btn btn-success " onclick="JS_Client.edit('{{$id}}')"><i class="fas fa-edit"></i></span>
                        @if(!empty($_SESSION['role']) && ($_SESSION['role'] == 'ADMIN' || $_SESSION['role'] == 'MANAGE'))
                        <span class="text-cursor text-warning" onclick="JS_Client.edit_upgradeAcc('{{$id}}')"><i style="font-size: 30px;color:#00ff10" class="fas fa-users-cog"></i></span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div style="width:100%" class="row">
    <tfoot>
        <tr>
            <td colspan="10">
                {{$datas->links('pagination.phantrang')}}
            </td>
        </tr>
    </tfoot>
    </div>
</div>

<script>

function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("table-data");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
