<style>
    .title_table{
        font-size:16px !important;
    }
    .table{
        border-color: #670000
    }
    .scrollbar {
    margin-left: 30px;
    /* float: left; */
    height: 1000px;
    /* width: 65px; */
    /* background: #F5F5F5; */
    overflow-y: scroll;
    margin-bottom: 25px;
  }

  .force-overflow {
    min-height: 1000px;
  }

  #wrapper {
    text-align: center;
    width: 500px;
    margin: auto;
  }

  /*
    *  STYLE 2
    */

  #style-2::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
    border-radius: 10px;
    background-color: #F5F5F5;
  }

  #style-2::-webkit-scrollbar {
    width: 12px;
    background-color: #F5F5F5;
  }

  #style-2::-webkit-scrollbar-thumb {
    border-radius: 10px;
    -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, .3);
    background-color: #D62929;
  }

  .tv-lightweight-charts {
    width: 100%;
    padding-right: var(--bs-gutter-x, 0.5rem) !important;
    padding-left: var(--bs-gutter-x, 0.5rem) !important;
    margin-right: auto !important;
    margin-left: auto !important;
  }

  .table {
    border-color: #670000;
  }

  .table-responsive.pmd-card.pmd-z-depth {
    height: 100%;
    max-height: 650px;
  }

  #style-1 #table-data thead tr td {
    position: sticky;
    top: 0;
  }

  #frmLoadlist_signal .blur {
    /* opacity: 0.2; */
    border-color: rgba(0, 0, 0, 0.2);
  }

</style>
<div id="style-1">
  <div class="table-responsive pmd-card pmd-z-depth table-container">
        <table id="table-data" class="table  table-bordered table-striped table-condensed dataTable no-footer" style="background-color: #fff;">
            <colgroup>
                <col width="5%">
                <col width="85%">
                <col width="10%">
            </colgroup>
            <thead>
                <tr>
                    <!-- <td align="center"><input type="checkbox" name="chk_all_item_id"
                            onclick="checkbox_all_item_id(document.forms[0].chk_item_id);"></td> -->
                    <td style="background: #92241a;color:white;" align="center"><b class="title_table">STT</b></td>
                    <td style="background: #92241a;color:white;" align="center"><b class="title_table">Nội dung</b></td>
                    <td style="background: #92241a;color:white;" align="center"><b class="title_table">Link</b></b></td>
                </tr>
            </thead>
            <tbody>
                
                @foreach ($datas as $key => $data)
                    <tr>
                        <!-- <td style="padding-top: 20px;"align="center"><input type="checkbox" name="chk_item_id"
                                value="{{ $data->id }}"></td> -->
                        <td align="center">{{ $key + 1 }}
                        <td style="white-space: inherit;" ondblclick="" onclick="{select_row(this);}">
                        {{$data->name_handbook}}
                        </td>
                        <td align="center" >
                            <a target="_blank" href="{{$data->url_link}}">Chi tiết</a>
                            {{--
                            <button type="button" class="btn btn-info" title="Coppy link" onclick="coppy('{{$data->url_link}}')">
                                <i class="fas fa-copy"></i>
                            </button>
                            <button type="button" class="btn btn-success" title="Xem trực tuyến" onclick="JS_Library.seeVideo('{{$data->id}}')"><i class="fas fa-eye"></i></button>
                            --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
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
