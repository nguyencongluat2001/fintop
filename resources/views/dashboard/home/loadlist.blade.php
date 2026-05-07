<style>
    .unit-edit span {
        font-size: 19px;
    }

    header
    {
      font-family: 'Lobster', cursive;
      text-align: center;
      font-size: 25px;  
    }

    #info
    {
      font-size: 18px;
      color: #555;
      text-align: center;
      margin-bottom: 25px;
    }

    a{
      color: #074E8C;
    }

    .scrollbar
    {
      margin-left: 30px;
      /* float: left; */
      height: 320px;
      /* width: 65px; */
      /* background: #F5F5F5; */
      overflow-y: scroll;
      margin-bottom: 25px;
    }

    .force-overflow
    {
      min-height: 320px;
    }

    #wrapper
    {
      text-align: center;
      width: 500px;
      margin: auto;
    }

    /*
    *  STYLE 2
    */

    #style-2::-webkit-scrollbar-track
    {
      -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
      border-radius: 10px;
      background-color: #F5F5F5;
    }

    #style-2::-webkit-scrollbar
    {
      width: 12px;
      background-color: #F5F5F5;
    }

    #style-2::-webkit-scrollbar-thumb
    {
      border-radius: 10px;
      -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
      background-color: #D62929;
    }
</style>
<table id="table-data" class="table align-items-center ">
        <div class="pb-0 px-3">
            <div class="row">
                <div class="col-md-6">
                <h6 class="mb-0">Chỉ số lọc</h6>
                </div>
                <div class="col-md-6 d-flex justify-content-end align-items-center">
                <i class="far fa-calendar-alt me-2"></i>
                <small>23 - 30 March 2020</small>
                </div>
            </div>
        </div>
        <div class="scrollbar" id="style-1">
            <div class="force-overflow">
                <div class="card-body pt-2 p-3">
                    <!-- <h6 class="text-uppercase text-body text-xs font-weight-bolder mb-3">Newest</h6> -->
                        <ul class="list-group">
                            <!-- <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                <div class="d-flex align-items-center">
                                    <button class="btn btn-icon-only btn-rounded btn-outline-danger mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-arrow-down"></i></button>
                                    <div class="d-flex flex-column">
                                    <h6 class="mb-1 text-dark text-sm"> </h6>
                                    <span class="text-xs">27 March 2020, at 12:30 PM</span>
                                    <span class="text-xs"></span>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center text-danger text-gradient text-sm font-weight-bold">
                                    - $ 2,500
                                </div>
                            </li> -->
                            @foreach ($datas as $key => $data)
                                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                    <div class="d-flex align-items-center">
                                        <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-arrow-up"></i></button>
                                        <div class="d-flex flex-column">
                                        <h6 class="mb-1 text-dark text-sm">Chỉ số {{ $data['symbol']}}</h6>
                                        <span class="text-xs">{{ $data['date']}}</span>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                                        {{ $data['priceHigh']}}
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    <!-- <h6 class="text-uppercase text-body text-xs font-weight-bolder my-3">Yesterday</h6>
                    <ul class="list-group">
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                        <div class="d-flex align-items-center">
                            <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-arrow-up"></i></button>
                            <div class="d-flex flex-column">
                            <h6 class="mb-1 text-dark text-sm">Stripe</h6>
                            <span class="text-xs">26 March 2020, at 13:45 PM</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                            + $ 750
                        </div>
                        </li>
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                        <div class="d-flex align-items-center">
                            <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-arrow-up"></i></button>
                            <div class="d-flex flex-column">
                            <h6 class="mb-1 text-dark text-sm">HubSpot</h6>
                            <span class="text-xs">26 March 2020, at 12:30 PM</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                            + $ 1,000
                        </div>
                        </li>
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                        <div class="d-flex align-items-center">
                            <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-arrow-up"></i></button>
                            <div class="d-flex flex-column">
                            <h6 class="mb-1 text-dark text-sm">Creative Tim</h6>
                            <span class="text-xs">26 March 2020, at 08:30 AM</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                            + $ 2,500
                        </div>
                        </li>
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                        <div class="d-flex align-items-center">
                            <button class="btn btn-icon-only btn-rounded btn-outline-dark mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-exclamation"></i></button>
                            <div class="d-flex flex-column">
                            <h6 class="mb-1 text-dark text-sm">Webflow</h6>
                            <span class="text-xs">26 March 2020, at 05:00 AM</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center text-dark text-sm font-weight-bold">
                            Pending
                        </div>
                        </li>
                    </ul> -->
                </div>
            </div>
        </div>
</table>
<script>
    $(document).ready(function () {
          if (!$.browser.webkit) {
              $('.wrapper').html('<p>Sorry! Non webkit users. :(</p>');
          }
      });
</script>
