<style>
    
    .unit-edit span {
        font-size: 19px;
    }

    #frmAdd .modal-dialog {
        max-width: none !important
    }

    @media (min-width: 1200px) {
        .modal-xl {
            padding-left: 20%;
            --bs-modal-width: 1740px !important;
        }
    }

    .modal.show .modal-dialog {
        transform: none;
    }
    #frmAdd table input[type=number]::-webkit-inner-spin-button, 
    #frmAdd table input[type=number]::-webkit-outer-spin-button {
    -webkit-appearance: none;
    margin: 0;
    }
</style>

<form id="frmAdd" role="form" action="" method="POST" enctype="multipart/form-data" >
    @csrf
    <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="id" id="id" value="{{isset($datas->id)?$datas->id:''}}">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content card">
            <div class="modal-header" style="padding:4px">
                <h5 class="modal-title"></h5>
                <button type="button" class="btn btn-sm" data-bs-dismiss="modal" style="margin-bottom: 0rem !important;background: red;color:white">
                    X
                </button>
            </div>
             <!-- <div class="modal-header" style="padding:4px">
                <button type="button" class="btn btn-sm pt-2" data-bs-dismiss="modal" style="background: red;color:white">
                            Đóng
                </button>
            </div> -->
            
            <div class="card-body">
                <table class="table  table-bordered table-striped table-condensed dataTable no-footer">
                    <thead>
                        <tr>
                            <td style="white-space: inherit;vertical-align: middle" align="center" class="required"><b>Mã CP</b></td>
                            <td style="white-space: inherit;vertical-align: middle" align="center" class="required"><b>Sàn</b></td>
                            <td style="white-space: inherit;vertical-align: middle" align="center" class="required"><b>Nhóm nghành HĐKD</b></td>
                            <td style="white-space: inherit;vertical-align: middle" align="center" class="required"><b>Xếp hạng TA</b></td>
                            <td style="white-space: inherit;vertical-align: middle" align="center" class="required"><b>Xu hướng CP</b></td>
                            <td style="white-space: inherit;vertical-align: middle" align="center" class="required"><b>Tín hiệu hành động</b></td>
                            <td style="white-space: inherit;vertical-align: middle" align="center" class="required"><b>Vùng giá giao dịch</b></td>
                            <td style="white-space: inherit;vertical-align: middle" align="center"><b>Điểm QTRR</b></td>
                            <!-- <td style="white-space: inherit;vertical-align: middle" align="center" class="required"><b>Xếp hạng FA</b></td> -->
                            <!-- <td style="white-space: inherit;vertical-align: middle" align="center"><b>PTDN FA</b></td> -->
                            <!-- <td style="white-space: inherit;vertical-align: middle" align="center" class="required"><b>Thứ tự</b></td> -->
                            <td style="white-space: inherit;vertical-align: middle" align="center"><b>#</b></td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            
                        	@if(isset($_SESSION['role']) && ($_SESSION['role'] == 'ADMIN' || $_SESSION['role'] == 'MANAGE' ||
                             $_SESSION['role'] == 'CV_ADMIN' || $_SESSION['role'] == 'CV_ADMIN,SALE_ADMIN' || $_SESSION['role'] == 'CV_ADMIN,SALE_BASIC'))
                            <td style="width:8%;vertical-align: middle;" align="center"><input id="code_cp" name="code_cp" type="text" value="{{isset($datas->code_cp)?$datas->code_cp:''}}" class="form-control"></td>
                            <td style="width:10%;vertical-align: middle;" align="center"><input id="exchange" name="exchange" type="text" value="{{isset($datas->exchange)?$datas->exchange:''}}" class="form-control"></td>
                            <td style="width:12%;vertical-align: middle;">
                                <select class="form-control input-sm chzn-select" name="code_category" id="code_category">
                                    <option value="">--Chọn nhóm ngành--</option>
                                    @foreach($category as $key => $value)
                                    <option @if(isset($datas->code_category) && $value->code_category == $datas->code_category) selected @endif
                                        value="{{$value->code_category}}">{{$value->name_category}}</option>
                                    @endforeach
                                </select>
                            </td>
                            @else
                            <td style="width:8%;vertical-align: middle;" align="center">{{isset($datas->code_cp)?$datas->code_cp:''}}</td>
                            <td style="width:10%;vertical-align: middle;" align="center">{{isset($datas->exchange)?$datas->exchange:''}}</td>
                            <td style="width:12%;vertical-align: middle;">
                                <span>{{isset($datas->name_category)?$datas->name_category:''}}</span>
                            </td>
                            @endif
                            <td style="width:4%;vertical-align: middle;" align="center"><input id="ratings_TA" name="ratings_TA" type="text" value="{{isset($datas->ratings_TA)?$datas->ratings_TA:''}}" class="form-control"></td>
                            <td style="vertical-align: middle;"><textarea id="identify_trend" name="identify_trend" type="text" value="" class="form-control">{{isset($datas->identify_trend)?$datas->identify_trend:''}}</textarea></td>
                            <td style="width:10%;vertical-align: middle;" align="center"><input id="act" name="act" type="text" value="{{isset($datas->act)?$datas->act:''}}" class="form-control"></td>
                            <td style="width:7%;vertical-align: middle;" align="center"><input id="trading_price_range" name="trading_price_range" type="text" value="{{isset($datas->trading_price_range)?$datas->trading_price_range:''}}" class="form-control"></td>
                            <td style="width:7%;vertical-align: middle;" align="center"><input id="stop_loss_price_zone" name="stop_loss_price_zone" type="text" value="{{isset($datas->stop_loss_price_zone)?$datas->stop_loss_price_zone:''}}" class="form-control"></td>
                            <!-- <td style="width:4%;vertical-align: middle;" align="center"><input id="ratings_FA" name="ratings_FA" type="text" value="{{isset($datas->ratings_FA)?$datas->ratings_FA:''}}" class="form-control"></td> -->
                            <!-- <td style="width:4%;vertical-align: middle;" align="center">
                                <span id="add_link"><i class="fas fa-marker"></i></span><br>
                                <a href="" id="show_link" hidden target="_blank" style="text-decoration:underline">Xem</a>
                                <input type="hidden" name="url_link" id="url_link">
                            </td> -->
                            <td style="width:5%;vertical-align: middle;" align="center">
                                <p></p>
                                <button id="btn_create" type="button" class="btn btn-success" title="Xem trực tuyến"><i class="fas fa-thumbs-up"></i></button>
                            </td>
                        </tr>
                      
                    </tbody>
                </table>
                <div class="modal-header" style="padding:0px">
                    <!-- <h5 class="modal-title">Cập nhật cổ phiếu </h5> -->
                     @if(isset($_SESSION['role']) && ($_SESSION['role'] == 'ADMIN' || $_SESSION['role'] == 'MANAGE' ||
                             $_SESSION['role'] == 'CV_ADMIN' || $_SESSION['role'] == 'CV_ADMIN,SALE_ADMIN' || $_SESSION['role'] == 'CV_ADMIN,SALE_BASIC'))

                        <div class="col-md-2" style="display:flex">
                            <div style="padding: 5px;" class="required">
                                 STT 
                            </div>
                            <div>
                                <input id="order" name="order" type="number" value="{{isset($datas->order)?$datas->order:''}}" class="form-control" style="width: 100px;">
                            </div>
                        </div>
                        <div class="col-md-4" style="display:flex">
                            <div style="padding: 5px;" class="required">
                            Người đảm nhận
                            </div>
                            <div>
                            <input placeholder="Người đảm nhận" id="user_take_on" name="user_take_on" type="text" value="{{isset($datas->user_take_on)?$datas->user_take_on:''}}" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-2" style="display:flex">
                            <div style="padding: 5px;" class="required">
                            Xếp hạng FA
                            </div>
                            <div>
                            <input style="width:50px" id="ratings_FA" name="ratings_FA" type="text" value="{{isset($datas->ratings_FA)?$datas->ratings_FA:''}}" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4" style="display:flex">
                            <div style="padding: 5px;" class="required">
                            Link FA
                            </div>
                            <div>
                                <input style="width:250px" id="url_link" name="url_link" type="text" value="{{isset($datas->url_link)?$datas->url_link:''}}" class="form-control">
                                <!-- <span id="add_link"><i class="fas fa-marker" style="color:#5ba2ff"></i></span><br>
                                    <a href="" id="show_link" hidden target="_blank" style="text-decoration:underline">Xem</a>
                                <input type="hidden" name="url_link" id="url_link">  -->
                            </div>
                        </div>
                     @endif
                </div>
                <section class="content-wrapper pt-3">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row form-group">
                                <div class="col-lg-12" style="padding:2px;">
                                    <!-- <h class="h4 py-2"><i class="far fa-chart-bar"></i>. <span style="font-family: auto;" > Biểu đồ</span> </h> <br> -->
                                    <!-- <p>Nguồn theo: fireant</p> -->
                                    <iframe style="width:100%" height="500" src="https://fireant.vn/charts" 
                                        frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                                        allowfullscreen>
                                    </iframe>
                                    <span>Nguồn theo: fireant</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</form>