
<div class="testsss">
   
    @foreach ($datas as $key => $data)
    <div class="pricing-horizontal row col-10 m-auto d-flex shadow-sm rounded overflow-hidden my-2" style="background:#ffffff">
        <div class="pricing-horizontal-icon col-md-3 text-center bg-secondary text-light p-0">
            @if($data['type'] == 'MUA')
            <img src="{{URL::asset('clients/img/mua.jpg')}}" alt="Mua" width="100%" height="100%">
            @else
            <img src="{{URL::asset('clients/img/ban.jpg')}}" alt="Bán" width="100%" height="100%">
            @endif
        </div>
        <div class="col-lg-9">
            <span style="font-size:12px">
            {{ $data['title'] }}
            </span>
        </div>
    </div>
    {{--<div class="card-body">
        <div class="d-flex flex-row justify-content-start mb-4 avatarMessage">
            <img src="https://vcdn.subiz-cdn.com/widget-v4/public/assets/img/default_avatar.5b74dc1.png"
                alt="avatar 1" style="width: 30px; height: 100%;">
                <div style="padding-left:5px">
                    <div class="p-3 ms-3" style="border-radius: 15px; background-color: #edffff;width:100%">
                    <p style="font-size:14px;font-family:auto" class="small mb-0">
                        <h5>{{ $data['title'] }}</h5>
                        <span>Giá mua: {{ $data['price_buy'] }}</span> 
                        <span>Mục tiêu: {{ $data['target'] }}</span> 
                        <span>Dừng lỗ:  {{ $data['stop_loss'] }}</span> <br>
                        <span>Thời gian: {{date('H:i:s d-m-Y', strtotime($data['created_at']))}}</span> <br>
                    </p>
                </div>
        
        </div>
        </div>
        <div id="messages-content"></div>
    </div>
    --}}
    @endforeach
</div>
            