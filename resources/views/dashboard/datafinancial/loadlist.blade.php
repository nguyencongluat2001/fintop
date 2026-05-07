<style>
	.unit-edit span {
		font-size: 19px;
	}

	body {
		margin: 2rem;
	}

	td>p {
		overflow-y: scroll;
		overflow-x: hidden;
	}

	.scrollbar {
		margin-left: 30px;
		/* float: left; */
		height: 300px;
		/* width: 65px; */
		/* background: #F5F5F5; */
		overflow-y: scroll;
		margin-bottom: 25px;
	}

	.force-overflow {
		min-height: 300px;
	}

	#wrapper {
		text-align: center;
		width: 500px;
		margin: auto;
	}

	.tv-lightweight-charts {
		width: 100%;
		padding-right: var(--bs-gutter-x, 0.5rem) !important;
		padding-left: var(--bs-gutter-x, 0.5rem) !important;
		margin-right: auto !important;
		margin-left: auto !important;
	}

	/* .table{
        border-color: #670000;
    } */
	.table-responsive.pmd-card.pmd-z-depth {
		height: 100%;
		max-height: 800px;
	}

	#style-1 #table-data thead tr td {
		position: sticky;
		top: 0;
	}
</style>
{{-- @php
use Modules\System\Recordtype\Helpers\WorkflowHelper;
@endphp --}}
<div id="style-1" style="padding-right:10px;">

	<div class="table-responsive pmd-card pmd-z-depth ">
		<!-- <div class="col-lg-6 mx-auto " style="display:flex">
        <div class="input-group pt-2 box">
                <input id="myInput" onkeyup="myFunction()"style="background:#f8fdffbd" type="text" class="input form-control form-control-lg rounded-pill rounded" placeholder="Tìm kiếm mã cổ phiếu,...">
        </div>
    </div> -->
		<br>
		<table id="table-data" class="table  table-bordered table-striped table-condensed dataTable no-footer">
			<colgroup>
				<col width="3%">
				<col width="3%"> <!-- Stt -->
				<col width="7%"> <!-- macp -->
				<col width="3%"> <!-- san -->
				<col width="7%"> <!-- nhom nganh -->
				<col width="7%"> <!-- nguoi dam nhan -->
				<col width="7%"> <!-- thoi gian -->
				<col width="6%"> <!-- xep hang -->
				<col width="18%"> <!-- nhan dinh TA -->
				<col width="9%"> <!-- hanh dong -->
				<col width="6%"> <!-- vung gia -->
				<col width="6%"> <!-- vung gia cat lo -->
				<col width="5%"> <!-- xep hang FA -->
				<col width="5%"> <!-- dien tich -->
				<col width="5%"> <!-- thu tu -->
				<col width="5%"> <!-- tin hieu mua -->
				<col width="3%"> <!-- # -->
			</colgroup>
			<thead>
				<tr style="background:#151f38b3">
					<td style="background:#151f38;white-space: inherit;vertical-align: middle" align="center"><input type="checkbox" name="chk_all_item_id" onclick="checkbox_all_item_id(document.forms[0].chk_item_id);"></td>
					<td style="background:#151f38;white-space: inherit;vertical-align: middle" align="center"><b>STT</b></td>
					<td style="background:#151f38;white-space: inherit;vertical-align: middle" align="center"><b>Mã CP</b></td>
					<td style="background:#151f38;white-space: inherit;vertical-align: middle" align="center"><b>Sàn</b></td>
					<td style="background:#151f38;white-space: inherit;vertical-align: middle" align="center"><b>Nhóm nghành HĐKD</b></td>
					<td style="background:#151f38;white-space: inherit;vertical-align: middle" align="center"><b>Người đảm nhận</b></td>
					<td style="background:#151f38;white-space: inherit;vertical-align: middle" align="center"><b>Thời gian cập nhật</b></td>
					<td style="background:#151f38;white-space: inherit;vertical-align: middle" align="center"><b>Xếp hạng TA</b></td>
					<td style="background:#151f38;white-space: inherit;vertical-align: middle" align="center"><b>Xu hướng CP</b></td>
					<td style="background:#151f38;white-space: inherit;vertical-align: middle" align="center"><b>Tín hiệu <br> hành động</b></td>
					<td style="background:#151f38;white-space: inherit;vertical-align: middle" align="center"><b>Vùng giá giao dịch</b></td>
					<td style="background:#151f38;white-space: inherit;vertical-align: middle" align="center"><b>Điểm QTRR</b></td>
					<td style="background:#151f38;white-space: inherit;vertical-align: middle" align="center"><b>Xếp hạng FA</b></td>
					<td style="background:#151f38;white-space: inherit;vertical-align: middle" align="center"><b>Phân tích DN FA</b></td>
					<td style="background:#151f38;white-space: inherit;vertical-align: middle" align="center"><b>Thứ tự</b></td>
					<td style="background:#151f38;white-space: inherit;vertical-align: middle" align="center"><b>TOP Cổ Phiếu</b></td>
					<td style="background:#151f38;"><span onclick="JS_DataFinancial.addrow()" class="text-cursor text-primary"><i class="fas fa-plus-square"></i></span></td>
				</tr>
			</thead>
			<tbody id="body_data">
				@foreach ($datas as $key => $data)
				@php $id = $data->id; @endphp
				<tr>
					<td style="vertical-align: middle;" align="center"><input type="checkbox" name="chk_item_id" value="{{ $data->id }}"></td>
					@if(isset($_SESSION['role']) && ($_SESSION['role'] == 'ADMIN' || $_SESSION['role'] == 'MANAGE' ||
                    $_SESSION['role'] == 'CV_ADMIN' || $_SESSION['role'] == 'CV_ADMIN,SALE_ADMIN' || $_SESSION['role'] == 'CV_ADMIN,SALE_BASIC'))
					<td class="text-center td_order_{{$id}}" style="vertical-align: middle;" onclick="{select_row(this);}" ondblclick="click2('{{$id}}', 'order')">
						<span id="span_order_{{$id}}" class="span_order_{{$id}}">{{ $data->order }}</span>
					</td>
					<td class="td_code_cp_{{$id}}" style="vertical-align: middle;" align="center" onclick="{select_row(this);}" ondblclick="click2('{{$id}}', 'code_cp')">
						<span id="span_code_cp_{{$id}}" class="span_code_cp_{{$id}}">{{$data->code_cp}}</span>
					</td>
					<td class="td_exchange_{{$id}}" style="vertical-align: middle;" align="center" onclick="{select_row(this);}" ondblclick="click2('{{$id}}', 'exchange')">
						<span id="span_exchange_{{$id}}" class="span_exchange_{{$id}}">{{$data->exchange}}</span>
					</td>
					<td style="vertical-align: middle;" align="center" onclick="{select_row(this);}">{{!empty($data->category) ? $data->category->name_category : ''}}</td>
					<td style="vertical-align: middle;white-space: inherit;" align="center">
						{{$data->user_take_on}}
					</td>
						@else
					<td style="vertical-align: middle;" align="center" onclick="{select_row(this);}" ondblclick="click2('{{$id}}', 'order')">
						<span>{{ $data->order }}</span>
					</td>
					<td style="vertical-align: middle;" align="center" onclick="{select_row(this);}" ondblclick="click2('{{$id}}', 'code_cp')">
						<span>{{$data->code_cp}}</span>
					</td>
					<td style="vertical-align: middle;" align="center" onclick="{select_row(this);}" ondblclick="click2('{{$id}}', 'exchange')">
						<span>{{$data->exchange}}</span>
					</td>
					<td style="vertical-align: middle;" align="center" onclick="{select_row(this);}">{{!empty($data->category) ? $data->category->name_category : ''}}</td>
					<td align="center">
						{{$data->user_take_on}}
					</td>
					@endif
					<td style="vertical-align: middle;white-space: inherit;" align="center" onclick="{select_row(this);}">{{!empty($data->created_at) ? date('H', strtotime($data->created_at)). 'h' . date('i', strtotime($data->created_at)). ' ' .date('d/m', strtotime($data->created_at)) : ''}}</td>
					<td class="td_ratings_TA_{{$id}}" style="vertical-align: middle;" align="center" onclick="{select_row(this);}" ondblclick="click2('{{$id}}', 'ratings_TA')">
						<span id="span_ratings_TA_{{$id}}" class="span_ratings_TA_{{$id}}">{{$data->ratings_TA}}</span>
					</td>
					<td class="td_identify_trend_{{$id}}" align="center" style="vertical-align: middle;" onclick="{select_row(this);}" ondblclick="click2('{{$id}}', 'identify_trend')">
						<span id="span_identify_trend_{{$id}}" class="span_identify_trend_{{$id}}" style="display: -webkit-box;-webkit-line-clamp: 3;-webkit-box-orient: vertical;white-space: break-spaces;overflow:hidden;" title="{{$data->identify_trend}}">{{$data->identify_trend}}</span>
					</td>
					<td class="td_act_{{$id}}" style="vertical-align: middle;white-space: inherit;" align="center" onclick="{select_row(this);}" ondblclick="click2('{{$id}}', 'act')">
						<span id="span_act_{{$id}}" class="span_act_{{$id}}">{{$data->act}}</span>
					</td>
					<td class="td_trading_price_range_{{$id}}" style="vertical-align: middle;" align="center" onclick="{select_row(this);}" ondblclick="click2('{{$id}}', 'trading_price_range')">
						<span id="span_trading_price_range_{{$id}}" class="span_trading_price_range_{{$id}}">{{$data->trading_price_range}}</span>
					</td>
					<td class="td_stop_loss_price_zone_{{$id}}" style="vertical-align: middle;" align="center" onclick="{select_row(this);}" ondblclick="click2('{{$id}}', 'stop_loss_price_zone')">
						<span id="span_stop_loss_price_zone_{{$id}}" class="span_stop_loss_price_zone_{{$id}}">{{$data->stop_loss_price_zone}}</span>
					</td>
					@if(isset($_SESSION['role']) && ($_SESSION['role'] == 'ADMIN' || $_SESSION['role'] == 'MANAGE' ||
                    $_SESSION['role'] == 'CV_ADMIN' || $_SESSION['role'] == 'CV_ADMIN,SALE_ADMIN' || $_SESSION['role'] == 'CV_ADMIN,SALE_BASIC'))
					<td class="td_ratings_FA_{{$id}}" style="vertical-align: middle;" align="center" onclick="{select_row(this);}" ondblclick="click2('{{$id}}', 'ratings_FA')">
						<span id="span_ratings_FA_{{$id}}" class="span_ratings_FA_{{$id}}">{{$data->ratings_FA}}</span>
					</td>
					@else
					<td style="vertical-align: middle;" align="center">
						{{$data->ratings_FA}}
					</td>
					@endif
					<td style="vertical-align: middle;" align="center" onclick="{select_row(this);}">
						<a href="{{$data->url_link}}" target="_blank"><i class="fas fa-link"></i></a>
					</td>
					<td class="text-center" style="vertical-align: middle;" onclick="{select_row(this);}">
						<span class="me-3" style="cursor: pointer;" onclick="JS_DataFinancial.upNdown('down','{{$id}}', this)"><i class="fas fa-long-arrow-alt-down"></i></span>
						<span style="cursor: pointer;" onclick="JS_DataFinancial.upNdown('up', '{{$id}}', this)"><i class="fas fa-long-arrow-alt-up"></i></span>
					</td>
					<td class="td_status_{{$id}}" style="vertical-align: middle;" align="center" onclick="{select_row(this);}" ondblclick="click2('{{$id}}', 'status')">
						<span id="span_status_{{$id}}" class="span_status_{{$id}}">{{$data->status}}</span>
					</td>
					<td class="text-center" style="vertical-align: middle;">
						<span class="text-cursor text-warning" onclick="JS_DataFinancial.edit('{{$id}}')"><i class="fas fa-edit"></i></span>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		<!-- <tfoot>
        <tr>
            <td colspan="10">
                {{$datas->links('pagination.phantrang')}}
            </td>
        </tr>
    </tfoot> -->
	</div>
	<!-- <div class="modal" id="videomodal" role="dialog"></div> -->
</div>
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
<script>
	function myFunction() {
		var input, filter, table, tr, td, i, txtValue;
		input = document.getElementById("myInput");
		filter = input.value.toUpperCase();
		table = document.getElementById("body_data");
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