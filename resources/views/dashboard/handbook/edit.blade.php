<form id="frmAdd"  role="form" action="" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="id" id="id" value="{{!empty($data['detail']['id'])?$data['detail']['id']:''}}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content card">
            <div class="modal-header">
                <h5 class="modal-title">Cập nhật cẩm nang</h5>
                <button type="button" class="btn btn-sm" data-bs-dismiss="modal">
                    X
                </button>
            </div>
            <div class="modal-body" style="padding:15px">
                <div class="row form-group" id="div_hinhthucgiai">
                    <span class="col-md-3 control-label required">Loại cẩm nang</span>
                    <div class="col-md-8">
                        <select class="form-control input-sm chzn-select" name="category_handbook"
                            id="category_handbook">
                            <option value=''>-- Chọn loại cẩm nang --</option>
                            @if(!empty($data['detail']['category_handbook']))
                                @foreach($data['category'] as $item)
                                    <option 
                                    {{!empty($data['detail']['category_handbook'] == $item['code_category']) ? 'selected' :''}}
                                    value="{{$item['code_category']}}">{{$item['name_category']}}</option>
                                @endforeach
                            @else 
                                @foreach($data['category'] as $item)
                                    <option value="{{$item['code_category']}}">{{$item['name_category']}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                <!-- tên -->
                <div class="row form-group" id="div_hinhthucgiai">
                    <span class="col-md-3 control-label required">Tên cẩm nang</span>
                    <div class="col-md-8">
                        <input class="form-control" type="text" value="{{!empty($data['detail']['name_handbook'])?$data['detail']['name_handbook']:''}}" name="name_handbook" id="name_handbook"
                            placeholder="Nhập tên cẩm nang..." />
                    </div>
                </div>
                {{-- Đường dẫn --}}
                <div class="row form-group" id="div_hinhthucgiai">
                    <span class="col-md-3 control-label required">Đường dẫn</span>
                    <div class="col-md-8">
                        <input class="form-control" type="text" value="{{!empty($data['detail']['url_link'])?$data['detail']['url_link']:''}}" name="url_link" id="url_link"
                            placeholder="Nhập đường dẫn..." />
                    </div>
                </div>
                {{--Loại đường dẫn --}}
                <div class="row form-group" id="div_hinhthucgiai">
                    <span class="col-md-3 control-label required">Kiểu đường dẫn</span>
                    <div class="col-md-8">
                        <select class="form-control input-sm chzn-select" name="type_handbook"
                            id="type_handbook">
                            <option value=''>-- Chọn kiểu --</option>
                            @if(!empty($data['detail']['type_handbook']))
                            <option {{!empty($data['detail']['type_handbook'] == 'VIDEO') ? 'selected' :''}} value="VIDEO">Video</option>
                            <option {{!empty($data['detail']['type_handbook'] == 'LINK_LIEN_KET') ? 'selected' :''}} value="LINK_LIEN_KET">Link liên kết</option>
                            @else
                            <option value="VIDEO">Video</option>
                            <option value="LINK_LIEN_KET">Link liên kết</option>
                            @endif
                        </select>
                    </div>
                </div>
                {{-- mô tả --}}
                <div class="row form-group" id="div_hinhthucgiai">
                    <span class="col-md-3 control-label">Mô tả</span>
                    <div class="col-md-8">
                        <input class="form-control" type="text" value="{{!empty($data['detail']['decision'])?$data['detail']['decision']:''}}" name="decision" id="decision"
                            placeholder="Nhập mô tả..." />
                    </div>
                </div>
                <div class="preview"></div>
                {{-- trạng thái --}}
                <div class="row form-group" id="div_hinhthucgiai">
                    <span class="col-md-3 control-label">Thứ tự</span>
                    <div class="col-md-8">
                        <input class="form-control" type="number" value="{{ $data['detail']['order'] ?? ($data['order'] ?? '') }}" name="order" id="order"
                            placeholder="Nhập thứ tự..." />
                    </div>
                </div>
                <div class="row form-group" id="div_hinhthucgiai">
                    <span class="col-md-3 control-label">Trạng thái</span>
                    <div class="col-md-8">
                        @if(!empty($data['detail']['current_status']))
                        <input type="checkbox" value="1" name="is_checkbox_status" id="is_checkbox_status" {{($data['detail']['current_status'] == '1') ? 'checked' : ''}}/>
                        <span for="is_checkbox_status">Hoạt động</span> <br>
                        @else
                        <input type="checkbox" value="1" name="is_checkbox_status" id="is_checkbox_status"/>
                        <span for="is_checkbox_status">Hoạt động</span> <br>
                        @endif
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
            </div>
        </div>
    </div>
</form>
