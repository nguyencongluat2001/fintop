@php
use Carbon\Carbon;
@endphp
<div class="card h-100" style="background: #0c1223d9 !important;">
    <div class="card-header pb-0 px-3">
        <!-- <div class="row">
            <div class="col-md-6">
            <h6 class="mb-0" style="color:">Bài viết </h6>
            </div>
            <div class="col-md-6 d-flex justify-content-end align-items-center">
            </div>
        </div> -->
        </div>
        <div class="scrollbar" id="style-1" style="padding-right:10px;height:900px !important">
          <div class="card-body pt-4 p-3">
              <ul class="list-group">
                    @foreach ($datas as $key => $data)
                    @php Carbon::setLocale('vi');$now = Carbon::now(); $created_at = Carbon::create($data->created_at) @endphp
                        <a href="{{url('client/about/reader') . '/' . $data->id}}" class="col-sm-6 col-lg-12 text-decoration-none {{ $data->code_category }}" onclick="JS_About.reader('{{$data->id}}')">
                            <div class="pb-3 d-lg-flex gx-5">
                                <div class="col-lg-4 ">
                                    <img class="card-img-top" src="{{url('/file-image-client/blogs/')}}/{{ !empty($data->imageBlog[0]->name_image)?$data->imageBlog[0]->name_image:'' }}" style="height: 150px;width: 250px;object-fit: cover;" alt="...">
                                </div>
                                <div class="col-lg-1 "></div>
                                <div class="col-lg-7">
                                    <h5 class="card-title light-600" style="color:#ffdd61">{{ $data->detailBlog->title }}</h5>
                                    <p style="color: #fff;">{{(isset($data['cate_name']) ? $data['cate_name'] . ' - ' : '') . $created_at->diffForHumans($now)}} ({{!empty($created_at) ? date('H:i', strtotime($created_at)) : ''}}  {{!empty($created_at) ? date('d/m/Y', strtotime($created_at)) : ''}})</p>
                                    <div style="color:#e1ffed" class="light-300 blogReader">
                                        {!! $data->detailBlog->decision !!}
                                    </div>
                                    <span style="color:#e1ffed" class="text-decoration-none light-300">
                                        Xem chi tiết
                                    </span>
                                </div>
                            </div>
                            <div style="height:1px;background:#00000040">
                            </div>
                            <br>
                        </a>
                    @endforeach
              </ul>
          </div>
        </div>
    </div>
</div>

