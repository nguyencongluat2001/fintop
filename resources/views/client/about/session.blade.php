@extends('client.layouts.index')
@section('body-client')
<title>PHÂN TÍCH ĐẦU TƯ VIP</title>
<style>
  header {
    font-family: 'Lobster', cursive;
    text-align: center;
    font-size: 25px;
  }

  #info {
    font-size: 18px;
    color: #555;
    text-align: center;
    margin-bottom: 25px;
  }

  a {
    color: #074E8C;
  }

  .scrollbar {
    margin-left: 30px;
    /* float: left; */
    height: calc(100% - 30px);
    /* width: 65px; */
    /* background: #F5F5F5; */
    overflow-y: scroll;
    margin-bottom: 25px;
  }

  .force-overflow {
    min-height: 400px;
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

  .card {
    background: #ffffff26 !important;
  }
  .blogReader{
    width: 100%;
    max-height: 100px;
    display: -webkit-box;
    -webkit-box-orient: vertical;
    -webkit-line-clamp: 2;
    overflow: hidden;
  }
  .blogReader * {
    font-size: 1rem;
    font-weight: unset;
  }
</style>

<!-- top cổ phiếu biến động -->
<section class="container">
  <div class="table-responsive">
    <!-- Màn hình danh sách top chỉ số tài chính-->
    <div id="table-container-loadListTop"></div>
  </div>
</section>
<!-- Start Banner Hero -->
<div class="banner-wrapper">
  <div class="table-responsive">
    <!-- Màn hình danh sách top chỉ số tài chính-->
    <div id="table-container-loadListTop"></div>
  </div>
  <!-- top cổ phiếu biến động -->
  <section class="container">
    <div class="table-responsive">
      <!-- Màn hình danh sách top chỉ số tài chính-->
      <div id="table-container-loadListTop"></div>
    </div>
  </section>
  <!-- tra cứu cổ phiếu -->
  <section class="container" style="background:#b56c6cb5">
    <div class="pt-3 pb-3 d-lg-flex gx-5">
      <!-- <div class="col-lg-4">

      </div> -->
      <div class="col-lg-12" style="background: #fff">
      <form id="frmLoadlist_blog">
        <div id="table-blog-container"></div>
      </form>
      </div>
    </div>
  </section>
</div>
<div class="modal" id="reader" role="dialog"></div>
<!-- End Recent Work -->
<script type="text/javascript" src="{{ URL::asset('dist\js\backend\client\JS_About.js') }}"></script>
<script src='../assets/js/jquery.js'></script>
<script type="text/javascript">
  var baseUrl = "{{ url('') }}";
  var JS_About = new JS_About(baseUrl, 'client/about', 'session');
  $(document).ready(function($) {
    JS_About.loadIndex(baseUrl);
  })
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>


<script type="text/javascript" src="{{ URL::asset('dist\js\backend\pages\JS_System_Security.js') }}"></script>
<script>
  //   var JS_System_Security = new JS_System_Security();
  //       $(document).ready(function($) {
  //              JS_System_Security.security();
  //   })
</script>

@endsection