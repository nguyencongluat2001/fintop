<nav id="main_nav" class=" navbar-expand-lg navbar-light shadow" style="background:#0000008a"> 
    <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
    <div class="container d-flex justify-content-between align-items-center link-datafinancial">
        <div class="" id="navbar-toggler-success">
            <div class="" style="border-radius:50%;margin:auto">
                <ul class=" navbar-nav d-flex justify-content-between mx-xl-5 text-dark">
                <li class="nav-item">
                        <a class="nav-link link-search  px-3 "  style="color:black" href="{{ URL::asset('/client/dataFinancial/index') }}"><i class="fas fa-search"></i> Tra cứu cổ phiếu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link-signal px-3" style="color:black" href="{{ URL::asset('/client/dataFinancial/signalIndex') }}"> <i class="fas fa-signal"></i> TOP Cổ Phiếu</a>
                    </li> 
                    <li class="nav-item">
                        <a class="nav-link link-recommendations px-3" style="color:black" href="{{ URL::asset('/client/dataFinancial/recommendationsIndex') }}"><i class="fas fa-comments-dollar"></i> Tín Hiệu V.I.P</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link-categoryFintop  px-3" style="color:black" href="{{ URL::asset('/client/dataFinancial/categoryFintopIndex') }}"><i class="fas fa-sitemap"></i> Danh Mục V.I.P</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>