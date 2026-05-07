<div class="modal-dialog modal-lg" style="padding-top: 100px;">
    <div class="modal-content card">
        <div class="modal-header">
            <h5 class="modal-title">Cập nhật TOP Cổ Phiếu</h5>
            <button type="button" class="btn btn-sm" data-bs-dismiss="modal">
                X
            </button>
        </div>
        <div class="modal-body">
            <form id="frmAdd">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_id" id="_id" value="{{!empty($datas->id) ? $datas->id : ''}}">
                <div class="row form-group">
                    <span class="col-md-3 control-label required">Tiêu đề</span>
                    <div class="col-md-8">
                        <input class="form-control" type="text" value="{{isset($datas['title']) ? $datas['title'] : ''}}" name="title" id="title" placeholder="Nhập tiêu đề..." />
                    </div>
                </div>
                <div class="row form-group">
                    <span class="col-md-3 control-label required">Loại</span>
                    <div class="col-md-8">
                        <input class="form-control" type="text" value="{{isset($datas['type']) ? $datas['type'] : ''}}" name="type" id="type" placeholder="Nhập tiêu đề..." />
                    </div>
                </div>
                <div class="row form-group">
                    <span class="col-md-3 control-label required">Nhập xxx</span>
                    <div class="col-md-8">
                        <input class="form-control" type="text" value="{{isset($datas->code) ? $datas->code : ''}}" name="code" id="code" placeholder="Nhập mã cổ phiếu..." />
                    </div>
                </div>
                @if($datas['type'] == 'MUA')
                    <div class="row form-group">
                        <span class="col-md-3 control-label required">Tỉ trọng</span>
                        <div class="col-md-8">
                            <input class="form-control" type="text" value="{{isset($datas->price_buy) ? $datas->price_buy : ''}}" name="price_buy" id="price_buy" placeholder="Nhập tỉ trọng..." />
                        </div>
                    </div>
                <!-- <div class="row form-group">
                        <span class="col-md-3 control-label required">Giá bán</span>
                        <div class="col-md-8">
                            <input class="form-control" type="text" value="{{isset($datas->price_buy) ? $datas->price_buy : ''}}" name="price_buy" id="price_buy" placeholder="Nhập giá bán..." />
                        </div>
                    </div> -->
                @endif


                @if($datas['type'] == 'MUA')
                    <div class="row form-group">
                        <span class="col-md-3 control-label required">Mục tiêu</span>
                        <div class="col-md-8">
                            <input class="form-control" type="text" value="{{isset($datas->target) ? $datas->target : ''}}" name="target" id="target" placeholder="Nhập mục tiêu..." />
                        </div>
                    </div>
                @endif

                @if($datas['type'] == 'MUA')
                    <div class="row form-group">
                        <span class="col-md-3 control-label required">Dừng lỗ</span>
                        <div class="col-md-8">
                            <input class="form-control" type="text" value="{{isset($datas->stop_loss) ? $datas->stop_loss : ''}}" name="stop_loss" id="stop_loss" placeholder="Nhập dùng lỗ..." />
                        </div>
                    </div>
                @else
                    <div class="row form-group">
                        <span class="col-md-3 control-label required">% Còn lại</span>
                        <div class="col-md-8">
                            <input class="form-control" type="text" value="{{isset($datas->stop_loss) ? $datas->stop_loss : ''}}" name="stop_loss" id="stop_loss" placeholder="Nhập  % Còn lại..." />
                        </div>
                    </div>
                @endif
                
                @if($datas['type'] == 'BAN')
                    <div class="row form-group">
                        <span class="col-md-3 control-label required">Giá mua TB</span>
                        <div class="col-md-8">
                            <input class="form-control" type="text" value="{{isset($datas->price_buy) ? $datas->price_buy : ''}}" name="price_buy" id="price_buy" placeholder="Nhập giá bán..." />
                        </div>
                    </div>
                @endif

                @if($datas['type'] == 'BAN')
                    <div class="row form-group">
                        <span class="col-md-3 control-label required">Lãi / lỗ</span>
                        <div class="col-md-8">
                            <input class="form-control" type="text" value="{{isset($datas->target) ? $datas->target : ''}}" name="target" id="target" placeholder="Nhập lãi / lỗ..." />
                        </div>
                    </div>
                @endif
                <div class="row form-group">
                    <span class="col-md-3 control-label">Trạng thái</span>
                    <div class="col-md-8">
                        <input type="checkbox" name="status" id="status" {{isset($datas->status) && $datas->status == 1 ? 'checked' : ''}} />
                        <label for="status">Hoạt động</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <span id="btupdate">
                        <button id='btn_create' class="btn btn-primary btn-sm" type="button">
                            Cập nhật
                        </button>
                    </span>
                    <button type="button" class="btn btn-default btn-sm" data-bs-dismiss="modal">
                        Đóng
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>