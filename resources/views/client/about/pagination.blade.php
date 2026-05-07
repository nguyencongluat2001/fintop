<input type="hidden" name="_currentPage" id="_currentPage" value="{{$paginator->currentPage()}}">
<div class="d-flex justify-content-between">
    <div class="dataTables_info text-center"><span class="page-link">Có tất cả <span class="pagination-count">{{$paginator->count() ?? 10}}</span>/{{$paginator->total()}} bài viết</span></div>
    <div id="loadMore-mobile">Xem thêm</div>
</div>
<div class="col-sm-3 d-none">
    <div class="row left_paginate text-center" style="justify-content: center;">
        <select id="cbo_nuber_record_page" class="col-sm-6 form-control input-sm" name="cbo_nuber_record_page" style="width: 80px">
            <option id="10" name="10" value="10">10</option>
            <option id="30" name="30" value="30">30</option>
            <option id="50" name="50" value="50">50</option>
            <option id="100" name="100" value="100">100</option>
        </select>
    </div>
</div>