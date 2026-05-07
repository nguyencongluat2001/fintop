@extends('client.layouts.index')
@section('body-client')
<title>TÀI CHÍNH & ĐẦU TƯ FINTOP</title>
<link rel="stylesheet" href="{{URL::asset('assets/datepicker/bootstrap-datepicker.min.css')}}">
<link rel="stylesheet" href="../clients/css/style.css">
<style>
    .hidden {
        display: none;
    }

    .show {
        display: block;
    }

    .swal2-title {
        font-family: 'Montserrat', sans-serif;
        font-size: 20px;
        color: #690000;
    }
    .form-wrapper ,.checkbox{
        color:#ffffff;
    }
    /* .form-control{
        color:#fff079;
    } */
    #frmRegister input{
        background-color: #e8f0fe;
    }
</style>
<div class="container mt-2 mb-2">
    <div class="row justify-content-center">
       
        <div class="col-md-10 mt-3">
            <div class="">
                <form id="frmRegister">
                    <input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">
                    <div id="tab1-register">@include('auth.register.tab1')</div>
                    <div id="tab2-register"></div>
                    <div id="tab3-register"></div>
                    <div id="tab4-register"></div>
                </form>
                <!-- <div class="wrapper" style="background-image: url('images/bg-registration-form-2.jpg'); display: flex; justify-content: center;"></div> -->
            </div>
            <div class="col-md-12">
            @include('auth.register.step')
        </div>
        </div>
        
    </div>
</div>
<link rel="stylesheet" href="../assets/css/sweetalert2.min.css" />
<div class="modal" id="model_otp" style="" role="dialog"></div>
<script type="text/javascript" src="{{ URL::asset('dist\js\backend\pages\JS_Register.js') }}"></script>
<script src='../assets/js/jquery.js'></script>
<script type="text/javascript">
    var baseUrl = '{{ url('') }}';
    var JS_Register = new JS_Register(baseUrl, 'register', 'send-otp');
    $(document).ready(function($) {
        JS_Register.loadIndex(baseUrl);
    })
</script>
@endsection