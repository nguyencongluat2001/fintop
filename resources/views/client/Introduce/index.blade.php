@extends('client.layouts.index')
@section('body-client')
<link rel="stylesheet" href="{{ asset('clients/css/introduce.css') }}">
<title>TÀI CHÍNH & ĐẦU TƯ</title>
<style>
    .img-fluid {
        width: 12rem;
        max-width: 60%;
        /* margin-left: 20%; */
        border: 5px solid #740000;
    }

    .name_cg {
        font-weight: 600;
        font-size: 16px;
    }

    .home_index_child .first,
    .home_index_child .three {
        margin-top: 5rem;
    }

    @media (max-width: 450px) {
        .home_index_child .offset-2 {
            margin-left: 0;
        }

        .home_index_child .first,
        .home_index_child .three {
            margin-top: 0;
        }
    }

    .light-300 {
        font-family: sans-serif;
    }
</style>
<section class="container">
    <div class=" pb-3 d-lg-flex gx-5">
        <div class="col-lg-12">
            <form action="" method="GET" id="frmLoadlist_signal">
                <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                <div class="home_index_vnindex pt-1 pb-3" style="background:#b56c6cb5 !important;border-radius:0px !important">
                    <!-- phần giới thiệu FIn top -->
                    <div class="home_index_child" style="background:#ffffff  !important;">
                        <div class="col-lg-12 body-introduce" style="  padding: 40px 100px 0px 100px;">
                            <h1 class="h5">I. GIỚI THIỆU CHUNG</h1>
                            <div class="row d-flex">
                                <div class="col-lg-12 text-start">
                                    <div style="text-align: justify;">
                                        <p class="light-300">
                                            &nbsp;&nbsp;&nbsp;<span class="name_cg">FinTop - Đội ngũ Chuyên gia trẻ</span> 5 đến hơn 10 năm kinh nghiệm đầu tư thực chiến trên thị trường Tài chính - Chứng khoán, cố vấn đầu tư và quản lý tài sản cho hơn 5000+ khách hàng đối tác tại các công ty chứng khoán hàng đầu Việt Nam: VPS, SSI, VND, HSC, MBS,...(Video Youtube giới thiệu: <a rel="nofollow" href="https://youtu.be/V4PdhYmfQ_8 " target="_blank" style="overflow-wrap: anywhere;">https://youtu.be/V4PdhYmfQ_8 </a> )
                                        </p>
                                        <p class="light-300">&nbsp;&nbsp;&nbsp;<span class="name_cg"></span> FinTop - đội ngũ khát vọng, không ngừng học hỏi vươn lên, không ngừng sáng tạo, nghiên cứu, nâng cao năng lực để tạo nên giá trị, mang đến sản phẩm chuyên môn và chia sẻ cơ hội cùng khách hàng đối tác.</p>
                                        <div class="mkkmkmkmmkmkmkmmkk"> <!-- menu  -->
                                            <div id="wrapper" class="wrapper-web" align="center">
                                                <div id="root-left">
                                                    <div class="branch-inverse l1">
                                                        <div class="entry-inverse"><a href="{{ url('client/datafinancial/index') }}"><span class="label-inverse text-start">TRA CỨU XU HƯỚNG CỔ PHIẾU</span></a></div>
                                                        <div class="entry-inverse"><a href="{{ url('client/datafinancial/signalIndex') }}"><span class="label-inverse text-start">TÍN HIỆU MUA FINTOP</span></a></div>
                                                        <div class="entry-inverse"><a href="{{ url('client/datafinancial/recommendationsIndex') }}"><span class="label-inverse text-start">KHUYẾN NGHỊ ĐẦU TƯ V.I.P</span></a></div>
                                                        <div class="entry-inverse"><a href="{{ url('client/about/index') }}"><span class="label-inverse text-start">BÁO CÁO PHÂN TÍCH FINTOP</span></a></div>
                                                        <div class="entry-inverse"><a href="{{ url('') }}"><span class="label-inverse text-start">CỐ VẤN 1 - 1 TỪ CHUYÊN GIA FINTOP</span></a></div>
                                                    </div>
                                                </div>
                                                <div id="main-root"><span class="label">FINTOP.DATA - DỮ LIỆU CHO NHÀ ĐẦU TƯ</span></div>
                                            </div>
                                            <div id="wrapper-mobile" class="wrapper-mobile">
                                                <img src="{{ url('clients/img/gioithieu.png') }}" alt="">
                                            </div>
                                        </div>
                                        <br>
                                        <p class="light-300">&nbsp;&nbsp;&nbsp;Với sự hỗ trợ tư vấn tận tâm 1-1, Đội ngũ FinTop sẽ đồng hành với nhà đầu tư từng bước đi trên con đường chinh phục sự thịnh vượng về tài chính. Chúng tôi tin rằng với sự nỗ lực không ngừng nghỉ, đam mê, nhiệt huyệt, đặc biệt sự đồng hành, tin tưởng và ủng hộ của Quý KH đối tác sẽ giúp Đội ngũ tiếp tục phát triển mạnh mẽ, tạo ra nhiều giá trị hơn nữa cho cộng đồng.</p>
                                    </div>
                                    <center>
                                        <iframe class="video-fintop" allowfullscreen width="916" height="403" src="https://www.youtube.com/embed/V4PdhYmfQ_8" title="ĐỘI NGŨ FINTOP - CỐ VẤN ĐẦU TƯ  &amp; QUẢN LÝ TÀI SẢN" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                    </center>
                                    <br>
                                    <p class="text-center"><i>“FinTop - Kiến tạo giá trị đầu tư bền vững.”</i>
                                    </p>
                                    <br>
                                    <center>
                                        <div class="col-lg-6">
                                            <h1 class="h5 text-center " style="background: #740000;height: 70px;color: #fff079;border-radius: 15px;    padding-top: 20px;">ĐỘI NGŨ CHUYÊN GIA FINTOP</h1>
                                        </div>
                                        <br>
                                    </center>
                                    <div class="pt-2 py-5 pb-3 d-lg-flex align-items-center gx-5" style="padding:4%;padding-left:5%">
                                        <div class="col-lg-12 row align-items-center" style="color:#c3000a;border-radius:15px">
                                            <div class="team-member col-md-4 first text-center">
                                                <img class="img-fluid rounded-circle" src="../clients/img/tran_khanh_linh.jpg" style="width:58%" alt="Card image">
                                                <ul class="team-member-caption list-unstyled text-center pt-4 light-300">
                                                    <li class="name_cg"> (Anh) Trần Khánh Linh</li>
                                                    <li style="font-size: 14px;font-weight:500">Co-Founder FinTop, Dữ liệu FinTop.Data</li>
                                                    <li style="font-size: 14px;font-weight:500">Chuyên gia NC&PT Thị trường chứng khoán.</li>
                                                    <li style="width:90%;height:2.2px;background:#c3000a;margin-left:5%"></li>
                                                </ul>
                                            </div>
                                            <div style="padding-bottom: 10%;" class="team-member col-md-4 text-center">
                                                <img class="img-fluid rounded-circle" src="../clients/img/nguyen_dinh_hai.jpg" style="width:58%" alt="Card image">
                                                <ul class="team-member-caption list-unstyled text-center pt-4 light-300">
                                                    <li class="name_cg">(Anh) Nguyễn Đình Hải</li>
                                                    <li style="font-size: 14px;font-weight:500">Founder & CEO FinTop Ltd.</li>
                                                    <li style="font-size: 14px;font-weight:500">Chuyên gia Phân tích Chiến lược & QTRR.</li>
                                                    <li style="width:90%;height:2.2px;background:#c3000a;margin-left:5%"></li>
                                                </ul>
                                            </div>
                                            <div class="team-member col-md-4 three text-center">
                                                <img class="img-fluid rounded-circle" src="../clients/img/nguyen_minh_hanh.jpg" style="width:58%" alt="Card image">
                                                <ul class="team-member-caption list-unstyled text-center pt-4 light-300">
                                                    <li class="name_cg">(Chị) Nguyễn Minh Hạnh</li>
                                                    <li style="font-size: 14px;font-weight:500">Chuyên gia Phân tích Ngành - Vĩ mô FinTop</li>
                                                    <li style="font-size: 14px;font-weight:500">Thạc sĩ Kinh tế chiến lược (FSU JENA, Đức).</li>
                                                    <li style="width:90%;height:2.2px;background:#c3000a;margin-left:5%"></li>
                                                </ul>
                                            </div>
                                            <div class="col-md-8 offset-2 row px-0">
                                                <div class="team-member col-md-6 text-center">
                                                    <img class="img-fluid rounded-circle" src="../clients/img/tran_thien_tu.jpg" style="width:58%" alt="Card image">
                                                    <ul class="team-member-caption list-unstyled text-center pt-4 light-300">
                                                        <li class="name_cg">(Anh) Trần Thiện Tú</li>
                                                        <li style="font-size: 14px;font-weight:500">Chuyên gia NC&PT Cổ phiếu DN</li>
                                                        <li style="font-size: 14px;font-weight:500">Nghiên cứu chuyển động Ngành</li>
                                                        <li style="font-size: 14px;font-weight:500">Phân tích triển vọng tăng trưởng Doanh nghiệp</li>
                                                        <li style="width:90%;height:2.2px;background:#c3000a;margin-left:5%"></li>
                                                    </ul>
                                                </div>
                                                <div class="team-member col-md-6 text-center">
                                                    <img class="img-fluid rounded-circle" src="../clients/img/mai_tien_dung.jpg" style="width:58%" alt="Card image">
                                                    <ul class="team-member-caption list-unstyled text-center pt-4 light-300">
                                                        <li class="name_cg">(Anh) Mai Tiến Dũng</li>
                                                        <li style="font-size: 14px;font-weight:500">Chuyên gia NC&PT Cổ phiếu DN</li>
                                                        <li style="font-size: 14px;font-weight:500">Thạc sĩ Tài chính số - FinTech</li>
                                                        <li style="font-size: 14px;font-weight:500">(Loughborough University, London, Anh).</li>
                                                        <li style="width:90%;height:2.2px;background:#c3000a;margin-left:5%"></li>
                                                    </ul>
                                                </div>

                                            </div>
                                            <br>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="home_index_child" style="background:#ffffff  !important;">
                        <div class="col-lg-12 introduce-II">
                            <div class="col-lg-6 text-start">
                                <h1 class="h5 text-uppercase">II. CÔNG TY TNHH ĐẦU TƯ VÀ PHÁT TRIỂN FINTOP</h1>
                            </div>
                            <div class="container my-4">
                                <div class="row text-center" style="color:#ffffff">
                                    <div class="objective col-lg-4">
                                        <div style="background:#001f39;padding:15px;width:100%;height:100%;border-radius:5px">
                                            <div class="objective-icon m-auto py-4 mb-2 mb-sm-4 bg-secondary shadow-lg" style="background:#700e13 !important">
                                                <i class="fab fa-wpexplorer text-light fa-3x"></i>
                                            </div>
                                            <h2 class="objective-heading h3 mb-2 mb-sm-4 light-300" style="color:#fff079;font-weight: 500;">TẦM NHÌN</h2>
                                            <p class="light-300">
                                                &nbsp;&nbsp;&nbsp; FinTop trở thành Trung tâm <br> Nghiên cứu - Phân Tích - Phát triển Dữ liệu đầu tư. Đội ngũ FinTop sẽ trở thành đối tác tin cậy, cố vấn đầu tư cho các Nhà Đầu Tư cá nhân và tổ chức.
                                            </p>
                                        </div>
                                    </div>

                                    <div class="objective col-lg-4 mt-sm-0 mt-4">
                                        <div style="background:#001f39;padding:15px;width:100%;height:100%;border-radius:5px">
                                            <div class="objective-icon m-auto py-4 mb-2 mb-sm-4 bg-secondary shadow-lg" style="background:#700e13 !important">
                                                <!-- <i class='display-4 bx bx-revision text-light'></i> -->
                                                <i class="fas fa-hand-holding-usd text-light fa-3x"></i>
                                            </div>
                                            <h2 class="objective-heading h3 mb-2 mb-sm-4 light-300" style="color:#fff079;font-weight: 500;">SỨ MỆNH</h2>
                                            <p class="light-300">
                                                &nbsp;&nbsp;&nbsp;Mang đến nguồn thông tin, dữ liệu đầu tư hữu ích, tinh gọn, hiệu quả, cùng Nhà Đầu Tư xây dựng lộ trình, chiến lược đầu tư hướng đến mục tiêu tự do và thịnh vượng về tài chính.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="objective col-lg-4 mt-sm-0 mt-4">
                                        <div style="background:#001f39;padding:15px;width:100%;height:100%;border-radius:5px">
                                            <div class="objective-icon m-auto py-4 mb-2 mb-sm-4 bg-secondary shadow-lg" style="background:#700e13 !important">
                                                <i class="fas fa-database text-light fa-3x"></i>
                                            </div>
                                            <h2 class="objective-heading h3 mb-2 mb-sm-4 light-300" style="color:#fff079;font-weight: 500;">GIÁ TRỊ CỐT LỖI</h2>
                                            <p class="light-300">
                                                Tận Tâm - Chuyên nghiệp <br> Chủ động - Sáng tạo <br> Tinh gọn - hiệu quả.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="pt-5 objective-footer">
                                        <p style="background:#001f39;color:white;padding:5%;border-radius:5px" class="light-300 pt-5">
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sau nhiều năm nghiên cứu và phát triển, 18 tháng 01 năm 2022, FinTop chính thức được thành lập.
                                            Đội ngũ Chuyên gia FinTop đã không
                                            ngừng nỗ lực trong việc nghiên cứu thị trường, phân tích dữ liệu Tài chính - Kinh tế và thấu
                                            hiểu Nhà Đầu Tư để mang lại những thông tin hữu ích, tinh gọn, chiến lược đầu tư hiệu quả, phù hợp nhất.
                                            Minh chứng cho thấy tỷ lệ chính xác cao thông qua "Tra cứu xu hướng cổ phiếu", danh mục "Tín Hiệu Mua"
                                            và "Khuyến Nghị V.I.P" mang lại hiệu quả trong đầu tư. Thành công của Nhà Đầu Tư, sự tin cậy của đối tác
                                            đã mang lại cảm hứng và nguồn động lực lớn cho Đội ngũ FinTop chúng tôi tiếp tục nỗ lực, phát triển hơn nữa
                                            để mang đến những sản phẩm tốt nhất.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="home_index_child" style="background:#ffffff  !important">
                        <div class="col-lg-12 introduce-III">
                            <div class="col-lg-6 text-start">
                                <h1 class="h5 pb-3 text-uppercase">III. Khách hàng nói gì về fintop</h1>
                            </div>
                            <div class="py-2 row">
                                <div class="col-md-4" style="padding-right:0px">
                                    <div class="customer_reviews px-3">
                                        <div class="icon"><i class="fas fa-quote-right"></i></div>
                                        <div style="color:#ffffff; text-align: justify;height: 510px;" class="pt-4 pb-3 text-content">"FinTop là đơn vị uy tín chuyên cung cấp dữ liệu, kiến thức thực tế, chiến lược đầu tư và các báo cáo phân tích kịp thời, vô cùng hữu dụng cho nhà đầu tư và cả các chuyên gia về chứng khoán. Với chiến lược và cách làm chuyên nghiệp, đặc biệt Đội ngũ FinTop với nhiều năm kinh nghiệm trên thị trường sẽ giúp nhà đầu tư tối ưu hiệu quả và đạt được lợi nhuận tốt nhất trong quá trình giao dịch. Với sự hỗ trợ từ FinTop nhà đầu tư sẽ thông thái, chủ động với việc đầu tư và kỷ luật với chiến lược giao dịch đã đề ra."</div>
                                        <hr>
                                        <div class="d-flex align-items-center mb-3" style="height: 80px;">
                                            <img class="img-fluid rounded-circle" src="../clients/img/le_van_long.jpg" alt="Card image">
                                            <!-- <img src="https://www.nicepng.com/png/detail/128-1280406_view-user-icon-png-user-circle-icon-png.png" alt=""> -->
                                            <span style="color:#fff" class="ms-3 d-flex align-items-center" style="min-height: 80px;">
                                                <ul>
                                                    <li style="color:#ffe673"><b>(Anh) Lê Văn Long</b></li>
                                                    <li>Giám đốc Tư vấn đầu tư</li>
                                                    <li>Công ty Cổ phần Chứng khoán VPS.</li>
                                                </ul>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4" style="padding-right:0px">
                                    <div class="customer_reviews px-3">
                                        <div class="icon"><i class="fas fa-quote-right"></i></div>
                                        <div style="color:#ffffff; text-align: justify;height: 510px;" class="pt-4 pb-3 text-content">"FinTop là một đội ngũ chuyên nghiệp, không ngừng nghiên cứu, học hỏi, cầu thị và luôn luôn lắng nghe khách hàng, đối tác. Những báo cáo phân tích, đánh giá của Team mang lại nhiều hữu ích cho mình là một người công tác trong lĩnh vực Tài chính với các báo cáo phân tích ngành, dữ liệu kinh tế vĩ mô, phân tích đánh giá doanh nghiệp. Đặc biệt có phần tra cứu xu hướng cổ phiếu rất hay bên cạnh chia sẻ cẩm nang, phương pháp đầu tư để mọi ngươi cùng tìm hiểu. Chúc FinTop Team sẽ tiếp tục phát huy và luôn có những báo cáo phân tích chất lượng nhất đến khách hàng."</div>
                                        <hr>
                                        <div class="d-flex align-items-center mb-3" style="height: 80px;">
                                            <img class="img-fluid rounded-circle" src="../clients/img/tran_thi_hong_lich.jpg" alt="Card image">
                                            <!-- <img src="https://www.nicepng.com/png/detail/128-1280406_view-user-icon-png-user-circle-icon-png.png" alt=""> -->
                                            <span style="color:#fff" class="ms-3 d-flex align-items-center" style="min-height: 80px;">
                                                <ul>
                                                    <li style="color:#ffe673"><b>(Chị) Trần Thị Hồng Lịch</b></li>
                                                    <li>Nhà Đầu Tư</li>
                                                    <li>Khách Hàng Đối Tác FinTop.</li>
                                                    <br>
                                                </ul>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4" style="padding-right:0px">
                                    <div class="customer_reviews px-3">
                                        <div class="icon"><i class="fas fa-quote-right"></i></div>
                                        <div style="color:#ffffff; text-align: justify;height: 510px;" class="pt-4 pb-3 text-content">“FINTOP là nơi tập hợp tinh hoa của đội ngũ chuyên gia trẻ, năng động, có kinh nghiệm thực chiến trên thị trường chứng khoán, vừa có kiến thức chuyên sâu về phân tích cơ bản và vừa có độ nhạy bén trong phân tích kỹ thuật.
                                            Đây là một trang web uy tín, đáng tin cậy, giúp cung cấp các phân tích và cập nhật thị trường, chọn lọc cổ phiếu. Ngoài ra, đội ngũ chuyên gia của FINTOP cũng thường xuyên cung cấp các phân tích chiến lược đầu tư hay có các báo cáo phân tích ngành và phân tích doanh nghiệp, giúp cho nhà đầu tư có căn cứ để đưa ra các quyết định đầu tư sáng suốt.
                                            Nếu nhà đầu tư chưa có nhiều kiến thức, kinh nghiệm, hoặc không có nhiều thời gian để tìm hiểu và nghiên cứu về chứng khoán thì FINTOP chính là người đồng hành tuyệt vời của nhà đầu tư.”</div>
                                        <hr>
                                        <div class="d-flex align-items-center mb-3" style="height: 80px;">
                                            <img class="img-fluid rounded-circle" src="../clients/img/hanh_dang.jpg" alt="Card image">
                                            <!-- <img src="https://www.nicepng.com/png/detail/128-1280406_view-user-icon-png-user-circle-icon-png.png" alt=""> -->
                                            <span style="color:#fff" class="ms-3 d-flex align-items-center" style="min-height: 80px;">
                                                <ul>
                                                    <li style="color:#ffe673"><b>(Chị) Helena Hạnh Đặng</b></li>
                                                    <li>Khách Hàng Đối Tác</li>
                                                    <li>Chuyên gia Đào tạo Tài chính cá nhân.</li>
                                                </ul>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="col-md-4">
                                    <div class="customer_reviews px-3">
                                        <div class="icon"><i class="fas fa-quote-right"></i></div>
                                        <div style="text-align: justify;color:#ffffff" class="pt-4 pb-3 text-content">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</div>
                                        <hr>
                                        <div class="d-flex align-items-center mb-3">
                                            <img src="https://www.nicepng.com/png/detail/128-1280406_view-user-icon-png-user-circle-icon-png.png" alt="">
                                            <span style="color:#fff" class="ms-3 d-flex align-items-center" style="min-height: 80px;">
                                                <ul>
                                                    <li style="color:#ffe673"><b>(Ông) Lê Văn Long</b></li>
                                                    <li>Chuyên gia phân tích - Giám đốc tư vấn đầu tư</li>
                                                    <li>Công ty cổ phần chứng khoán VPS</li>
                                                </ul>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="customer_reviews px-3">
                                        <div class="icon"><i class="fas fa-quote-right"></i></div>
                                        <div style="text-align: justify;color:#ffffff" class="pt-4 pb-3 text-content">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</div>
                                        <hr>
                                        <div class="d-flex align-items-center mb-3">
                                            <img src="https://www.nicepng.com/png/detail/128-1280406_view-user-icon-png-user-circle-icon-png.png" alt="">
                                            <span style="color:#fff" class="ms-3 d-flex align-items-center" style="min-height: 80px;">
                                                <ul>
                                                    <li style="color:#ffe673"><b>(Ông) Lê Văn Long</b></li>
                                                    <li>Chuyên gia phân tích - Giám đốc tư vấn đầu tư</li>
                                                    <li>Công ty cổ phần chứng khoán VPS</li>
                                                </ul>
                                            </span>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<script src="../clients/js/jquery.min.js"></script>

<script>
    NclLib.menuActive('.link-introduce');
    NclLib.loadding();
    jQuery(document).ready(function() {
        const axes = [...document.querySelectorAll('.axis')];
        axes.forEach((axis, i) => {
            const angle = 360 * i / axes.length;
            axis.style.setProperty('--axis-rotation', `${angle}deg`);
            axis.querySelector('div').addEventListener('click', rotateToTop);
        })
        let rotation = -90; // change it to adjust the initial position of buttons
        updateMenuRotation(rotation);

        function updateMenuRotation(deg) {
            document.querySelector('.menu').style
                .setProperty('--menu-rotation', `${deg}deg`);
        }

        function rotateToTop(e) {
            const button = e.target;
            if (button) {
                [...document.querySelectorAll('.axis > div.active')]
                .forEach(el => el.classList.remove('active'));
                button.classList.add('active');
                rotateMenu(
                    minStepsToTop(
                        getRotation('axis', button),
                        getRotation('menu', button),
                        axes.length
                    )
                );
            }
        }

        function minStepsToTop(aR, mR, aL) {
            // aR => axisRotatin
            // mR => menuRotation
            // aL => axis.length
            // angle => 360 / aL
            // stepsFromMenu => (((mR + 360) % 360) + 90) / angle;
            // stepsFromAxis => Math.round(aR / angle);
            // totalSteps => Math.round((((mR + 360) % 360) + 90) + aR) / angle);
            const totalSteps = Math.round(((((mR + 360) % 360) + 90) + aR) * aL / 360);
            // console.log(totalSteps);
            // totalSteps as closest number to 0 (positive or negative)
            const maxAbsoluteSteps = Math.floor(aL / 2); // 5 => 2; 6 => 3; 7 => 3, etc...
            return -(((totalSteps + maxAbsoluteSteps + aL) % aL) - maxAbsoluteSteps);
        }

        function getRotation(type, target) {
            return +(getComputedStyle(target).getPropertyValue(`--${type}-rotation`).replace('deg', ''));
        }

        function rotateMenu(steps) {
            rotation += 360 * steps / axes.length;
            updateMenuRotation(rotation);
        }
    })
</script>
@endsection