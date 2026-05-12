<!-- VIDEO BACKGROUND THỐNG NHẤT LERP 60FPS -->
    <div class="video-bg-container">
        <!-- Chuyển về phát mượt liên tục theo vòng lặp (autoplay loop) -->
        <video autoplay loop muted playsinline class="video-bg" id="hero-video" preload="auto">
            <source src="/assetsFT/videos/Smooth_transition_between_202604222134.mp4" type="video/mp4">
        </video>
        <div class="video-overlay" style="background-color: rgba(5, 5, 10, 0.4);"></div>
    </div>

    <!-- THANH ĐIỀU HƯỚNG KIỂU TÀI CHÍNH -->
    <header class="tv-header" id="mainHeader">
        <div class="tv-left">
            <a href="index.html" class="logo-link">
                <img src="/assetsFT/images/fintop-logo.png" alt="FinTop DATA" class="neon-logo">
            </a>
            <!-- <div class="tv-search-bar">
                <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z" />
                </svg>
                Tìm kiếm (Ctrl+K)
            </div> -->
        </div>
        <ul class="tv-nav">
            <li class="nav-item">
                <a href="/client/home/index">Trang chủ</a>
            </li>
            <li class="nav-item">
                <a href="/client/privileges/index">Hội viên</a>
            </li>
            <li class="nav-item dropdown" id="dropdown-fintop-data">
                <a href="javascript:void(0)" onclick="toggleDropdownPin('dropdown-fintop-data')">
                    FinTop Data <span style="font-size: 0.7em;">▼</span>
                </a>

                <div class="dropdown-content" id="dc-fintop-data">
                    <a href="/client/datafinancial/index"
                    data-panel="panel-tracuu"
                    onclick="openPanel('panel-tracuu', this)">
                        📊 Tra cứu cổ phiếu
                    </a>

                    <a href="javascript:void(0)"
                    data-panel="panel-boloc"
                    onclick="openPanel('panel-boloc', this)">
                        🔍 Bộ lọc cổ phiếu
                    </a>

                    <a href="javascript:void(0)"
                    data-panel="panel-tinhieu"
                    onclick="openPanel('panel-tinhieu', this)">
                        📡 Copy Trade Chuyên gia
                    </a>

                    <a href="fintop-ai/index.html">🤖 FinTop AI</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a href="/client/about/index">Phân tích <span style="font-size: 0.7em;">▼</span></a>
                <div class="dropdown-content">
                    <a href="/client/about/index">Thị trường</a>
                    <a href="/client/about/session">PRO analysis</a>
                    <a href="/client/about/industry">Doanh nghiệp</a>
                    <a href="/client/about/stock">NCPT Ngành</a>
                </div>
            </li>

            <li class="nav-item dropdown">
                <a href="stock-data/index.html">Stock Data <span style="font-size: 0.7em;">▼</span></a>
                <div class="dropdown-content">
                    <a href="#">Quant Data</a>
                    <a href="#">PRO Data</a>
                    <a href="#">Dữ liệu ngành</a>
                    <a href="#">Báo cáo</a>
                </div>
            </li>
            <li class="nav-item"><a href="huong-dan/index.html">Hướng dẫn</a></li>
        </ul>
        <!-- <div class="tv-right">
             <li class="nav-item dropdown">
                <span id="navbarDropdown" class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    <img src="{{url('/file-image/avatar/')}}/{{ isset(Auth::user()->avatar)?Auth::user()->avatar:'' }}" alt="Image" style="border-radius:50%;height: 30px;width: 30px;object-fit: cover;">
                    <span style="color:white">
                        {{ isset(Auth::user()->name)?Auth::user()->name:'' }}
                    </span>
                </span>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ URL::asset('/client/infor/index') }}">
                        <p>
                            {{ __('Thông tin cá nhân') }}
                        </p>
                    </a>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                        <p>
                            {{ __('Đăng xuất') }}
                        </p>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
            <span class="icon-link">👤</span>

            <a href="/login">
                <button class="btn-tv-blue">Đăng nhập</button>
            </a>

            <a href="/register">
                <button class="btn-tv-blue">Đăng ký</button>
            </a>
        </div> -->
        <div class="user-login-header">
                <!-- <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex" id="navbar-toggler-success"> -->
                <ul class="navbar-nav">
                    <!-- Authentication Links -->
                    @guest
                    <div style="display:flex;">
                        <div>
                            @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}" style="color:white;padding:0px"><span>{{ __('Đăng nhập') }}</span> </a>
                            </li>
                            @endif
                        </div>
                        <div style="padding-left:10px">
                            @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}" style="color:white;padding:0px"><span>{{ __('Đăng ký') }}</span> </a>
                            </li>
                            @endif
                        </div>
                    </div>
                    @else
                    <li class="nav-item dropdown">
                        <span id="navbarDropdown" class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <img src="{{url('/file-image/avatar/')}}/{{ Auth::user()->avatar }}" alt="Image" style="border-radius:50%;height: 30px;width: 30px;object-fit: cover;">
                            <span style="color:white">
                                {{ isset(Auth::user()->name)?Auth::user()->name:'' }}
                            </span>
                        </span>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ URL::asset('/client/infor/index') }}">
                                <p>
                                    {{ __('Thông tin cá nhân') }}
                                </p>
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                <p>
                                    {{ __('Đăng xuất') }}
                                </p>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest
                    {{-- @if (!empty(Auth::user()->id))
                        <span id="navbarDropdown" class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <img src="{{url('/file-image/avatar/')}}/{{ !empty(Auth::user()->avatar)?Auth::user()->avatar:'' }}" alt="Image" style="border-radius:50%;height: 30px;width: 30px;object-fit: cover;">
                    <span style="color:white">
                        {{ isset(Auth::user()->name)?Auth::user()->name:'' }}
                    </span>
                    </span>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ URL::asset('/client/infor/index') }}">
                            <p>
                                {{ __('Thông tin cá nhân') }}
                            </p>
                        </a>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            <p>
                                {{ __('Đăng xuất') }}
                            </p>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                    @else
                    <div style="display:flex;">
                        <div>
                            @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}" style="color:white;padding:0px"><span>{{ __('Đăng nhập') }}</span> </a>
                            </li>
                            @endif
                        </div>
                        <div style="padding-left:10px">
                            @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}" style="color:white;padding:0px"><span>{{ __('Đăng ký') }}</span> </a>
                            </li>
                            @endif
                        </div>
                    </div>
                    @endif--}}
                </ul>
                <!-- Right Side Of Navbar -->
            </div>
    </header>

    <!-- ============================================ -->
    <!-- PANEL: TRA CỨU CỔ PHIẾU                     -->
    <!-- ============================================ -->
    <div class="submenu-panel" id="panel-tracuu">
        <button class="panel-close-btn" onclick="closeAllPanels()">✕</button>
        <div class="panel-header">
            <h2 class="gradient-text" style="font-size: clamp(1.6rem, 3vw, 2.2rem);">Tra Cứu Cổ Phiếu</h2>
            <p>Dữ liệu tổng hợp theo mô hình AI định lượng FinTop DATA — Tối đa 10 mã gần nhất</p>
        </div>
        <div class="stock-search-box">
            <input type="text" class="stock-search-input" id="stockSearchInput"
                placeholder="Nhập mã CP (VD: FPT, VNM...)" maxlength="10" autocomplete="off">
            <button class="stock-search-btn" onclick="addStockTicker()">⚡ Tra cứu</button>
            <span class="stock-search-hint">Nhấn Enter hoặc nút Tra cứu • Tối đa 10 mã</span>
        </div>
        <div class="dark-table-wrapper">
            <table class="dark-table" id="tracuuTable">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Mã CP</th>
                        <th>Sàn</th>
                        <th>Ngành HĐKD</th>
                        <th>Update time</th>
                        <th>Mô tả Mô hình kỹ thuật (Model)</th>
                        <th>Trạng thái Model</th>
                    </tr>
                </thead>
                <tbody id="tracuuBody">
                </tbody>
            </table>
            <div class="empty-state" id="tracuuEmpty">
                <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#475569" stroke-width="1.5">
                    <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
                <p>Nhập mã cổ phiếu ở trên để bắt đầu tra cứu</p>
            </div>
        </div>

        <!-- BIỂU ĐỒ FIREANT CỔ PHIẾU -->
        <div id="tracuu-stock-chart" style="max-width: 1300px; margin: 1.5rem auto 0;">
            <div class="chart-header-row">
                <h3>
                    <span style="font-size: 1.2rem;">📈</span>
                    <span id="tracuu-chart-title">Biểu Đồ Giá</span>
                </h3>
                <div class="chart-toggle-group">
                    <span class="chart-toggle-label active" id="tracuu-label-gia">Giá</span>
                    <div class="chart-toggle-switch" id="tracuu-chart-toggle" onclick="toggleChartMode('tracuu')"></div>
                    <span class="chart-toggle-label" id="tracuu-label-ptkt">PTKT</span>
                </div>
            </div>
            <div
                style="border-radius: 14px; padding: 3px; background: linear-gradient(135deg, rgba(168, 85, 247, 0.6), rgba(99, 102, 241, 0.4), rgba(168, 85, 247, 0.6)); box-shadow: 0 0 20px rgba(168, 85, 247, 0.2), 0 0 40px rgba(168, 85, 247, 0.08); animation: chartNeonPulse 3s ease-in-out infinite;">
                <div id="fireant-tracuu-chart-container"
                    style="border-radius: 12px; overflow: hidden; height: 500px; background: #131722;">
                    <!-- Bắt Đầu Tiện Ích FireAnt -->
                    <div class="fireant-widget-container" style="height:100%;width:100%">
                        <div id="fireant_tracuu_chart_host" class="fireant-chart-host" style="height:100%;width:100%">
                        </div>
                    </div>
                    <!-- Kết Thúc Tiện Ích FireAnt -->
                </div>
            </div>
            <p style="text-align: center; margin-top: 0.5rem; font-size: 0.72rem; color: #475569;">
                Biểu đồ cung cấp bởi FireAnt • Tra cứu hoặc nhấn vào mã CP trong bảng để thay đổi biểu đồ
            </p>
        </div>

        <!-- BIỂU ĐỒ MẶC ĐỊNH: CHỈ SỐ THỊ TRƯỜNG -->
        <div id="tracuu-default-markets" style="max-width: 1300px; margin: 1.5rem auto 0;">
            <div class="chart-header-row">
                <h3>
                    <span style="font-size: 1.2rem;">📊</span>
                    <span>Tổng Quan Thị Trường</span>
                </h3>
                <div style="display: flex; align-items: center; gap: 10px;">
                    <span style="background: linear-gradient(135deg, rgba(168,85,247,0.2), rgba(99,102,241,0.12)); color: #c084fc; font-size: 0.78rem; font-weight: 800; padding: 5px 14px; border-radius: 999px; border: 1px solid rgba(168,85,247,0.35); letter-spacing: 0.05em; display: flex; align-items: center; gap: 6px;">
                        <span style="width: 8px; height: 8px; border-radius: 50%; background: #22c55e; box-shadow: 0 0 8px #22c55e; display: inline-block;"></span>
                        VN-INDEX • VN30 • HNX
                    </span>
                </div>
            </div>
            <div
                style="border-radius: 14px; padding: 3px; background: linear-gradient(135deg, rgba(168, 85, 247, 0.6), rgba(99, 102, 241, 0.4), rgba(168, 85, 247, 0.6)); box-shadow: 0 0 20px rgba(168, 85, 247, 0.2), 0 0 40px rgba(168, 85, 247, 0.08); animation: chartNeonPulse 3s ease-in-out infinite;">
                <div
                    style="border-radius: 12px; overflow: hidden; min-height: 500px; background: #131722; position: relative;">
                    <div class="fireant-widget-container" style="height:100%;width:100%">
                        <div id="fireant_tracuu_markets_host" class="fireant-chart-host" style="height:100%;width:100%">
                        </div>
                    </div>
                </div>
            </div>
            <p style="text-align: center; margin-top: 0.5rem; font-size: 0.72rem; color: #475569;">
                Chỉ số thị trường cung cấp bởi FireAnt • Nhập mã cổ phiếu để xem biểu đồ giá chi tiết
            </p>
        </div>
    </div>

    <!-- ============================================ -->
    <!-- PANEL: BỘ LỌC CỔ PHIẾU                      -->
    <!-- ============================================ -->
    <div class="submenu-panel" id="panel-boloc">
        <button class="panel-close-btn" onclick="closeAllPanels()">✕</button>
        <div class="panel-header">
            <h2 class="gradient-text" style="font-size: clamp(1.6rem, 3vw, 2.2rem);">Bộ Lọc Cổ Phiếu</h2>
            <p>TOP trạng thái kỹ thuật Ngành đầu tư — Dữ liệu phân tích mô hình AI FinTop DATA</p>
        </div>

        <!-- HƯỚNG DẪN SỊ DỤNG -->
        <div
            style="max-width: 1300px; margin: 0 auto 1.5rem; padding: 1.5rem 2rem; border-radius: 14px; background: linear-gradient(135deg, rgba(168, 85, 247, 0.08), rgba(99, 102, 241, 0.04)); border: 1px solid rgba(168, 85, 247, 0.25); border-left: 3px solid #a855f7;">
            <h4
                style="color: #c084fc; font-size: 0.9rem; font-weight: 800; margin-bottom: 0.8rem; display: flex; align-items: center; gap: 8px; text-transform: uppercase; letter-spacing: 0.06em;">
                <span style="font-size: 1.2rem;">📖</span> Hướng Dẫn Sử Dụng Bộ Lọc
            </h4>
            <p style="color: #cbd5e1; font-size: 0.88rem; line-height: 1.8; margin-bottom: 0.8rem;">
                Bảng tổng hợp danh mục cổ phiếu theo <strong style="color: #c084fc;">Trạng thái</strong> và <strong
                    style="color: #c084fc;">Kết quả thuật toán</strong> của Mô hình (Model) theo phương pháp phân tích
                định lượng được trích xuất hoàn toàn tự động và tổng hợp theo các nhóm ngành. Đây là công cụ lọc và phân
                loại dữ liệu khách quan, hỗ trợ người dùng có thêm góc nhìn tổng quan về thị trường.
            </p>
            <p style="color: #94A3B8; font-size: 0.84rem; line-height: 1.7; font-style: italic;">
                Thuật toán Mô hình (Model) sử dụng AI phân tích và các Indicators (MA, Bollinger Band - Kênh xu hướng,
                RSI, Nến, ...) trên các khung thời gian để hiển thị các Trạng thái Mô hình (Model).
            </p>
        </div>

        <div class="dark-table-wrapper">
            <table class="dark-table" id="bolocTable">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Mã CP</th>
                        <th>Sàn</th>
                        <th>Ngành HĐKD</th>
                        <th>Update time</th>
                        <th>Mô tả Mô hình kỹ thuật (Model)</th>
                        <th>Trạng thái Model</th>
                        <th>Kết quả Model</th>
                        <th>Vùng giá Tham chiếu</th>
                        <th>Vùng giá Kháng cự</th>
                        <th>Điểm QTRR</th>
                    </tr>
                </thead>
                <tbody id="bolocBody">
                </tbody>
            </table>
        </div>

        <!-- BIỂU ĐỒ FIREANT VIỀN NEON -->
        <div style="max-width: 1300px; margin: 1.5rem auto 0;">
            <div class="chart-header-row">
                <h3>
                    <span style="font-size: 1.2rem;">📈</span>
                    <span id="boloc-chart-title">Biểu Đồ Kỹ Thuật</span>
                </h3>
                <div class="chart-toggle-group">
                    <span class="chart-toggle-label active" id="boloc-label-gia">Giá</span>
                    <div class="chart-toggle-switch" id="boloc-chart-toggle" onclick="toggleChartMode('boloc')"></div>
                    <span class="chart-toggle-label" id="boloc-label-ptkt">PTKT</span>
                </div>
            </div>
            <div
                style="border-radius: 14px; padding: 3px; background: linear-gradient(135deg, rgba(168, 85, 247, 0.6), rgba(99, 102, 241, 0.4), rgba(168, 85, 247, 0.6)); box-shadow: 0 0 20px rgba(168, 85, 247, 0.2), 0 0 40px rgba(168, 85, 247, 0.08); animation: chartNeonPulse 3s ease-in-out infinite;">
                <div id="fireant-chart-container"
                    style="border-radius: 12px; overflow: hidden; height: 500px; background: #131722;">
                    <!-- Bắt Đầu Tiện Ích FireAnt -->
                    <div class="fireant-widget-container" style="height:100%;width:100%">
                        <div id="fireant_chart_host" class="fireant-chart-host" style="height:100%;width:100%"></div>
                    </div>
                    <!-- Kết Thúc Tiện Ích FireAnt -->
                </div>
            </div>
            <p style="text-align: center; margin-top: 0.5rem; font-size: 0.72rem; color: #475569;">
                Biểu đồ cung cấp bởi FireAnt • Nhấn vào mã CP trong bảng để thay đổi biểu đồ
            </p>
        </div>

        <!-- BIỂU ĐỒ MẶC ĐỊNH: CHỈ SỐ THỊ TRƯỜNG CHO BỘ LỌC -->
        <div id="boloc-default-markets" style="max-width: 1300px; margin: 1.5rem auto 0;">
            <div class="chart-header-row">
                <h3>
                    <span style="font-size: 1.2rem;">📊</span>
                    <span>Tổng Quan Thị Trường</span>
                </h3>
                <div style="display: flex; align-items: center; gap: 10px;">
                    <span style="background: linear-gradient(135deg, rgba(168,85,247,0.2), rgba(99,102,241,0.12)); color: #c084fc; font-size: 0.78rem; font-weight: 800; padding: 5px 14px; border-radius: 999px; border: 1px solid rgba(168,85,247,0.35); letter-spacing: 0.05em; display: flex; align-items: center; gap: 6px;">
                        <span style="width: 8px; height: 8px; border-radius: 50%; background: #22c55e; box-shadow: 0 0 8px #22c55e; display: inline-block;"></span>
                        VN-INDEX • VN30 • HNX
                    </span>
                </div>
            </div>
            <div
                style="border-radius: 14px; padding: 3px; background: linear-gradient(135deg, rgba(168, 85, 247, 0.6), rgba(99, 102, 241, 0.4), rgba(168, 85, 247, 0.6)); box-shadow: 0 0 20px rgba(168, 85, 247, 0.2), 0 0 40px rgba(168, 85, 247, 0.08); animation: chartNeonPulse 3s ease-in-out infinite;">
                <div
                    style="border-radius: 12px; overflow: hidden; min-height: 500px; background: #131722; position: relative;">
                    <div class="fireant-widget-container" style="height:100%;width:100%">
                        <div id="fireant_boloc_markets_host" class="fireant-chart-host" style="height:100%;width:100%">
                        </div>
                    </div>
                </div>
            </div>
            <p style="text-align: center; margin-top: 0.5rem; font-size: 0.72rem; color: #475569;">
                Chỉ số thị trường cung cấp bởi FireAnt • Nhấn vào mã cổ phiếu để xem biểu đồ giá chi tiết
            </p>
        </div>

        <!-- MIỄN TRỪ TRÁCH NHIỆM -->
        <div
            style="max-width: 1300px; margin: 1.5rem auto 0; padding: 1.2rem 2rem; border-radius: 12px; background: rgba(248, 113, 113, 0.06); border: 1px solid rgba(248, 113, 113, 0.2); text-align: center;">
            <h4
                style="color: #f87171; font-size: 0.85rem; font-weight: 800; margin-bottom: 0.5rem; text-transform: uppercase; letter-spacing: 0.06em; display: flex; align-items: center; justify-content: center; gap: 6px;">
                <span style="font-size: 1.1rem;">⚠️</span> Miễn Trừ Trách Nhiệm !
            </h4>
            <p style="color: #94A3B8; font-size: 0.84rem; line-height: 1.7;">
                Dữ liệu chỉ mang tính chất tham khảo, <strong style="color: #f87171;">không khuyến nghị đầu
                    tư</strong>.<br>
                Người dùng chịu hoàn toàn trách nhiệm trước các quyết định đầu tư của mình.
            </p>
        </div>
    </div>

    <!-- ============================================ -->
    <!-- PANEL: TÍN HIỆU TỪ CHUYÊN GIA              -->
    <!-- ============================================ -->
    <div class="submenu-panel" id="panel-tinhieu">
        <button class="panel-close-btn" onclick="closeAllPanels()">✕</button>
        <div class="panel-header">
            <h2 class="gradient-text" style="font-size: clamp(1.6rem, 3vw, 2.2rem);">📡 Copy Trade Chuyên gia</h2>
            <p>Copy Trade Chuyên gia — Cập nhật liên tục theo phiên giao dịch
            </p>
        </div>

        <!-- THỰC HIỆN BỞI CHUYÊN GIA VPS -->
        <div
            style="max-width: 1300px; margin: 0 auto 1.5rem; padding: 1.5rem 2rem; border-radius: 14px; background: linear-gradient(135deg, rgba(168, 85, 247, 0.08), rgba(99, 102, 241, 0.04)); border: 1px solid rgba(168, 85, 247, 0.25); border-left: 3px solid #a855f7;">
            <h4
                style="color: #c084fc; font-size: 0.9rem; font-weight: 800; margin-bottom: 0.8rem; display: flex; align-items: center; gap: 8px; text-transform: uppercase; letter-spacing: 0.06em;">
                <span style="font-size: 1.2rem;">✨</span> Thực Hiện Bởi Chuyên Gia VPS
            </h4>
            <p style="color: #cbd5e1; font-size: 0.88rem; line-height: 1.8; margin-bottom: 0.8rem;">
                <span style="color: #c084fc;">✦</span> Dành cho Khách hàng VPS, mở TK và giao dịch chứng khoán tại VPS (<strong style="color: #22c55e;">MIỄN PHÍ</strong>)!<br>
                <span style="color: #c084fc;">✦</span> Chuyên mục hợp tác cùng <strong style="color: #c084fc;">Chuyên gia VPS</strong> trên nền tảng Công nghệ &amp; Dữ liệu <strong style="color: #c084fc;">FinTop DATA</strong> và Đối tác chiến lược <strong style="color: #c084fc;">VPS Partner</strong> - FINTOP ID BOJE (HĐ No. ......)
            </p>
            <p style="color: #94A3B8; font-size: 0.84rem; line-height: 1.7; font-style: italic;">
                → Mô hình (Model) của Chuyên gia sử dụng các Indicators (MA, Bollinger Band - Kênh xu hướng, RSI, Nến, ...) trên khung thời gian lớn để xác lập xu hướng <strong style="color: #c084fc;">"DÀI HẠN"</strong> và các Indicators trên khung thời gian nhỏ để nhận diện xu hướng và các biến động <strong style="color: #f87171;">"NGẮN HẠN"</strong>.
            </p>
        </div>

        <!-- SECTION: TÍN HIỆU CHUYÊN GIA -->
        <div style="max-width: 1300px; margin: 0 auto 1rem;">
            <div
                style="font-size: 1.1rem; font-weight: 800; color: #c084fc; margin-bottom: 1rem; padding-bottom: 0.8rem; border-bottom: 1px solid rgba(168,85,247,0.2); display: flex; align-items: center; gap: 10px; text-transform: uppercase; letter-spacing: 0.05em;">
                <span style="font-size: 1.3rem;">📡</span> Copy Trade Chuyên gia
                <span
                    style="background: rgba(168,85,247,0.15); color: #c084fc; font-size: 0.7rem; padding: 3px 10px; border-radius: 999px; font-weight: 700; margin-left: auto;"
                    id="signalCountBadge">0 tín hiệu</span>
            </div>
        </div>
        <div id="signalContainer"
            style="max-width: 1300px; margin: 0 auto 2rem; display: flex; flex-direction: column; gap: 1rem;"></div>

        <!-- MIỄN TRỪ TRÁCH NHIỆM -->
        <div class="disclaimer-msg">
            <h4><span style="font-size: 1.1rem;">⚠️</span> Miễn Trừ Trách Nhiệm !</h4>
            <p>Tín hiệu chỉ mang tính chất tham khảo, <strong>không khuyến nghị đầu tư</strong>.<br>
                Người dùng chịu hoàn toàn trách nhiệm trước các quyết định đầu tư của mình.</p>
        </div>
    </div>
