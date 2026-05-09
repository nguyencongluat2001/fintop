@extends('client.layouts.index')

@section('body-client')
<!-- VÙNG CUỘN HIỆU ỨNG ĐIỆN ẢNH -->
    <div id="cinematic-container">

        <!-- Hiệu Ứng Flash Chuyển Cảnh -->
        <div class="flash-overlay"></div>

        <!-- PHÂN CẢNH 1: TRANG CHỦ HERO -->
        <section class="scene scene-1">
            <div class="hero-content">
                <h1 class="hero-title gradient-text">Kỷ Nguyên Đầu Tư Cùng FinTop DATA.</h1>
                <p class="hero-subtitle">Nơi hội tụ Data - Chuyên gia - Công nghệ & AI. Tinh gọn và hiệu quả.</p>
                <div class="hero-cta-wrapper">
                    <button class="btn-white-huge" onclick="location.href='hoi-vien/index.html'">Bắt đầu miễn
                        phí</button>
                    <span style="font-size: 0.9rem; color: #94A3B8; letter-spacing: 0.5px;"></span>
                </div>
            </div>

            <!-- Giao Diện Giả Lập Trợ Lý AI -->
            <div class="ai-assistant-widget">
                <div class="ai-avatar">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path
                            d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z" />
                        <path d="M5 3v4" />
                        <path d="M19 17v4" />
                        <path d="M3 5h4" />
                        <path d="M17 19h4" />
                    </svg>
                </div>
                <div class="ai-message">
                    <div class="ai-name">
                        FinTop AI
                        <div class="ai-status-dot"></div>
                    </div>
                    <div class="ai-text">"Phát hiện dòng tiền lớn thâm nhập mã FPT. Khuyến nghị Tích lũy vùng giá 132.
                        Bạn muốn mở phân tích chuyên sâu chứ?"</div>
                </div>
            </div>

            <div style="position: absolute; bottom: 20px; left: 50%; transform: translateX(-50%); opacity: 0.5;">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <polyline points="6 9 12 15 18 9"></polyline>
                </svg>
            </div>
        </section>

        <!-- PHÂN CẢNH 2: TÍNH NĂNG -->
        <section class="scene scene-2">
            <div class="ai-cube gradient-text">Dữ Liệu Cho Nhà Đầu Tư Thế Hệ Mới!</div>
            <div class="panels-container">
                <div class="panel">
                    <h3 style="color:var(--text-primary); margin-bottom:1rem;">DATA</h3>
                    <ul style="color: var(--text-secondary); line-height: 2;">
                        <li>✓ Tra cứu Cổ phiếu</li>
                        <li>✓ Bộ lọc Tín hiệu</li>
                        <li>✓ Stock Data API</li>
                    </ul>
                </div>
                <div class="panel">
                    <h3 style="color:var(--text-primary); margin-bottom:1rem;">CHUYÊN GIA</h3>
                    <ul style="color: var(--text-secondary); line-height: 2;">
                        <li>✓ Nhận định Tín hiệu</li>
                        <li>✓ Danh mục Khuyến nghị</li>
                        <li>✓ Cố vấn 1-1</li>
                    </ul>
                </div>
                <div class="panel">
                    <h3 style="color:var(--text-primary); margin-bottom:1rem;">AI PHÂN TÍCH</h3>
                    <ul style="color: var(--text-secondary); line-height: 2;">
                        <li>✓ Công cụ FinTop AI</li>
                        <li>✓ Tự động hóa điểm mua/bán</li>
                        <li>✓ Phân tích Sentiment</li>
                    </ul>
                </div>
            </div>
        </section>

    </div>

    <!-- PHẦN 2.5: TRÌNH DIỄN GIAO DIỆN TERMINAL -->
    <section class="product-showcase">
        <div class="showcase-header">
            <h2 class="gradient-text">Hệ Sinh Thái Phân Tích Đầu Tư Đỉnh Cao</h2>
            <p>Đồng hành trên +10,000 nhà đầu tư tại Việt Nam làm chủ dòng tiền đầu tư thông minh bằng bộ công cụ dữ liệu tiêu chuẩn quốc tế.</p>
        </div>
        <div class="showcase-mockup-wrapper">
            <img src="/assetsFT/images/fintop_terminal_mockup.png" alt="FinTop DATA Terminal Dashboard" class="mockup-img">
        </div>
    </section>

    <!-- PHẦN 3: THỐNG KÊ SỐ LIỆU -->
    <section class="stats-section">
        <div class="stat-item">
            <h3 class="stat-number" data-target="1500" data-suffix="+">0</h3>
            <p>Cổ phiếu được Cover</p>
        </div>
        <div class="stat-item">
            <h3 class="stat-number" data-target="50" data-suffix="+">0</h3>
            <p>Chuyên gia Thị trường</p>
        </div>
        <div class="stat-item">
            <h3 class="stat-number" data-target="98" data-suffix="%">0</h3>
            <p>Độ chính xác AI Model</p>
        </div>
    </section>

    <!-- PHẦN 4: BẢNG GIÁ HỘI VIÊN -->
    <section class="pricing-section" id="pricing">
        <h2 class="gradient-text" style="position: relative; z-index: 1;">Chọn Gói Hội Viên</h2>
        <p style="margin-top: 1rem; position: relative; z-index: 1;">Nâng cấp trải nghiệm đầu tư của bạn ngay hôm nay
        </p>

        <div class="pricing-grid">
            <!-- GÓI STANDARD - Xanh lam -->
            <div class="pricing-card liquid-glass-card card-standard">
                <div class="pricing-title">STANDARD</div>
                <div class="pricing-subtitle" style="color: #7dd3fc;">(Tiêu chuẩn)</div>
                <ul class="pricing-features">
                    <li><span class="check-icon">✦</span> Tra cứu CP</li>
                    <li><span class="check-icon">✦</span> Báo cáo phân tích</li>
                    <li><span class="check-icon">✦</span> Tool & Dữ liệu cơ bản</li>
                </ul>
                <button class="btn-tier">Đăng ký</button>
            </div>

            <!-- GÓI PRO - Tím -->
            <div class="pricing-card liquid-glass-card card-pro">
                <div class="pricing-title">PRO ⭐</div>
                <div class="pricing-subtitle" style="color: #c4b5fd;">(Chuyên nghiệp)</div>
                <ul class="pricing-features">
                    <li><span class="check-icon">✦</span> Bộ Lọc CP</li>
                    <li><span class="check-icon">✦</span> Pro Analysis</li>
                    <li><span class="check-icon">✦</span> Pro Data</li>
                </ul>
                <button class="btn-tier">Đăng ký</button>
            </div>

            <!-- GÓI V.I.P - Xanh ngọc -->
            <div class="pricing-card liquid-glass-card card-vip">
                <div class="pricing-title">V.I.P</div>
                <div class="pricing-subtitle" style="color: #6ee7b7;">(Nâng cao)</div>
                <ul class="pricing-features">
                    <li><span class="check-icon">✦</span> Đặc quyền PRO</li>
                    <li><span class="check-icon">✦</span> Kết nối Chuyên gia</li>
                    <li><span class="check-icon">✦</span> Phân tích Chuyên gia</li>
                </ul>
                <button class="btn-tier">Đăng ký</button>
            </div>

            <!-- GÓI DIAMOND - Vàng -->
            <div class="pricing-card liquid-glass-card card-diamond">
                <div class="pricing-title">DIAMOND 💎</div>
                <div class="pricing-subtitle" style="color: #fcd34d;">(Kim cương)</div>
                <ul class="pricing-features">
                    <li><span class="check-icon">✦</span> Đặc quyền V.I.P</li>
                    <li><span class="check-icon">✦</span> Đặc quyền PRO</li>
                    <li><span class="check-icon">✦</span> Cố vấn 1-1 Chuyên gia</li>
                </ul>
                <button class="btn-tier">Đăng ký</button>
            </div>
        </div>
    </section>

    <!-- PHẦN 5: ĐỘI NGŨ CHUYÊN GIA -->
    <section class="team-section" id="team">
        <h2 class="gradient-text" style="position: relative; z-index: 1;">Đội Ngũ Chuyên Gia VPS</h2>
        <p
            style="margin-top: 1rem; position: relative; z-index: 1; color: #94A3B8; font-size: 1.1rem; max-width: 700px; margin-left: auto; margin-right: auto;">
            Hợp tác độc quyền cùng Chuyên gia VPS trên nền tảng Công nghệ & Dữ liệu FinTop DATA
        </p>

        <!-- Hàng 1: CEO -->
        <div class="team-row team-row-1">
            <div class="team-member">
                <div class="team-avatar-wrapper avatar-gold">
                    <img src="/assetsFT/images/anh_Hai.png" alt="Nguyễn Đình Hải" class="team-avatar">
                </div>
                <h3 class="team-name">Nguyễn Đình Hải</h3>
                <p class="team-role">Founder & CEO FinTop Ltd.</p>
                <p class="team-desc">Chuyên gia Phân tích Chiến lược & QTRR.</p>
            </div>
        </div>

        <!-- Hàng 2: 2 thành viên -->
        <div class="team-row team-row-2">
            <div class="team-member">
                <div class="team-avatar-wrapper avatar-cyan">
                    <img src="/assetsFT/images/anh_Linh.png" alt="Trần Khánh Linh" class="team-avatar">
                </div>
                <h3 class="team-name">Trần Khánh Linh</h3>
                <p class="team-role">Co-Founder FinTop, Dữ liệu FinTop.Data</p>
                <p class="team-desc">Chuyên gia NC&PT Thị trường chứng khoán.</p>
            </div>
            <div class="team-member">
                <div class="team-avatar-wrapper avatar-pink">
                    <img src="/assetsFT/images/chi_Hanh.png" alt="Nguyễn Minh Hạnh" class="team-avatar">
                </div>
                <h3 class="team-name">Nguyễn Minh Hạnh</h3>
                <p class="team-role">Chuyên gia Phân tích Ngành - Vĩ mô FinTop</p>
                <p class="team-desc">Thạc sĩ Kinh tế chiến lược (FSU JENA, Đức).</p>
            </div>
        </div>

        <!-- Hàng 3: 2 thành viên -->
        <div class="team-row team-row-2">
            <div class="team-member">
                <div class="team-avatar-wrapper avatar-green">
                    <img src="/assetsFT/images/anh_Tu.png" alt="Trần Thiện Tú" class="team-avatar">
                </div>
                <h3 class="team-name">Trần Thiện Tú</h3>
                <p class="team-role">Chuyên gia NC&PT Cổ phiếu DN</p>
                <p class="team-desc">Nghiên cứu chuyên động Ngành, Phân tích triển vọng tăng trưởng Doanh nghiệp.</p>
            </div>
            <div class="team-member">
                <div class="team-avatar-wrapper avatar-purple">
                    <img src="/assetsFT/images/anh_Dung.png" alt="Mai Tiến Dũng" class="team-avatar">
                </div>
                <h3 class="team-name">Mai Tiến Dũng</h3>
                <p class="team-role">Chuyên gia NC&PT Cổ phiếu DN</p>
                <p class="team-desc">Thạc sĩ Tài chính số - FinTech (Loughborough University, London, Anh).</p>
            </div>
        </div>
    </section>

    <!-- SECTION 6: GIỚI THIỆU FINTOP -->
    <section class="about-section" id="about">
        <h2 class="gradient-text" style="position: relative; z-index: 1;">Giới Thiệu FINTOP</h2>
        <div class="about-description">
            <p>
                <strong style="color: #c084fc;">Công Ty TNHH Đầu Tư & Phát Triển FINTOP</strong> là doanh nghiệp
                <em>Fintech & Data</em> hoạt động và định hướng phát triển trong lĩnh vực
                <strong style="color: #38bdf8;">Công nghệ Tài chính</strong>,
                Nghiên cứu - Phân tích - Xử lý - Xuất bản Dữ liệu với các
                <strong style="color: #f59e0b;">"Mô hình tiên tiến" (Model)</strong> chuẩn hóa cho hiệu quả cao,
                ứng dụng <strong style="color: #34d399;">"Công nghệ AI"</strong> trong phân tích, nghiên cứu cùng
                Đội ngũ Chuyên gia giàu kinh nghiệm nhằm mang đến những công cụ và dữ liệu bổ trợ mạnh mẽ
                cho hoạt động phân tích, nghiên cứu và ra quyết định đầu tư.
            </p>
            <p style="margin-top: 1rem;">
                FINTOP không ngừng mở rộng, hợp tác phát triển, cung cấp các sản phẩm/dịch vụ trọng yếu,
                đa dạng về dữ liệu cho thị trường <strong style="color: #c084fc;">Tài chính & Đầu tư</strong>.
            </p>
        </div>

        <!-- Thẻ Đánh Giá Từ Người Dùng -->
        <div class="testimonial-grid">
            <div class="testimonial-card testimonial-cyan">
                <div class="testimonial-quote">
                    <span class="quote-mark">&ldquo;</span>
                    FinTop là đơn vị uy tín chuyên cung cấp dữ liệu, kiến thức thực tế, chiến lược đầu tư và các báo cáo
                    phân tích kịp thời, vô cùng hữu dụng cho nhà đầu tư và cả các chuyên gia về chứng khoán. Với chiến
                    lược và cách làm chuyên nghiệp, đặc biệt Đội ngũ FinTop với nhiều năm kinh nghiệm trên thị trường sẽ
                    giúp nhà đầu tư tối ưu hiệu quả và đạt được lợi nhuận tốt nhất trong quá trình giao dịch. Với sự hỗ
                    trợ từ FinTop nhà đầu tư sẽ thông thái, chủ động với việc đầu tư và kỷ luật với chiến lược giao dịch
                    đã đề ra.
                    <span class="quote-mark">&rdquo;</span>
                </div>
                <div class="testimonial-author">
                    <img src="/assetsFT/images/anh_Long.png" alt="Anh Lê Văn Long" class="testimonial-avatar">
                    <div>
                        <h4 class="testimonial-name">Anh Lê Văn Long</h4>
                        <p class="testimonial-role">Giám đốc Tư vấn đầu tư — Công ty Cổ phần Chứng khoán VPS</p>
                    </div>
                </div>
            </div>

            <div class="testimonial-card testimonial-pink">
                <div class="testimonial-quote">
                    <span class="quote-mark">&ldquo;</span>
                    FINTOP là nơi tập hợp tinh hoa của đội ngũ chuyên gia trẻ, năng động, có kinh nghiệm thực chiến trên
                    thị trường chứng khoán, vừa có kiến thức chuyên sâu về phân tích cơ bản và vừa có độ nhạy bén trong
                    phân tích kỹ thuật. Đây là một trang web uy tín, đáng tin cậy, giúp cung cấp các phân tích và cập
                    nhật thị trường, chọn lọc cổ phiếu. Ngoài ra, đội ngũ chuyên gia của FINTOP cũng thường xuyên cung
                    cấp các phân tích chiến lược đầu tư hay có các báo cáo phân tích ngành và phân tích doanh nghiệp,
                    giúp cho nhà đầu tư có căn cứ để đưa ra các quyết định đầu tư sáng suốt. Nếu nhà đầu tư chưa có
                    nhiều kiến thức, kinh nghiệm, hoặc không có nhiều thời gian để tìm hiểu và nghiên cứu về chứng khoán
                    thì FINTOP chính là người đồng hành tuyệt vời của nhà đầu tư.
                    <span class="quote-mark">&rdquo;</span>
                </div>
                <div class="testimonial-author">
                    <img src="/assetsFT/images/chi_Helena.png" alt="Chị Helena Hạnh Đặng" class="testimonial-avatar">
                    <div>
                        <h4 class="testimonial-name">Chị Helena Hạnh Đặng</h4>
                        <p class="testimonial-role">Chuyên gia Đào tạo Tài chính cá nhân — Khách hàng đối tác</p>
                    </div>
                </div>
            </div>

            <div class="testimonial-card testimonial-green">
                <div class="testimonial-quote">
                    <span class="quote-mark">&ldquo;</span>
                    FinTop là một đội ngũ chuyên nghiệp, không ngừng nghiên cứu, học hỏi, cầu thị và luôn luôn lắng nghe
                    khách hàng, đối tác. Những báo cáo phân tích, đánh giá của Team mang lại nhiều hữu ích cho mình là
                    một người công tác trong lĩnh vực Tài chính với các báo cáo phân tích ngành, dữ liệu kinh tế vĩ mô,
                    phân tích đánh giá doanh nghiệp. Đặc biệt có phần tra cứu xu hướng cổ phiếu rất hay bên cạnh chia sẻ
                    cẩm nang, phương pháp đầu tư để mọi người cùng tìm hiểu. Chúc FinTop Team sẽ tiếp tục phát huy và
                    luôn có những báo cáo phân tích chất lượng nhất đến khách hàng.
                    <span class="quote-mark">&rdquo;</span>
                </div>
                <div class="testimonial-author">
                    <img src="/assetsFT/images/chi_Lich.png" alt="Chị Trần Thị Hồng Lịch" class="testimonial-avatar">
                    <div>
                        <h4 class="testimonial-name">Chị Trần Thị Hồng Lịch</h4>
                        <p class="testimonial-role">Nhà Đầu Tư — Khách Hàng Đối Tác FinTop</p>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
