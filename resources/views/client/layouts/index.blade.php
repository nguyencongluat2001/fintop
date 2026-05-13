<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FinTop DATA | Kỷ Nguyên Đầu Tư Mới</title>

    <!-- Tệp CSS -->
    <link rel="stylesheet" href="/assetsFT/css/custom.css">
    <link rel="stylesheet" href="/assetsFT/css/variables.css">
    <link rel="stylesheet" href="/assetsFT/css/base.css">
    <link rel="stylesheet" href="/assetsFT/css/components.css">
    <!-- GSAP (Thư viện hiệu ứng) qua CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js" defer></script>

    <!-- Tệp JavaScript Tùy Chỉnh -->
    <link href="{{ asset('clients/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('clients/fontawesome/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('clients/css/boxicon.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/chosen/chosen.min.css') }}" rel="stylesheet">

    <script src="/assetsFT/js/scroll-animation.js" defer></script>
    <script src="/assetsFT/js/counter.js" defer></script>
    <script src="{{ asset('clients/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets\js\NclLibrary.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('clients/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('assets/chosen/chosen.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/toast.min.css') }}">
    <script src="{{ asset('clients/js/templatemo.js') }}"></script>

    <link rel="stylesheet" href="{{ asset('assets/css/sweetalert2.min.css') }}">
    <script src="{{ asset('assets/js/sweetalert2.min.js') }}"></script>
</head>

<body>

    @include('client.layouts.header')

    @yield('body-client')

    @include('client.layouts.footer')

    <script type="text/jscript" src="{{ asset('assets/js/toast.min.js') }}"></script>
    <script>
            // Header scroll effect
            window.addEventListener('scroll', () => {
                const header = document.getElementById('mainHeader');
                if (window.scrollY > 50) {
                    header.classList.add('scrolled');
                } else {
                    header.classList.remove('scrolled');
                }
            });
    
            // ==============================================
            // MEGA MENU + CONTENT PANEL SYSTEM
            // ==============================================
    
            // Sample stock data for Tra cứu
            const STOCK_DB = {
                'VEA': { san: 'UPCOM', nganh: 'Bán buôn, bán lẻ', time: '23:26\n05/03', desc: 'Mẫu nến đi ngang tăng nhẹ.', status: 'very-positive', statusText: 'RẤT TÍCH CỰC' },
                'DST': { san: 'HNX', nganh: 'Bán buôn, bán lẻ', time: '23:27\n05/03', desc: 'Mẫu nến suy giảm chạm hỗ trợ MA200.', status: 'positive', statusText: 'TÍCH CỰC' },
                'DGW': { san: 'HOSE', nganh: 'Bán buôn, bán lẻ', time: '23:28\n05/03', desc: 'Mẫu nến đi ngang trên hỗ trợ MA50.', status: 'ok', statusText: 'KHẢ QUAN' },
                'MWG': { san: 'HOSE', nganh: 'Bán lẻ', time: '23:32\n05/03', desc: 'Mẫu nến suy giảm.', status: 'neutral', statusText: 'TRUNG LẬP' },
                'PNJ': { san: 'HOSE', nganh: 'Bán lẻ', time: '23:33\n05/03', desc: 'Mẫu hình 2 đỉnh, nếu suy giảm.', status: 'negative', statusText: 'KO TÍCH CỰC' },
                'FPT': { san: 'HOSE', nganh: 'Công nghệ', time: '23:35\n05/03', desc: 'Kênh xu hướng tăng trung hạn.', status: 'very-positive', statusText: 'RẤT TÍCH CỰC' },
                'VNM': { san: 'HOSE', nganh: 'Sản xuất sữa', time: '23:36\n05/03', desc: 'Mẫu nến đi ngang tích lũy.', status: 'ok', statusText: 'KHẢ QUAN' },
                'FRT': { san: 'HOSE', nganh: 'Bán lẻ', time: '23:26\n05/03', desc: 'Mẫu suy giảm.', status: 'ok', statusText: 'KHẢ QUAN' },
                'MSN': { san: 'HOSE', nganh: 'Bán lẻ', time: '23:26\n05/03', desc: 'Kênh xu hướng giảm.', status: 'very-positive', statusText: 'RẤT TÍCH CỰC' },
                'PLX': { san: 'HOSE', nganh: 'Bán lẻ', time: '23:26\n05/03', desc: 'Mẫu nến giảm ngắn, chạm hỗ trợ MA5.', status: 'positive', statusText: 'TÍCH CỰC' },
                'PET': { san: 'HOSE', nganh: 'Bán lẻ', time: '23:26\n05/03', desc: 'Mẫu nến đi ngang tích lũy, kênh xu hướng tăng.', status: 'ok', statusText: 'KHẢ QUAN' },
                'BVH': { san: 'HOSE', nganh: 'Bảo hiểm', time: '23:26\n05/03', desc: 'Mẫu nến giảm, thủng hỗ trợ MA20.', status: 'very-positive', statusText: 'RẤT TÍCH CỰC' },
                'BIC': { san: 'HOSE', nganh: 'Bảo hiểm', time: '23:26\n05/03', desc: 'Mẫu nến đi ngang.', status: 'positive', statusText: 'TÍCH CỰC' },
                'HPG': { san: 'HOSE', nganh: 'Thép', time: '23:40\n05/03', desc: 'Kênh xu hướng tăng mạnh.', status: 'very-positive', statusText: 'RẤT TÍCH CỰC' },
                'SSI': { san: 'HOSE', nganh: 'Chứng khoán', time: '23:41\n05/03', desc: 'Mẫu nến đi ngang trên MA20.', status: 'positive', statusText: 'TÍCH CỰC' },
                'VCB': { san: 'HOSE', nganh: 'Ngân hàng', time: '23:42\n05/03', desc: 'Kênh giá tăng ổn định.', status: 'very-positive', statusText: 'RẤT TÍCH CỰC' },
                'TCB': { san: 'HOSE', nganh: 'Ngân hàng', time: '23:43\n05/03', desc: 'Mẫu nến tăng nhẹ.', status: 'positive', statusText: 'TÍCH CỰC' },
                'VHM': { san: 'HOSE', nganh: 'Bất động sản', time: '23:44\n05/03', desc: 'Mẫu nến giảm chạm hỗ trợ.', status: 'neutral', statusText: 'TRUNG LẬP' },
            };
    
            // Bộ lọc data (extended)
            const BOLOC_DATA = [
                { ticker: 'VEA', san: 'UPCOM', nganh: 'Bán buôn, bán lẻ', time: '23:26\n05/03', desc: 'Mẫu nến đi ngang tăng nhẹ.', status: 'very-positive', statusText: 'RẤT TÍCH CỰC', result: 'strong-entry', resultText: 'STRONG ENTRY', giaTc: '34 - 34.5', giaKc: '38 - 42', qtrr: '33' },
                { ticker: 'DST', san: 'HNX', nganh: 'Bán buôn, bán lẻ', time: '23:26\n05/03', desc: 'Mẫu nến suy giảm chạm hỗ trợ MA200.', status: 'positive', statusText: 'TÍCH CỰC', result: 'entry', resultText: 'ENTRY', giaTc: '9.3 - 9.5', giaKc: '10.2 - 10.7', qtrr: '21' },
                { ticker: 'DGW', san: 'HOSE', nganh: 'Bán buôn, bán lẻ', time: '23:26\n05/03', desc: 'Mẫu nến đi ngang trên hỗ trợ MA50.', status: 'ok', statusText: 'KHẢ QUAN', result: 'small-entry', resultText: 'SMALL ENTRY', giaTc: '45.5 - 46.5', giaKc: '38 - 42', qtrr: '18' },
                { ticker: 'MWG', san: 'HOSE', nganh: 'Bán lẻ', time: '23:26\n05/03', desc: 'Mẫu nến suy giảm.', status: 'very-positive', statusText: 'RẤT TÍCH CỰC', result: 'strong-entry', resultText: 'STRONG ENTRY', giaTc: '85 - 86', giaKc: '10.2 - 10.7', qtrr: '33' },
                { ticker: 'PNJ', san: 'HOSE', nganh: 'Bán lẻ', time: '23:26\n05/03', desc: 'Mẫu hình 2 đỉnh, nếu suy giảm.', status: 'positive', statusText: 'TÍCH CỰC', result: 'entry', resultText: 'ENTRY', giaTc: '114 - 117', giaKc: '38 - 42', qtrr: '21' },
                { ticker: 'FRT', san: 'HOSE', nganh: 'Bán lẻ', time: '23:26\n05/03', desc: 'Mẫu suy giảm.', status: 'ok', statusText: 'KHẢ QUAN', result: 'small-entry', resultText: 'SMALL ENTRY', giaTc: '158 - 160', giaKc: '10.2 - 10.7', qtrr: '18' },
                { ticker: 'MSN', san: 'HOSE', nganh: 'Bán lẻ', time: '23:26\n05/03', desc: 'Kênh xu hướng giảm.', status: 'very-positive', statusText: 'RẤT TÍCH CỰC', result: 'strong-entry', resultText: 'STRONG ENTRY', giaTc: '75 - 76', giaKc: '38 - 42', qtrr: '33' },
                { ticker: 'PLX', san: 'HOSE', nganh: 'Bán lẻ', time: '23:26\n05/03', desc: 'Mẫu nến giảm ngắn, chạm hỗ trợ MA5.', status: 'positive', statusText: 'TÍCH CỰC', result: 'entry', resultText: 'ENTRY', giaTc: '64 - 65.5', giaKc: '10.2 - 10.7', qtrr: '21' },
                { ticker: 'PET', san: 'HOSE', nganh: 'Bán lẻ', time: '23:26\n05/03', desc: 'Mẫu nến đi ngang tích lũy, kênh xu hướng tăng.', status: 'ok', statusText: 'KHẢ QUAN', result: 'small-entry', resultText: 'SMALL ENTRY', giaTc: '39 - 40', giaKc: '38 - 42', qtrr: '18' },
                { ticker: 'BVH', san: 'HOSE', nganh: 'Bảo hiểm', time: '23:26\n05/03', desc: 'Mẫu nến giảm, thủng hỗ trợ MA20.', status: 'very-positive', statusText: 'RẤT TÍCH CỰC', result: 'strong-entry', resultText: 'STRONG ENTRY', giaTc: '75.5 - 76.5', giaKc: '10.2 - 10.7', qtrr: '21' },
                { ticker: 'BIC', san: 'HOSE', nganh: 'Bảo hiểm', time: '23:26\n05/03', desc: 'Mẫu nến đi ngang.', status: 'positive', statusText: 'TÍCH CỰC', result: 'entry', resultText: 'ENTRY', giaTc: '23 - 24.5', giaKc: '50 - 52', qtrr: '18' },
            ];
    
            // Track searched tickers
            let searchedTickers = [];
            let bolocRendered = false;
    
            // Toggle dropdown pin
            function toggleDropdownPin(dropdownId) {
                const dropdown = document.getElementById(dropdownId);
                const dc = dropdown.querySelector('.dropdown-content');
    
                // Close other dropdowns
                document.querySelectorAll('.dropdown-content.pinned').forEach(d => {
                    if (d !== dc) d.classList.remove('pinned');
                });
    
                dc.classList.toggle('pinned');
            }
    
            // Open content panel
            function openPanel(panelId, clickedLink) {
                // Close all panels first
                document.querySelectorAll('.submenu-panel').forEach(p => p.classList.remove('active'));
    
                // Remove active from all submenu links
                document.querySelectorAll('.dropdown-content a').forEach(a => a.classList.remove('active-submenu'));
    
                // Activate this panel
                const panel = document.getElementById(panelId);
                panel.classList.add('active');
    
                // Mark clicked link active
                if (clickedLink) clickedLink.classList.add('active-submenu');
    
                // Pin the parent dropdown
                const parentDC = clickedLink.closest('.dropdown-content');
                if (parentDC) parentDC.classList.add('pinned');
    
                // Auto-render Bộ lọc table on first open
                if (panelId === 'panel-boloc' && !bolocRendered) {
                    renderBolocTable();
                    bolocRendered = true;
                }
    
                // Auto-render Tín hiệu on first open
                if (panelId === 'panel-tinhieu') {
                    renderSignals();
                }
    
                // Focus search input if tra cứu
                if (panelId === 'panel-tracuu') {
                    setTimeout(() => document.getElementById('stockSearchInput').focus(), 300);
                }
            }
    
            // Close all panels
            function closeAllPanels() {
                document.querySelectorAll('.submenu-panel').forEach(p => p.classList.remove('active'));
                document.querySelectorAll('.dropdown-content').forEach(d => d.classList.remove('pinned'));
                document.querySelectorAll('.dropdown-content a').forEach(a => a.classList.remove('active-submenu'));
            }
    
            // Click outside to close
            document.addEventListener('click', (e) => {
                if (!e.target.closest('.nav-item.dropdown') &&
                    !e.target.closest('.submenu-panel') &&
                    !e.target.closest('.panel-close-btn')) {
                    // Don't close if clicking inside a panel or dropdown
                    const anyPanelActive = document.querySelector('.submenu-panel.active');
                    if (!anyPanelActive) {
                        document.querySelectorAll('.dropdown-content.pinned').forEach(d => d.classList.remove('pinned'));
                    }
                }
            });
    
            // Escape key to close
            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape') closeAllPanels();
            });
    
            // =====================
            // STOCK SEARCH LOGIC
            // =====================
    
            // Enter key on search input
            document.addEventListener('DOMContentLoaded', () => {
                const input = document.getElementById('stockSearchInput');
                if (input) {
                    input.addEventListener('keydown', (e) => {
                        if (e.key === 'Enter') addStockTicker();
                    });
                }
            });
    
            function addStockTicker() {
                const input = document.getElementById('stockSearchInput');
                const ticker = input.value.trim().toUpperCase();
    
                if (!ticker) return;
    
                // Check if ticker exists in DB
                if (!STOCK_DB[ticker]) {
                    // Shake animation for invalid ticker
                    input.style.borderColor = '#f87171';
                    input.style.boxShadow = '0 0 15px rgba(248, 113, 113, 0.3)';
                    input.classList.add('shake');
                    setTimeout(() => {
                        input.style.borderColor = 'rgba(168, 85, 247, 0.3)';
                        input.style.boxShadow = 'none';
                    }, 1500);
                    input.value = '';
                    return;
                }
    
                // Check if already in list
                const existingIdx = searchedTickers.indexOf(ticker);
                if (existingIdx !== -1) {
                    searchedTickers.splice(existingIdx, 1);
                }
    
                // Add to list
                searchedTickers.push(ticker);
    
                // Max 10 — remove oldest
                if (searchedTickers.length > 10) {
                    searchedTickers.shift();
                }
    
                // Re-render table
                renderTracuuTable();
                loadChart(ticker, 'tracuu');
                input.value = '';
                input.focus();
            }
    
            function renderTracuuTable() {
                const tbody = document.getElementById('tracuuBody');
                const empty = document.getElementById('tracuuEmpty');
    
                if (searchedTickers.length === 0) {
                    tbody.innerHTML = '';
                    empty.style.display = 'block';
                    return;
                }
    
                empty.style.display = 'none';
                tbody.innerHTML = '';
    
                searchedTickers.forEach((ticker, i) => {
                    const d = STOCK_DB[ticker];
                    if (!d) return;
    
                    const tr = document.createElement('tr');
                    tr.className = 'animate-in';
                    tr.style.animationDelay = `${i * 0.05}s`;
                    tr.innerHTML = `
                        <td>${i + 1}</td>
                        <td class="ticker-cell">${ticker}</td>
                        <td>${d.san}</td>
                        <td>${d.nganh}</td>
                        <td class="time-cell">${d.time}</td>
                        <td class="desc-cell">${d.desc}</td>
                        <td><span class="status-badge ${d.status}">${d.statusText}</span></td>
                    `;
                    const tickerTd = tr.querySelector('.ticker-cell');
                    if (tickerTd) {
                        tickerTd.classList.add('ticker-clickable');
                        tickerTd.title = `Nhấn để xem biểu đồ ${ticker}`;
                        tickerTd.addEventListener('click', () => loadChart(ticker, 'tracuu'));
                    }
                    tbody.appendChild(tr);
                });
            }
    
            // =====================
            // BỘ LỌC TABLE RENDER
            // =====================
            function renderBolocTable() {
                const tbody = document.getElementById('bolocBody');
                tbody.innerHTML = '';
    
                BOLOC_DATA.forEach((d, i) => {
                    const tr = document.createElement('tr');
                    tr.className = 'animate-in';
                    tr.style.animationDelay = `${i * 0.04}s`;
                    tr.innerHTML = `
                        <td>${i + 1}</td>
                        <td class="ticker-cell">${d.ticker}</td>
                        <td>${d.san}</td>
                        <td>${d.nganh}</td>
                        <td class="time-cell">${d.time}</td>
                        <td class="desc-cell">${d.desc}</td>
                        <td><span class="status-badge ${d.status}">${d.statusText}</span></td>
                        <td><span class="result-badge ${d.result}">${d.resultText}</span></td>
                        <td class="price-cell">${d.giaTc}</td>
                        <td class="price-cell">${d.giaKc}</td>
                        <td class="score-cell">${d.qtrr}</td>
                    `;
                    // Make ticker cell clickable to change chart
                    const tickerTd = tr.querySelector('.ticker-cell');
                    if (tickerTd) {
                        tickerTd.classList.add('ticker-clickable');
                        tickerTd.title = `Nhấn để xem biểu đồ ${d.ticker}`;
                        tickerTd.addEventListener('click', () => loadChart(d.ticker, 'boloc'));
                    }
                    tbody.appendChild(tr);
                });
            }
    
            // =====================
            // TÍN HIỆU CHUYÊN GIA
            // =====================
            const SIGNAL_DATA = [
                {
                    type: 'ENTRY',
                    ticker: 'CTD 78.2',
                    badge: 'DÀI HẠN',
                    badgeClass: 'badge-longterm',
                    expertInitials: 'NH',
                    expertAvatarBg: 'linear-gradient(135deg, #7c3aed, #a855f7)',
                    expertName: 'Nguyễn Đình Hải',
                    expertRole: 'GĐ TVĐT VPS',
                    time: '13:05:54',
                    date: '29-01-2026',
                    details: [
                        { label: 'Kháng cự:', value: '85 - 90', valueClass: 'val-highlight' },
                        { label: 'Điểm QTRR:', value: '76', valueClass: 'val-score' },
                        { label: 'Mô tả Model:', value: 'Kênh xu hướng mở biên tăng trưởng.', valueClass: 'val-highlight', isFullWidth: true }
                    ]
                },
                {
                    type: 'EXIT',
                    ticker: 'CTD 85',
                    badge: 'PARTIAL EXIT <span class="info-icon">i</span>',
                    badgeClass: 'badge-partial',
                    expertInitials: 'TL',
                    expertAvatarBg: 'linear-gradient(135deg, #991B1B, #DC2626)',
                    expertName: 'Trần Khánh Linh',
                    expertRole: 'CG TVĐT VPS',
                    time: '13:05:54',
                    date: '29-01-2026',
                    details: [
                        { label: 'Điểm ENTRY:', value: '78.2', valueClass: 'val-highlight' },
                        { label: 'Kết quả MDL:', value: '18.05%', valueClass: 'val-green' },
                        { label: 'Chi chú MDL:', value: 'Chạm kháng cự 85', valueClass: 'val-highlight', isFullWidth: true }
                    ]
                },
                {
                    type: 'ENTRY',
                    ticker: 'FPT 132',
                    badge: 'TRUNG HẠN',
                    badgeClass: 'badge-longterm',
                    expertInitials: 'PH',
                    expertAvatarBg: 'linear-gradient(135deg, #7c3aed, #a855f7)',
                    expertName: 'Phạm Minh Hoàng',
                    expertRole: 'CG Phân Tích Kỹ Thuật VPS',
                    time: '09:32:10',
                    date: '29-01-2026',
                    details: [
                        { label: 'Kháng cự:', value: '145 - 155', valueClass: 'val-highlight' },
                        { label: 'Điểm QTRR:', value: '82', valueClass: 'val-score' },
                        { label: 'Mô tả Model:', value: 'Phá vỡ vùng tích lũy dài hạn, hướng đến đỉnh mới.', valueClass: 'val-highlight', isFullWidth: true }
                    ]
                },
                {
                    type: 'EXIT',
                    ticker: 'HPG 32.5',
                    badge: 'PARTIAL EXIT <span class="info-icon">i</span>',
                    badgeClass: 'badge-partial',
                    expertInitials: 'LV',
                    expertAvatarBg: 'linear-gradient(135deg, #991B1B, #DC2626)',
                    expertName: 'Lê Văn Tùng',
                    expertRole: 'CG Tư Vấn Đầu Tư VPS',
                    time: '14:30:05',
                    date: '28-01-2026',
                    details: [
                        { label: 'Điểm ENTRY:', value: '28.5', valueClass: 'val-highlight' },
                        { label: 'Kết quả MDL:', value: '+14.04%', valueClass: 'val-green' },
                        { label: 'Chi chú MDL:', value: 'Chốt lời 50% tại vùng kháng cự', valueClass: 'val-highlight', isFullWidth: true }
                    ]
                }
            ];
    
            let signalsRendered = false;
    
            function buildSignalCard(s) {
                const actionClass = s.type === 'ENTRY' ? 'action-entry' : 'action-exit';
    
                let detailsHtml = '';
                for (let i = 0; i < s.details.length; i++) {
                    const d = s.details[i];
                    if (d.isFullWidth) {
                        detailsHtml += `<tr><td colspan="2"><span class="label-dim">${d.label}</span> <span class="${d.valueClass}">${d.value}</span></td></tr>`;
                    } else {
                        detailsHtml += `<tr><td><span class="label-dim">${d.label}</span> <span class="${d.valueClass}">${d.value}</span></td><td></td></tr>`;
                    }
                }
    
                return `
                <div class="signal-msg-box">
                    <div class="msg-sender">
                        <div class="sender-avatar" style="background:${s.expertAvatarBg}">${s.expertInitials}</div>
                        <div class="sender-info">
                            <div class="sender-name">${s.expertName}</div>
                            <div class="sender-role">${s.expertRole}</div>
                        </div>
                        <div class="msg-timestamp">${s.time}<br>${s.date}</div>
                    </div>
                    <table class="signal-table">
                        <tr>
                            <td class="action-cell ${actionClass}" rowspan="${s.details.length + 1}">${s.type}</td>
                            <td><span class="ticker-price">${s.ticker}</span></td>
                            <td style="text-align:right"><span class="strategy-badge ${s.badgeClass}">${s.badge}</span></td>
                        </tr>
                        ${detailsHtml}
                    </table>
                </div>`;
            }
    
            function renderSignals() {
                if (signalsRendered) return;
    
                // Render tất cả tín hiệu vào container duy nhất
                document.getElementById('signalContainer').innerHTML = SIGNAL_DATA.map(buildSignalCard).join('');
    
                // Cập nhật badge số lượng
                const badge = document.getElementById('signalCountBadge');
                if (badge) badge.textContent = `${SIGNAL_DATA.length} tín hiệu`;
    
                // Add VPS Footer
                const panel = document.getElementById('panel-tinhieu');
                const footer = document.createElement('div');
                footer.className = 'vps-team-footer';
                footer.innerHTML = '✨ <span>Thực hiện bởi Đội ngũ Chuyên gia VPS</span>';
                panel.appendChild(footer);
    
                signalsRendered = true;
            }
    
            // =====================
            // FIREANT CHART
            // =====================
            const FIREANT_WIDGET_SCRIPT = 'https://www.fireant.vn/Scripts/web/widgets.js';
            const FIREANT_CHART_TARGETS = {
                tracuu: {
                    hostId: 'fireant_tracuu_chart_host',
                    containerId: 'fireant-tracuu-chart-container'
                },
                boloc: {
                    hostId: 'fireant_chart_host',
                    containerId: 'fireant-chart-container'
                }
            };
            let currentChartTicker = {
                tracuu: null,
                boloc: null
            };
            let fireAntScriptLoading = false;
            let fireAntScriptCallbacks = [];
    
            function getChartTarget(target) {
                if (target && FIREANT_CHART_TARGETS[target]) return target;
    
                const activePanel = document.querySelector('.submenu-panel.active');
                if (activePanel && activePanel.id === 'panel-tracuu') return 'tracuu';
    
                return 'boloc';
            }
    
            function getChartConfig(target) {
                return FIREANT_CHART_TARGETS[getChartTarget(target)];
            }
    
            function loadFireAntScript(callback) {
                if (window.FireAnt && typeof window.FireAnt.QuoteWidget === 'function') {
                    callback();
                    return;
                }
    
                fireAntScriptCallbacks.push(callback);
                if (fireAntScriptLoading) return;
    
                fireAntScriptLoading = true;
                const s = document.createElement('script');
                s.src = FIREANT_WIDGET_SCRIPT;
                s.async = true;
                s.dataset.fireantWidgetScript = 'true';
                s.onload = () => {
                    fireAntScriptLoading = false;
                    const callbacks = fireAntScriptCallbacks.splice(0);
                    callbacks.forEach((fn) => fn());
                };
                s.onerror = () => {
                    fireAntScriptLoading = false;
                    fireAntScriptCallbacks = [];
                    Object.keys(FIREANT_CHART_TARGETS).forEach((target) => {
                        showChartMessage('Không tải được widget FireAnt. Vui lòng thử lại sau.', target);
                    });
                };
                document.head.appendChild(s);
            }
    
            function showChartMessage(message, target) {
                const config = getChartConfig(target);
                const container = document.getElementById(config.hostId);
                if (!container) return;
    
                container.innerHTML = '';
                const messageEl = document.createElement('div');
                messageEl.style.cssText = 'display:flex;align-items:center;justify-content:center;height:100%;color:#94a3b8;font-size:0.9rem;text-align:center;padding:1rem;';
                messageEl.textContent = message;
                container.appendChild(messageEl);
            }
    
            function renderFireAntWidget(ticker, target) {
                const chartTarget = getChartTarget(target);
                const config = getChartConfig(chartTarget);
                const container = document.getElementById(config.hostId);
                if (!container) return;
    
                if (!window.FireAnt || typeof window.FireAnt.QuoteWidget !== 'function') {
                    showChartMessage('Widget FireAnt chưa sẵn sàng. Vui lòng thử lại sau.', chartTarget);
                    return;
                }
    
                container.innerHTML = '';
                const widgetId = `fireant_${chartTarget}_quote_${Date.now()}_${Math.floor(Math.random() * 1000)}`;
                const placeholder = document.createElement('div');
                placeholder.id = widgetId;
                placeholder.style.cssText = 'height:100%;width:100%;';
                container.appendChild(placeholder);
    
                new window.FireAnt.QuoteWidget({
                    container_id: widgetId,
                    symbols: ticker,
                    locale: 'vi',
                    price_line_color: '#c084fc',
                    grid_color: '#334155',
                    label_color: '#94a3b8',
                    bg_color: '#131722',
                    theme: 'dark',
                    width: '100%',
                    height: '500px'
                });
    
                // Quan sát iframe được tạo và apply dark mode
                const observer = new MutationObserver((mutations) => {
                    mutations.forEach((mutation) => {
                        mutation.addedNodes.forEach((node) => {
                            if (node.tagName === 'IFRAME') {
                                node.style.filter = 'invert(1) hue-rotate(180deg)';
                                node.style.background = '#131722';
                            }
                        });
                    });
                });
                observer.observe(container, { childList: true, subtree: true });
    
                // Cũng kiểm tra iframe đã tồn tại
                setTimeout(() => {
                    const iframes = container.querySelectorAll('iframe');
                    iframes.forEach(iframe => {
                        iframe.style.filter = 'invert(1) hue-rotate(180deg)';
                        iframe.style.background = '#131722';
                    });
                }, 1000);
            }
    
            function loadChart(ticker, target) {
                const chartTarget = getChartTarget(target);
                const normalizedTicker = (ticker || 'VN30').trim().toUpperCase();
                currentChartTicker[chartTarget] = normalizedTicker;
    
                // Nếu đang ở mode PTKT, không ghi đè iframe — chỉ lưu ticker
                if (chartMode[chartTarget] === 'ptkt') {
                    return;
                }
    
                // Đã xóa phần ẩn MarketsWidget, cho phép hiển thị cả hai
    
                showChartMessage(`Đang tải biểu đồ ${normalizedTicker}...`, chartTarget);
    
                loadFireAntScript(() => {
                    if (currentChartTicker[chartTarget] === normalizedTicker && chartMode[chartTarget] === 'quote') {
                        renderFireAntWidget(normalizedTicker, chartTarget);
                    }
                });
    
                // Scroll to chart
                const chartSection = document.getElementById(getChartConfig(chartTarget).containerId);
                if (chartSection) {
                    chartSection.scrollIntoView({ behavior: 'smooth', block: 'center' });
                }
            }
    
            // =====================
            // DEFAULT MARKETS WIDGET
            // =====================
            let marketsWidgetRendered = false;
    
            function renderMarketsWidget() {
                if (marketsWidgetRendered) return;
                const container1 = document.getElementById('fireant_tracuu_markets_host');
                const container2 = document.getElementById('fireant_boloc_markets_host');
                if (!container1 && !container2) return;
    
                loadFireAntScript(() => {
                    if (!window.FireAnt || typeof window.FireAnt.MarketsWidget !== 'function') {
                        const errorMsg = '<div style="display:flex;align-items:center;justify-content:center;height:100%;color:#94a3b8;font-size:0.9rem;text-align:center;padding:1rem;">Không tải được widget thị trường. Vui lòng thử lại sau.</div>';
                        if (container1) container1.innerHTML = errorMsg;
                        if (container2) container2.innerHTML = errorMsg;
                        return;
                    }
    
                    [container1, container2].forEach((container, idx) => {
                        if (!container) return;
                        container.innerHTML = '';
                        const widgetId = `fireant_markets_${Date.now()}_${idx}`;
                        const placeholder = document.createElement('div');
                        placeholder.id = widgetId;
                        placeholder.style.cssText = 'height:100%;width:100%;';
                        container.appendChild(placeholder);
    
                        new window.FireAnt.MarketsWidget({
                            container_id: widgetId,
                            locale: 'vi',
                            price_line_color: '#c084fc',
                            grid_color: '#999999',
                            label_color: '#999999',
                            width: '100%',
                            height: '350px'
                        });
                    });
    
                    marketsWidgetRendered = true;
                });
            }
    
            // =====================
            // CHART MODE TOGGLE
            // =====================
            const chartMode = { tracuu: 'quote', boloc: 'quote' }; // 'quote' hoặc 'ptkt'
    
            function toggleChartMode(target) {
                const toggle = document.getElementById(`${target}-chart-toggle`);
                const labelGia = document.getElementById(`${target}-label-gia`);
                const labelPtkt = document.getElementById(`${target}-label-ptkt`);
                const titleEl = document.getElementById(`${target}-chart-title`);
    
                if (chartMode[target] === 'quote') {
                    // Chuyển sang PTKT
                    chartMode[target] = 'ptkt';
                    toggle.classList.add('active');
                    labelGia.classList.remove('active');
                    labelPtkt.classList.add('active');
                    titleEl.textContent = 'Biểu Đồ Phân Tích Kỹ Thuật';
                    renderAdvancedChart(target);
                } else {
                    // Chuyển về Quote
                    chartMode[target] = 'quote';
                    toggle.classList.remove('active');
                    labelGia.classList.add('active');
                    labelPtkt.classList.remove('active');
                    titleEl.textContent = target === 'tracuu' ? 'Biểu Đồ Giá' : 'Biểu Đồ Kỹ Thuật';
                    // Re-render QuoteWidget
                    const ticker = currentChartTicker[target] || 'VN30';
                    loadChart(ticker, target);
                }
            }
    
            function renderAdvancedChart(target) {
                const config = getChartConfig(target);
                const container = document.getElementById(config.hostId);
                if (!container) return;
    
                container.innerHTML = '';
                const iframe = document.createElement('iframe');
                iframe.src = 'https://fireant.vn/charts';
                iframe.style.cssText = 'width:100%; height:100%; border:0; border-radius:8px;';
                iframe.setAttribute('frameborder', '0');
                iframe.setAttribute('allow', 'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share');
                iframe.setAttribute('allowfullscreen', '');
                container.appendChild(iframe);
            }
    
            // Auto-load the relevant chart when a data panel opens
            const originalOpenPanel = openPanel;
            openPanel = function (panelId, clickedLink) {
                originalOpenPanel(panelId, clickedLink);
                if (panelId === 'panel-tracuu') {
                    setTimeout(() => {
                        renderMarketsWidget();
                        if (searchedTickers.length === 0 && !currentChartTicker.tracuu) {
                            loadChart('FPT', 'tracuu');
                        } else if (!currentChartTicker.tracuu && searchedTickers.length > 0) {
                            loadChart(searchedTickers[searchedTickers.length - 1], 'tracuu');
                        }
                    }, 500);
                }
                if (panelId === 'panel-boloc') {
                    setTimeout(() => {
                        renderMarketsWidget();
                        if (!currentChartTicker.boloc) loadChart('FPT', 'boloc');
                    }, 500);
                }
            };
        </script>
</body>

</html>
