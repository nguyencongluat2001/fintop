<style>
    .unit-edit span {
        font-size: 19px;
    }

    #frmAdd .modal-dialog {
        max-width: none !important;
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

@php
    $roles = session('role', []);
    if (!is_array($roles)) {
        $roles = explode(',', $roles);
    }
    $allowRoles = [
        'ADMIN',
        'MANAGE',
        'CV_ADMIN',
        'SALE_ADMIN',
        'SALE_BASIC'
    ];

    $hasPermission = count(array_intersect($roles, $allowRoles)) > 0;
@endphp

<form id="frmAdd" role="form" action="" method="POST" enctype="multipart/form-data">
    @csrf

    <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="id" id="id" value="{{ isset($datas->id) ? $datas->id : '' }}">

    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content card">

            <div class="modal-header" style="padding:4px">
                <h5 class="modal-title"></h5>

                <button type="button"
                        class="btn btn-sm"
                        data-bs-dismiss="modal"
                        style="margin-bottom: 0rem !important;background: red;color:white">
                    X
                </button>
            </div>

            <div class="card-body">

                <table class="table table-bordered table-striped table-condensed dataTable no-footer">
                    <thead>
                        <tr>
                            <td style="white-space: inherit;vertical-align: middle" align="center" class="required">
                                <b>STT</b>
                            </td>
                            <td style="white-space: inherit;vertical-align: middle" align="center" class="required">
                                <b>Mã CP</b>
                            </td>

                            <td style="white-space: inherit;vertical-align: middle" align="center" class="required">
                                <b>Sàn</b>
                            </td>

                            <td style="white-space: inherit;vertical-align: middle" align="center" class="required">
                                <b>Nhóm nghành HĐKD</b>
                            </td>

                            <td style="white-space: inherit;vertical-align: middle" align="center" class="required">
                                <b>Xu hướng CP</b>
                            </td>

                            <td style="white-space: inherit;vertical-align: middle" align="center" class="required">
                                <b>trạng thái Model</b>
                            </td>

                            <td style="white-space: inherit;vertical-align: middle" align="center" class="required">
                                <b>Kết quả Model</b>
                            </td>

                            <td style="white-space: inherit;vertical-align: middle" align="center" class="required">
                                <b>Vùng giá kháng cự</b>
                            </td>

                            <td style="white-space: inherit;vertical-align: middle" align="center" class="required">
                                <b>Vùng giá tham chiếu</b>
                            </td>

                            <td style="white-space: inherit;vertical-align: middle" align="center">
                                <b>Điểm QTRR</b>
                            </td>

                            <td style="white-space: inherit;vertical-align: middle" align="center">
                                <b>#</b>
                            </td>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>

                            @if($hasPermission)
                                <td style="width:8%;vertical-align: middle;" align="center">
                                    <input id="order"
                                           name="order"
                                           type="text"
                                           value="{{ isset($datas->order) ? $datas->order : '' }}"
                                           class="form-control">
                                </td>
                                <td style="width:8%;vertical-align: middle;" align="center">
                                    <input id="code_cp"
                                           name="code_cp"
                                           type="text"
                                           value="{{ isset($datas->code_cp) ? $datas->code_cp : '' }}"
                                           class="form-control">
                                </td>

                                <td style="width:10%;vertical-align: middle;" align="center">
                                    <input id="exchange"
                                           name="exchange"
                                           type="text"
                                           value="{{ isset($datas->exchange) ? $datas->exchange : '' }}"
                                           class="form-control">
                                </td>

                                <td style="width:12%;vertical-align: middle;">
                                    <select class="form-control input-sm chzn-select"
                                            name="code_category"
                                            id="code_category">

                                        <option value="">--Chọn nhóm ngành--</option>

                                        @foreach($category as $key => $value)
                                            <option
                                                value="{{ $value->code_category }}"
                                                @if(isset($datas->code_category) && $value->code_category == $datas->code_category)
                                                    selected
                                                @endif
                                            >
                                                {{ $value->name_category }}
                                            </option>
                                        @endforeach

                                    </select>
                                </td>

                            @else
                                <td style="width:8%;vertical-align: middle;" align="center">
                                    {{ isset($datas->order) ? $datas->order : '' }}
                                </td>
                                <td style="width:8%;vertical-align: middle;" align="center">
                                    {{ isset($datas->code_cp) ? $datas->code_cp : '' }}
                                </td>

                                <td style="width:10%;vertical-align: middle;" align="center">
                                    {{ isset($datas->exchange) ? $datas->exchange : '' }}
                                </td>

                                <td style="width:12%;vertical-align: middle;">
                                    <span>
                                        {{ isset($datas->name_category) ? $datas->name_category : '' }}
                                    </span>
                                </td>

                            @endif

                            <td style="vertical-align: middle;">
                                <textarea id="identify_trend"
                                          name="identify_trend"
                                          class="form-control">{{ isset($datas->identify_trend) ? $datas->identify_trend : '' }}</textarea>
                            </td>

                            <td style="width:10%;vertical-align: middle;" align="center">
                                <input id="status_model"
                                       name="status_model"
                                       type="text"
                                       value="{{ isset($datas->status_model) ? $datas->status_model : '' }}"
                                       class="form-control">
                            </td>

                            <td style="width:10%;vertical-align: middle;" align="center">
                                <input id="model"
                                       name="model"
                                       type="text"
                                       value="{{ isset($datas->model) ? $datas->model : '' }}"
                                       class="form-control">
                            </td>

                            <td style="width:7%;vertical-align: middle;" align="center">
                                <input id="trading_price_resist"
                                       name="trading_price_resist"
                                       type="text"
                                       value="{{ isset($datas->trading_price_resist) ? $datas->trading_price_resist : '' }}"
                                       class="form-control">
                            </td>

                            <td style="width:7%;vertical-align: middle;" align="center">
                                <input id="trading_price_range"
                                       name="trading_price_range"
                                       type="text"
                                       value="{{ isset($datas->trading_price_range) ? $datas->trading_price_range : '' }}"
                                       class="form-control">
                            </td>

                            <td style="width:7%;vertical-align: middle;" align="center">
                                <input id="stop_loss_price_zone"
                                       name="stop_loss_price_zone"
                                       type="text"
                                       value="{{ isset($datas->stop_loss_price_zone) ? $datas->stop_loss_price_zone : '' }}"
                                       class="form-control">
                            </td>

                            <td style="width:5%;vertical-align: middle;" align="center">
                                <p></p>

                                <button id="btn_create"
                                        type="button"
                                        class="btn btn-success"
                                        title="Cập nhật">
                                    <i class="fas fa-thumbs-up"></i>
                                </button>
                            </td>

                        </tr>
                    </tbody>
                </table>

                <div class="modal-header" style="padding:0px">

                    @if($hasPermission)

                        <div class="col-md-4" style="display:flex">
                            <div style="padding: 5px;" class="required">
                                Người đảm nhận
                            </div>

                            <div>
                                <input placeholder="Người đảm nhận"
                                       id="user_take_on"
                                       name="user_take_on"
                                       type="text"
                                       value="{{ isset($datas->user_take_on) ? $datas->user_take_on : '' }}"
                                       class="form-control">
                            </div>
                        </div>

                    @endif

                </div>

                <section class="content-wrapper pt-3">
                    <div class="panel panel-default">

                        <div class="panel-body">
                            <div class="row form-group">

                                <div class="col-lg-12" style="padding:2px;">

                                    <iframe
                                        style="width:100%"
                                        height="500"
                                        src="https://fireant.vn/charts"
                                        frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
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