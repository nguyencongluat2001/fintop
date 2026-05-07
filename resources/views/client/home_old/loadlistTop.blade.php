<style>
    .row_convert{
        --bs-gutter-x: 1.5rem;
        --bs-gutter-y: 0;
        display: flex;
        /* flex-wrap: wrap; */
        margin-top: calc(var(--bs-gutter-y) * -1);
        margin-right: calc(var(--bs-gutter-x)/ -2);
        margin-left: calc(var(--bs-gutter-x)/ -2);
    }
</style>
<!-- <marquee> -->
    <div class="row_convert py-3">
        @foreach($datas as $item)
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4" style="padding-left:10px">
            <div class="card" style="background: #0c1223d9 !important;">
                <div class="card-body p-3">
                <div class="row_convert">
                <div class="col-1">
                    <span>
                        <i style="color:#ffcd19" class="fas fa-coins"></i>
                    </span> <br>
                    <span>
                        @if($item['value'] > 0)
                          <i style="color:#51c63f" class="fas fa-sort-amount-up"></i>
                        @else
                           <i style="color:#f57c7c" class="fas fa-sort-amount-down"></i>
                        @endif
                    </span>
                </div>
                    <div class="col-11">
                        <div class="numbers" style="color:red">
                            <span style="">Mã cổ phiếu: <span style="color:#03ff00">{{$item['symbol']}}</span></span> <br>
                            <span style="">Biến động:
                                <span class="animate-charcter">
                                    {{$item['value']}}
                                </span> 
                             </span>
                        </div>
                        </div>
                        <div class="col-4 text-end">
                        <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                            <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
<!-- </marquee> -->

