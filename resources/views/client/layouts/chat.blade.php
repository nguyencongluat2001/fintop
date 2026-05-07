<?php 
use Modules\Client\Page\Notification\Models\ReadNotificationModel;
use Modules\Client\Page\Notification\Models\NotificationModel;

if(isset($_SESSION['id'])){
    $idRead = ReadNotificationModel::select('notification_id')->where('user_id', $_SESSION['id'])->get()->toArray();
    $notification = NotificationModel::select('*')->whereNotIn('id', $idRead)->get();
}

?>
<style>
    .animate {
        cursor: pointer;
        transition: all 0.2s ease-in-out;
        -moz-transition: all 0.2s ease-in-out;
        -webkit-transition: all 0.2s ease-in-out;
        animation: road-animates 1s linear infinite;
        -webkit-animation: swing 0.09s linear infinite;
        -moz-animation: swing 1s linear infinite;
        -o-animation: swing 1s linear infinite;
        transform-origin: center top;
        -moz-transform-origin: center top;
        -webkit-transform-origin: center top;
    }
    .animate-slow{
        -webkit-animation: swing 0.2s linear infinite !important;
    }
    #notification{
        position: fixed;
        bottom: 50px;
        right: 90px;
        /* width: 190px; */
    }
    .bubble {
        color: #fb0000;
        position: relative;
        width: 100%;
        text-align: center;
        line-height: 1.4em;
        /* margin: 40px auto; */
        background-color: #dbd62b;
        border: 1px solid #dbd62b;
        border-radius: 30px 30px 0;
        font-family: sans-serif;
        padding: 5px 10px;
        font-size: large;
    }
    .bubble:before,
    .bubble:after {
        content: ' ';
        position: absolute;
        width: 0;
        height: 0;
    }
    .speech:before {
        right: -7px;
        bottom: -25px;
        border: 16px solid #dbd62b;
        /* border-color: #333 transparent transparent #333; */
        border-left: 30px solid transparent;
        border-right: 0px solid transparent;
        border-bottom: 10px solid transparent;
        transform: skew(25deg);
    }
    .speech:after {
        /* left: 38px;
        bottom: -30px;
        border: 15px solid;
        border-color: #fff transparent transparent #fff; */
    }

    @-webkit-keyframes swing {
        0% {
            -webkit-transform: rotateZ(-5deg);
            transform: rotateZ(-5deg);
        }

        50% {
            -webkit-transform: rotateZ(5deg);
            transform: rotateZ(5deg);
        }

        100% {
            transform: rotateZ(-5deg);
            -webkit-transform: rotateZ(-5deg);
        }
    }

    @keyframes swing {
        0% {
            transform: rotateZ(-5deg);
        }

        50% {
            transform: rotateZ(5deg);
        }

        100% {
            transform: rotateZ(-5deg);
        }
    }

    @-moz-keyframes swing {
        0% {
            transform: rotate(-5deg);
        }

        50% {
            transform: rotate(5deg);
        }

        100% {
            transform: rotate(-5deg);
        }
    }
    .numberPhone{
        display: none;
        position: absolute;
        right: 3.5rem;
        top: 5px;
        background-color: #fff079;
        color: #fb0000;
        padding: 10px;
        width: 10.5rem;
        border-radius: 2rem;
    }
    .contactPhone:hover .numberPhone{
        display: block;
    }
</style>
<form action="" method="POST" id="frmLoadlist_box">
    <div id="form_chat">
        <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
        <span align="right">
            <div onclick="viewFormContact_zalo()" class="input-group-btn mb-2">
                    <img width="" height="50px" style="background-color: none"
                    src="../clients/img/zalo.png" alt="">
                </label>
            </div>
        </span>
        <span align="right">
            <div class="input-group-btn mb-2" onclick="JS_Recommendations.openMessage()">
                    <img width="" height="50px" style="background-color: none;"
                    src="../clients/img/icon_messager.jpg" alt="">
                </label>
            </div>
        </span>
        <span align="right">
            <div class="input-group-btn mb-2 contactPhone" style="position: relative;" onclick="JS_Recommendations.openPhone()">
                    <img width="" height="50px" style="background-color: none;"
                    src="../clients/img/phone.png" alt="">
                    <span class="numberPhone"><a style="color: #fb0000;font-weight: 600;" href="">Hotline 086.234.8886</a> </span>
                </label>
            </div>
        </span>
        <span align="right" class="form-group input-group" style="align-items: center;"  onload="loadBell()">
            <div class="input-group-btn" onclick="readNotification()">
                <label class="icon" for="checkbox1" style="border-radius:50px;background:#25aa33e8;">
                    <i style="color:#ffd00f;padding:12px" id="icon-bell" class="far fa-bell fa-2x py-2 @if(isset($notification) && count($notification) > 0) animate @endif "></i>
                </label>
            </div>
            <!-- <div>
                <input hidden type="checkbox" id="checkbox1" checked />
            </div> -->
        </span>
        
        <section class="avenue-messenger " id="pDetails" hidden>
            <div class="menu">
                <div class="button" style="padding-right: 15px;padding-top: 5px;">
                    <div>
                        <label for="checkbox1">
                            <i class="fa fa-window-close fa-xs" aria-hidden="true" 
                                style="color: rgb(255, 255, 255);"></i>
                        </label>
                    </div>
                    <div>
                        <input hidden type="checkbox" id="checkbox1" checked />
                    </div>
                </div>
                <!-- <div class="agent-face">
                    <div class="half">
                        <img class="agent circle"
                            src="https://vcdn.subiz-cdn.com/widget-v4/public/assets/img/default_avatar.5b74dc1.png"
                            alt="Jesse Tino">
                    </div>
                </div> -->
            </div>
            <div class="chat">
                <!-- <div class="chat-title">
                    <span style="color: #ffd2c4;font-size: 17px;letter-spacing: 1px;font-family: Trocchi, serif;">Tín Hiệu V.I.P</span>
                </div> -->
                <!-- Màn hình danh sách -->
                <div class="table-responsive">
                    <div id="table-container-box"></div>
                </div> 
            </div>
        </section>
    </div>
        
        @if(isset($notification))
        <div id="notification" class="notification" @if(count($notification) <= 0) hidden @endif>
            <div class="bubble speech">
                <span><strong><i>Bạn có {{count($notification)}} Tín Hiệu V.I.P đầu tư!</i></strong></span>
            </div>
        </div>
        @endif
</form>
<div class="modal" id="formmodal" role="dialog"></div>
<script type="text/javascript" src="{{ URL::asset('dist\js\backend\client\DataFinancial\JS_Recommendations.js') }}"></script>
<script>
      var baseUrl = '{{ url('') }}';
        var JS_Recommendations = new JS_Recommendations(baseUrl, 'client', 'datafinancial');
        $(document).ready(function($) {
            JS_Recommendations.loadList_box(baseUrl);
        })
        /**
         * Hàm hiển thị modal
         *
         * @param oForm (tên form)
         *
         * @return void
         */
        function viewFormContact_zalo () {
            var url = this.baseUrl + '/client/upgradeAcc/viewFormContact_zalo';
            console.log(222,url)
            var myClass = this;
            NclLib.loadding();
            var data = '';
            $.ajax({
                url: url,
                type: "GET",
                //cache: true,
                data: data,
                success: function (arrResult) {
                    if(arrResult.status == 2){
                        Swal.fire({
                            position: 'top-start',
                            // icon: 'warning',
                            title: arrResult.message,
                            showConfirmButton: false,
                            timer: 3000
                        })
                        return false;
                    }else{
                        $('#formmodal').html(arrResult);
                        $('#formmodal').modal('show');
                    }
                }
            });
        }
</script>


