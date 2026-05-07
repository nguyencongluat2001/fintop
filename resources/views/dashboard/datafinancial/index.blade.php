@extends('dashboard.layouts.index')
@section('body')
<style>
    .form-group{
        margin-bottom: 0rem;
    }
    .input-group{
        border-radius: 20px 0%  0px 20px;
    }
    .icon-remote:hover {
        color: red !important;
    }
    #Search{
        width:480px;height:49px; border:3px solid black;
        padding-left:48px;
        padding-top:1px;
        font-size:22px;color:blue;
        /* background-image:url('images/search.jpg'); */
        background-repeat:no-repeat;
        background-position:center;outline:0;
    }

#Search::-webkit-search-cancel-button{
    position:relative;
    right:20px;  
  
    -webkit-appearance: none;
    height: 20px;
    width: 20px;
    border-radius:10px;
    background: red;
}
.form-control {
    display: block;
    width: 100%;
    padding: 0.5rem 0.75rem;
    font-size: 0.875rem;
    font-weight: 400;
    line-height: 1.4rem;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ffffff;
    appearance: none;
    border-radius: 0.5rem;
    /* transition: box-shadow 0.15s ease, border-color 0.15s ease; */
}

/* select checkBook */
.multiselect {
  /* width: 200px; */
}

.selectBox {
  position: relative;
}

.selectBox select {
  width: 100%;
  font-weight: bold;
}

.overSelect {
  position: absolute;
  left: 0;
  right: 0;
  top: 0;
  bottom: 0;
}

#checkboxes {
  display: none;
  border: 1px #dadada solid;
}

#checkboxes label {
  display: block;
}

#checkboxes label:hover {
  background-color: #1e90ff;
}


#checkboxes1 {
  display: none;
  border: 1px #dadada solid;
}

#checkboxes1 label {
  display: block;
}

#checkboxes1 label:hover {
  background-color: #1e90ff;
}
/* ::-webkit-scrollbar {
  width: 20px;
} */

.scrollbar {
  /* overflow: scroll; */
  scrollbar-color: red orange;
  scrollbar-width: thin;
    height: 100px;
    /* width: 65px; */
    /* background: #F5F5F5; */
    overflow-y: scroll;
    margin-bottom: 25px;
}
.hiddel{
        display: none;
    }
    .show{
        display: block;
    }
</style>
    <script type="text/javascript" src="{{ URL::asset('dist\js\backend\pages\JS_DataFinancial.js') }}"></script>
    <div class="container-fluid">
        <div class="row">
            <form action="" method="POST">
                <!-- <div class="breadcrumb-input-fix d-sm-flex align-items-center justify-content-between">
                    <button class="btn btn-success btn-sm shadow-sm" id="" type="button"data-toggle="tooltip"
                    data-original-title="Thêm danh mục"><i class="fas fa-book-medical"></i> Cẩm nang</button>
                </div> -->
                <div style="padding-left:85%">
                <input type="checkbox" id="view_chart" name="view_chart" onclick="JS_DataFinancial.view_chart()" /><span style=";color: #ff9f00;font-family: serif;"> Ẩn hiện biểu đồ</span></label>

                </div>
                <section class="content-wrapper">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row form-group">
                                <div id="bank" class="hiddel">
                                    <div class="col-lg-12" style="padding:2px;">
                                        <!-- <h class="h4 py-2"><i class="far fa-chart-bar"></i>. <span style="font-family: auto;" > Biểu đồ</span> </h> <br> -->
                                        <!-- <p>Nguồn theo: fireant</p> -->
                                        <iframe style="width:100%" height="550" src="https://fireant.vn/charts" 
                                            frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                                            allowfullscreen>
                                        </iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </form>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <form action="" method="POST" id="frmDataFinancial_index">
                <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                <!-- <div class="breadcrumb-input-fix d-sm-flex align-items-center justify-content-between">
                    <button class="btn btn-success btn-sm shadow-sm" id="" type="button"data-toggle="tooltip"
                    data-original-title="Thêm danh mục"><i class="fas fa-book-medical"></i> Cẩm nang</button>
                </div> -->
                <section class="content-wrapper">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row form-group">
                                <div class="col-md-2">
                                    <button class="btn btn-success shadow-sm" id="btn_add" type="button"data-toggle="tooltip"
                                    data-original-title="Thêm cổ phiếu"><i class="fas fa-plus"></i></button>
                                    <!-- <button class="btn btn-warning shadow-sm" id="btn_edit" type="button"data-toggle="tooltip"
                                        data-original-title="SỬa người dùng"><i class="fas fa-user-edit"></i></button> -->
                                    <button class="btn btn-danger shadow-sm" id="btn_delete" type="button"data-toggle="tooltip"
                                    data-original-title="Xóa cổ phiếu"><i class="fas fa-trash-alt"></i></button>
                                </div>
                                 <div class="col-md-2">
                                    <select class="form-control input-sm chzn-select" name="type"
                                        id="type">
                                        <option value='DATA'>Dữ liệu cổ phiếu</option>
                                        <option value='TIN_HIEU'>TOP Cổ Phiếu</option>
                                    </select>
                                </div>
                                <div class="col-md-2" >
                                    <div class="multiselect">
                                        <div class="selectBox" onclick="showCheckboxes()">
                                        <select class="form-control input-sm chzn-select">
                                            <option>Lọc hành động</option>
                                        </select>
                                        <div class="overSelect"></div>
                                        </div>
                                        <div  id="checkboxes" style="position: absolute;z-index: 1010;width: 12%; border: 1px solid #5e72e4;border-top: 0;background: #fff;">
                                            <label for="one" class="pt-1">
                                                <input type="checkbox" name="code_act" value="MUA" onclick="JS_DataFinancial.loadList('')" /><span style=";color: #252c43;font-family: serif;"> Mua</span></label>
                                            <label for="two">
                                                <input type="checkbox" name="code_act" value="MUA DẦN" onclick="JS_DataFinancial.loadList('')" /><span style=";color: #252c43;font-family: serif;"> Mua dần</span></label>
                                            <label for="three">
                                                <input type="checkbox" name="code_act" value="MUA MẠNH" onclick="JS_DataFinancial.loadList('')" /><span style=";color: #252c43;font-family: serif;"> Mua mạnh</span></label>
                                            <label for="three">
                                                <input type="checkbox" name="code_act" value="BÁN DẦN" onclick="JS_DataFinancial.loadList('')" /><span style=";color: #252c43;font-family: serif;"> Bán dần</span></label>
                                            <label for="three">
                                                <input type="checkbox" name="code_act" value="BÁN MẠNH" onclick="JS_DataFinancial.loadList('')" /><span style=";color: #252c43;font-family: serif;"> Bán mạnh</span></label>
                                            <label for="three">
                                                <input type="checkbox" name="code_act" value="NẮM GIỮ" onclick="JS_DataFinancial.loadList('')" /><span style=";color: #252c43;font-family: serif;"> Nắm giữ</span></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="multiselect">
                                        <div class="selectBox" onclick="showCheckboxes1()">
                                        <select class="form-control input-sm chzn-select">
                                            <option>Lọc nhóm ngành</option>
                                        </select>
                                        <div class="overSelect"></div>
                                        </div>
                                        <div class="scrollbar" id="checkboxes1" style="position: absolute;z-index: 1010;width: 15%; border: 1px solid #5e72e4;border-top: 0;background: #fff;margin-left: 0px !important;">
                                            @foreach($data['category'] as $item)
                                            <label for="one" class="pt-1">
                                               <input type="checkbox" name="code_category" value="{{$item['code_category']}}" onclick="JS_DataFinancial.loadList('')" /><span style=";color: #252c43;font-family: serif;"> {{$item['name_category']}}</span></label>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="col-md-2">
                                    <select class="form-control input-sm chzn-select" name="code_category"
                                        id="code_category">
                                        <option value=''>-- Nhóm ngành HĐKD --</option>
                                        @foreach($data['category'] as $item)
                                            <option value="{{$item['code_category']}}">{{$item['name_category']}}</option>
                                        @endforeach
                                    </select>
                                </div> -->
                                <!-- <div class="col-md-1 text-center" onclick="JS_DataFinancial.remoteSearch('1')">
                                   <i style="color:#ffb000" class="fas fa-undo-alt fa-2x"></i>
                                </div> -->
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <div class="input-group" style="width:20%;height:10%;background:#ffffff;padding-left:0px !important">
                                    <!-- <span class="input-group-text text-body"><i class="fas fa-search"
                                            aria-hidden="true"></i></span> -->
                                    <input id="search" name="search" type="text" class="form-control" placeholder="Tìm kiếm mã CP">
                                    <span  onclick="JS_DataFinancial.remoteSearch('1')">
                                           <!-- <i style="color:#ffb000" class="fas fa-undo-alt fa-2x"></i> -->
                                           <!-- <i style="padding:5px;color:#ffb000"  class="fas fa-backspace fa-2x"></i> -->
                                           <span class="icon-remote" style="padding-left:10px;color:#1a1600;font-size: 20px;"> x </span>
                                    </span>
                                </div>
                                <button style="border-radius: 0px 10px  10px 0px;width:5%" id="txt_search" name="txt_search" type="button" class="btn btn-dark"><i class="fas fa-search" style="color: #ffbf00;"></i></button>

                            </div>
                            <!-- Màn hình danh sách -->
                            <div class="row" id="table-container" style="margin-top: -15px;"></div>
                        </div>
                    </div>
                </section>
            </form>
        </div>
    </div>
    <div class="modal fade" id="editmodal" data-backdrop="static" role="dialog"></div>
    <div class="modal fade" id="changeUpdateModal" data-backdrop="static" role="dialog"></div>

    <div class="modal" id="videomodal" data-backdrop="static" role="dialog"></div>
    <div class="modal " id="addfile" data-backdrop="static" role="dialog"></div>

    <div id="dialogconfirm"></div>
    <script src='../assets/js/jquery.js'></script>
    <script type="text/javascript">
       var expanded = false;

        function showCheckboxes() {
        var checkboxes = document.getElementById("checkboxes");
        if (!expanded) {
            checkboxes.style.display = "block";
            expanded = true;
        } else {
            checkboxes.style.display = "none";
            expanded = false;
        }}
        function showCheckboxes1() {
        var checkboxes = document.getElementById("checkboxes1");
        if (!expanded) {
            checkboxes.style.display = "block";
            expanded = true;
        } else {
            checkboxes.style.display = "none";
            expanded = false;
        }}



        var baseUrl = "{{ url('') }}";
        var JS_DataFinancial = new JS_DataFinancial(baseUrl, 'system', 'datafinancial');
        $(document).ready(function($) {
            JS_DataFinancial.loadIndex(baseUrl);
        })
    </script>
    <script>
        var input = document.getElementById("search");
        input.addEventListener("keypress", function(event) {
        if (event.key === "Enter") {
            event.preventDefault();
            document.getElementById("txt_search").click();
        }
        });
    </script>
@endsection
