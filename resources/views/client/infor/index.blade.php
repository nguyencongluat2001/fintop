@extends('client.layouts.index')
@section('body-client')
<link rel="stylesheet" href="../clients/css/style.css">
<script type="text/javascript" src="{{ URL::asset('dist\js\backend\client\JS_InforClient.js') }}"></script>
<title>TÀI CHÍNH & ĐẦU TƯ</title>
<style>
    form{
        width: 100%; 
        padding-left: 0px;
    }
    /* .form-control{
        color:#fff079;
    } */
   button:before {
      background: none ;
   }
   .form-control{
      background: #ffffff ;
   }
   .form-control-label{
      color: #ffffff;
      padding-left: 20px;
   }
   .infor-avatar{
    position: relative;
   }
   .infor-avatar .upload-avatar{
    position: absolute;
    right: 0;
    bottom: 0;
    width: 2rem;
    height: 2rem;
    border: 1px solid #fff;
    border-radius: 50%;
    background-color: #ccc;
    display: flex;
    align-items: center;
    justify-content: center;
   }

</style>
<section class="container">
    <div class=" pb-3 d-lg-flex gx-5">
        <div class="col-lg-12">
            <form action="" method="POST" id="frmLoadlist_infor">
                @csrf
                <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="role" id="role" value="{{ isset($datas->role) ? $datas->role : '' }}">
                <input type="hidden" name="id" id="id" value="{{ isset($datas->id) ? $datas->id : '' }}">
                <div class="home_index_vnindex pt-1 pb-3" style="background:#ffffff91 !important;border-radius:0px !important">
                    <!-- phần giới thiệu FIn top -->
                    <div class="home_index_child" style="background:#700e13 !important">
                        <div class="col-lg-12" style="padding:10px;">
                            <div class="row">
                                <div class="col-md-8" style="color: black;">
                                   {{-- @if(!empty($data) && $_SESSION["email"] == $data['email']) --}}
                                    {{-- @endif --}}
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group" >
                                                    <p for="example-text-input" class="form-control-label">Tên</p>
                                                    <input disabled="disabled" class="form-control" type="text" id="name" name="name" value="{{isset($datas->name) ? $datas->name : ''}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6 " style="display:none">
                                                <div class="form-group">
                                                    <p for="example-text-input" class="form-control-label">Địa chỉ Email</p>
                                                    <input class="form-control" id="email" type="email" name="email" value="{{isset($datas->email) ? $datas->email : ''}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6 " onclick="JS_InforClient.viewFormContact()">
                                                <div class="form-group" >
                                                    <p for="example-text-input" class="form-control-label">Địa chỉ Email</p>
                                                    <input disabled="disabled" id="email_id"  style="background:#e9ecef" class="form-control" value="{{isset($datas->email) ? $datas->email : ''}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6 pt-2">
                                                <div class="form-group">
                                                    <p for="example-text-input" class="form-control-label">Ngày sinh</p>
                                                    <input disabled="disabled" class="form-control" type="date" id="dateBirth" name="dateBirth" value="{{isset($datas->dateBirth) ? $datas->dateBirth : ''}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6 pt-2" style="display:none">
                                                <div class="form-group">
                                                    <p for="example-text-input" class="form-control-label">Số điện thoại</p>
                                                    <input class="form-control" type="text" id="phone" name="phone" value="{{isset($datas->phone) ? $datas->phone : ''}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6 pt-2" onclick="JS_InforClient.viewFormContact()">
                                                <div class="form-group">
                                                    <p for="example-text-input" class="form-control-label">Số điện thoại</p>
                                                    <input disabled="disabled" id="phone_id" style="background:#e9ecef" class="form-control" value="{{isset($datas->phone) ? $datas->phone : ''}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 pt-2">
                                                <div class="form-group">
                                                    <p for="example-text-input" class="form-control-label">Địa chỉ</p>
                                                    <input disabled="disabled" class="form-control" type="text" id="address" name="address" value="{{isset($datas->address) ? $datas->address : ''}}">
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="form-wrapper col-md-4">
                                                <!-- <label for="">Thời gian đầu tư <span class="request_star">*</span></label> -->
                                                <p for="example-text-input" class="form-control-label">Thời gian đầu tư</p>
                                                <select name="investment_time" id="investment_time" class="form-control chzn-select" disabled="disabled">
                                                    <option value="0-3"  {{!empty($datas->investment_time) && $datas->investment_time == '0-3' ? 'selected' : ''}}>0 - 3 tháng</option>
                                                    <option value="3-6" {{!empty($datas->investment_time) && $datas->investment_time == '3-6' ? 'selected' : ''}}>3 - 6 tháng</option>
                                                    <option value="6-12" {{!empty($datas->investment_time) && $datas->investment_time == '6-12' ? 'selected' : ''}}>6 - 12 tháng</option>
                                                    <option value="1nam" {{!empty($datas->investment_time) && $datas->investment_time == '1nam' ? 'selected' : ''}}> 1 năm</option>
                                                </select>
                                            </div>
                                            <div class="form-wrapper col-md-4">
                                                <!-- <label for="">Khẩu vị đầu tư <span class="request_star">*</span></label> -->
                                                <p for="example-text-input" class="form-control-label">Khẩu vị đầu tư</p>
                                                <select name="investment_taste" id="investment_taste" class="form-control chzn-select" disabled="disabled">
                                                    <option value="nganhan" {{!empty($datas->investment_taste) && $datas->investment_taste == 'nganhan' ? 'selected' : ''}}>Lướt sóng ngắn hạn</option>
                                                    <option value="daihan" {{!empty($datas->investment_taste) && $datas->investment_taste == 'daihan' ? 'selected' : ''}}>Trung và dài hạn</option>
                                                    <option value="linhhoat" {{!empty($datas->investment_taste) && $datas->investment_taste == 'linhhoat' ? 'selected' : ''}}>Linh hoạt kết hợp</option>
                                                </select>
                                            </div>
                                            <div class="form-wrapper col-md-4">
                                                <!-- <label for="">Công ty chứng khoán <span class="request_star">*</span></label> -->
                                                <p for="example-text-input" class="form-control-label">Công ty chứng khoán</p>
                                                <select name="investment_company" id="investment_company" class="form-control chzn-select" disabled="disabled">
                                                    <option value="TKCK" {{!empty($datas->investment_company) && $datas->investment_company == 'TKCK' ? 'selected' : ''}}>Chưa TKCK</option>
                                                    <option value="vps" {{!empty($datas->investment_company) && $datas->investment_company == 'vps' ? 'selected' : ''}}>VPS</option>
                                                    <option value="ssi" {{!empty($datas->investment_company) && $datas->investment_company == 'ssi' ? 'selected' : ''}}>SSI</option>
                                                    <option value="vnd" {{!empty($datas->investment_company) && $datas->investment_company == 'vnd' ? 'selected' : ''}}>VND</option>
                                                    <option value="khac" {{!empty($datas->investment_company) && $datas->investment_company == 'khac' ? 'selected' : ''}}>Công ty khác</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 pt-2">
                                                <div class="form-group">
                                                    <p for="example-text-input" class="form-control-label">Nhập số TKCK VPS (nếu có)</p>
                                                    <div style="position: relative;">
                                                        <input disabled="disabled" placeholder="Nhập số TKCK VPS (nếu có)" id="account_tkck_vps" type="text" class="form-control" name="account_tkck_vps" value="{{!empty($datas->account_tkck_vps)?$datas->account_tkck_vps:''}}">
                                                        <!-- <span><i class="passShowHide fas fa-eye"></i></span> -->
                                                    </div>
                                                </div>
                                            </div> 
                                            <div class="col-md-4 pt-2">
                                                <div class="form-group">
                                                    <p for="example-text-input" class="form-control-label">ID người giới thiệu</p>
                                                    <div style="position: relative;">
                                                        <input disabled="disabled" onchange="JS_InforClient.getPersonnel()" placeholder="Nhập ID" id="id_manage" type="text" class="form-control" name="id_manage" value="{{!empty($datas->id_manage)?$datas->id_manage:''}}">
                                                        <!-- <span><i class="passShowHide fas fa-eye"></i></span> -->
                                                    </div>
                                                </div>
                                            </div> 
                                            <div class="col-md-4 pt-2">
                                                <div class="form-group">
                                                    <p for="example-text-input" class="form-control-label">Tên người giới thiệu</p>
                                                    <div style="position: relative;">
                                                    <input style="cursor: unset;text-align: left;" placeholder="" readonly id="name_personnel" type="button" class="form-control" name="name_personnel" value="{{isset($data['user_introduce_name']) ? $data['user_introduce_name'] : ''}}">

                                                        <!-- <input disabled="disabled" id="" type="text" style="background:#e9ecef" class="form-control" name="" value="{{!empty($check_ten_nv_gioi_thieu)?$check_ten_nv_gioi_thieu:''}}"> -->
                                                    </div>
                                                </div>
                                            </div> 
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 pt-2">
                                                <div class="form-group">
                                                    <p for="example-text-input" class="form-control-label">Công ty</p>
                                                    <input disabled="disabled" class="form-control" type="text" id="company" name="company" value="{{isset($datas->user_infor->company) ? $datas->user_infor->company : ''}}">
                                                </div>
                                            </div>
                                            <div class="col-md-4 pt-2">
                                                <div class="form-group">
                                                    <p for="example-text-input" class="form-control-label">Chức vụ</p>
                                                    <input disabled="disabled" class="form-control" type="text" id="position" name="position" value="{{isset($datas->user_infor->position) ? $datas->user_infor->position : ''}}">
                                                </div>
                                            </div>
                                            <div class="col-md-4 pt-2" style="display:none">
                                                <div class="form-group">
                                                    <p for="example-text-input" class="form-control-label">Gia nhập ngày</p>
                                                    <input class="form-control" type="date" id="date_join" name="date_join" value="{{isset($datas->user_infor->date_join) ? $datas->user_infor->date_join : ''}}">
                                                </div>
                                            </div>
                                            <div class="col-md-4 pt-2" >
                                                <div class="form-group">
                                                    <p for="example-text-input" class="form-control-label">Gia nhập ngày</p>
                                                    <input disabled="disabled" class="form-control" type="date" id="date_join" name="date_join" value="{{isset($datas->user_infor->date_join) ? $datas->user_infor->date_join : ''}}">
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <center>
                                            <div id="editForm">
                                                <button style="background: #165c38;color: #fff079;font-weight: 600;font-family: system-ui;" type="button" class="btn rounded-pill px-4 btn-outline-warning" onclick="JS_InforClient.formEdit()" type="button">
                                                    Chỉnh sửa
                                                </button>
                                            </div>
                                        </center>
                                        <center>
                                            <div id="update" style="display:none">
                                                <button style="background: #d5204f;color: #fff079;font-weight: 600;font-family: system-ui;" type="button" class="btn rounded-pill px-4 btn-outline-warning" onclick="JS_InforClient.updateCustomer()" type="button">
                                                    Cập nhật
                                                </button>
                                            </div>
                                        </center>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card card-profile">
                                        <div class=" justify-content-center" style="--bs-gutter-x: 1.5rem;
                                                                                    --bs-gutter-y: 0;
                                                                                    display: flex;
                                                                                    flex-wrap: wrap;
                                                                                    margin-top: calc(var(--bs-gutter-y) * -1);
                                                                                    margin-right: none !important;
                                                                                    margin-left: calc(var(--bs-gutter-x)/ -2);">
                                            <div class="col-4 col-lg-4 order-lg-2">
                                                <div class="mt-n4 mt-lg-n6 mb-4 mb-lg-0 infor-avatar">
                                                    <a href="javascript:;">
                                                        <img id="avatar" src="{{url('file-image/avatar')}}/{{$datas->avatar}}" style="height: 140px;width: 150px;object-fit: cover;border-radius:50%">
                                                    </a>
                                                    <label for="upload-avatar" class="upload-avatar" type="button"><i class="fas fa-camera"></i></label>
                                                    <input type="file" hidden name="upload-avatar" id="upload-avatar">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body pt-0">
                                            <div class="text-center mt-4">
                                                <h5>
                                                    {{isset($datas->name) ? $datas->name : ''}}
                                                </h5>
                                                <div>
                                                    <i class="ni location_pin mr-2"></i>Hội viên: 
                                                    @if(isset($datas->account_type_vip) && $datas->account_type_vip == 'VIP1')
                                                       Bạc
                                                    @elseif(isset($datas->account_type_vip) && $datas->account_type_vip == 'VIP2')
                                                       Vàng
                                                    @else
                                                       Tiêu Chuẩn
                                                    @endif
                                                    <br>
                                                    <i class="ni location_pin mr-2"></i>Ngày đăng ký: {{isset($datas->date_update_vip) ? $datas->date_update_vip : ''}}
                                                </div>
                                                <br>
                                                <span id='btn_changePass'>
                                                    <button class="btn rounded-pill px-4 btn-outline-warning" style="background: #60bfff;color: #122436;font-weight: 600;height: 38px;" type="button">
                                                        Đổi mật khẩu
                                                    </button>
                                                </span>
                                                
                                                <a type="button" class="btn rounded-pill px-4 btn-outline-warning" style="background: #165c38;color:#fff079;font-weight: 600;" href="{{ url('client/privileges/index') }}"></i>Nâng cấp tài khoản</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @if(count($vip) > 0)
    <div class="home_index_vnindex pt-1 pb-3" style="background:#ffffff91 !important;border-radius:0px !important">
        <!-- phần giới thiệu FIn top -->
        <div class="home_index_child" >
            <div class="col-lg-12" style="padding:10px;">
                <div class="row">
                <table id="table-data" style="background:#700e13 !important;color: white;" class="table  table-bordered table-striped table-condensed dataTable no-footer">
                    <colgroup>
                        <col width="30%">
                        <!-- <col width="10%"> -->
                        <col width="70%">
                    </colgroup>    
                    <thead>
                        <tr>
                            <td style="white-space: inherit;vertical-align: middle" align="center"><b>Thông tin</b></td>
                            <td style="white-space: inherit;vertical-align: middle" align="center"><b>Hóa đơn</b></td>
                        </tr>
                    </thead>
                    <tbody id="body_data">
                        @if(count($vip) > 0)
                            @foreach ($vip as $key => $data)
                            @php $id = $data->id; $i = 1; @endphp
                            <tr style="color:#ffffff">
                                <td style="white-space: inherit;    font-size: 20px;" >
                                    <span>
                                        <?php $convert = json_decode($data->package);
                                         ?>
                                            <span>Ngày thanh toán: {{!empty($data->created_at)?$data->created_at:''}}</span><br>
                                            <span>Loại gói: {{!empty($convert->name)?$convert->name:''}}</span><br>
                                            <span>Trạng thái phê duyệt: @if($data->status == 0)
                                                Chưa phê duyệt
                                                @else
                                                Đã phê duyệt
                                                @endif
                                            </span><br>

                                    </span>
                                </td>
                                <td style="white-space: inherit;vertical-align: middle" >
                                    <span>
                                        <div class="m-auto py-2">
                                            @if(!empty($convert->code) && $convert->code == 'VIP1_3')
                                            <img class="card-img " src="../clients/img/vip1_3.PNG" alt="Card image" style="width:100%">
                                            @elseif(!empty($convert->code) && $convert->code == 'VIP1_6')
                                            <img class="card-img " src="../clients/img/vip1_6.PNG" alt="Card image" style="width:100%">
                                            @elseif(!empty($convert->code) && $convert->code == 'VIP1_12')
                                            <img class="card-img " src="../clients/img/vip1_12.PNG" alt="Card image" style="width:100%">
                                            @elseif(!empty($convert->code) && $convert->code == 'VIP2_3')
                                            <img class="card-img " src="../clients/img/vip2_3.PNG" alt="Card image" style="width:100%">
                                            @elseif(!empty($convert->code) && $convert->code == 'VIP2_6')
                                            <img class="card-img " src="../clients/img/vip2_6.PNG" alt="Card image" style="width:100%">
                                            @elseif(!empty($convert->code) && $convert->code == 'VIP2_12')
                                            <img class="card-img " src="../clients/img/vip2_12.PNG" alt="Card image" style="width:100%">
                                            @endif
                                        </div>
                                    </span>
                                </td>
                            </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
    @endif
</section>
<div class="modal" id="formmodal" role="dialog"></div>
<div class="modal" id="formmodal_res" role="dialog"></div>
<script src="../clients/js/jquery.min.js"></script>
<div class="modal fade" id="editmodal" role="dialog"></div>
<div class="modal " id="editPassmodal" role="dialog" style=" width: 100%;height: 100%;background: #0000007d; background-repeat:no-repeat;background-size: cover;"></div>
<div id="dialogconfirm"></div>
<script type="text/javascript">
    var baseUrl = '{{ url('') }}';
    var JS_InforClient = new JS_InforClient(baseUrl, 'client', 'infor');
    $(document).ready(function($) {
        JS_InforClient.loadIndex(baseUrl);
    })
</script>
@endsection