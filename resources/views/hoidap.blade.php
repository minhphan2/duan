<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hỏi - Đáp</title>
    <link rel="icon" href="./images/logo_cake_1-removebg-preview.png" type = "image/x-icon"> 
    <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
            crossorigin="anonymous">
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.css" />
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick-theme.css" />
        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <!-- Slick JS -->
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.min.js"></script>
        <link rel="stylesheet" href="{{ asset('css/header.css') }}">
        <link rel="stylesheet" href="{{ asset('css/dichvu.css') }}">
        <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
        <link rel="stylesheet" href="{{ asset('css/root.css') }}">
        <link rel="stylesheet" href="{{ asset('css/hoidap.css') }}">
        <!-- link font logo -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Pattaya&display=swap" rel="stylesheet">

        <!-- slick carousel-->
         <!-- slick carousel-->
         <link rel="stylesheet"
         href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css"
         integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A=="
         crossorigin="anonymous" referrerpolicy="no-referrer" />
     <link rel="stylesheet"
         href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css"
         integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw=="
         crossorigin="anonymous" referrerpolicy="no-referrer" />
</head> 

@extends('layout.app')

@section('title', 'Trang chủ')



@section('content')
        <body>
            <header>      
         </header>         
    <section class="hero">
        <div class="container">
            <div class="hero__content">
                <h3 class="hero__content-title">Hỏi - Đáp</h3>
                <ul class="hero__content-list">
                    <li>
                        Các câu hỏi thường gặp</a>
                    </li>
                </ul>
            </div>
        </div>
        </div>
    </section>
      
<!-- Section 1 -->
<section class="faq-area">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-xl-9 col-lg-8">
                <div class="faq-wrap">
                    <h3>Về giao hàng</h3>
                    <div class="accordion-wrapper" id="accordion-1">

                        <!-- Câu hỏi 1 -->
                        <div class="accordion-wrap">
                            <div class="accordion-header" id="heading-1-1">
                                <button class="collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-1-1" aria-expanded="false" aria-controls="collapse-1-1">
                                    Tôi có thể chọn giờ giao hàng không?
                                </button>
                            </div>
                            <div id="collapse-1-1" class="collapse" aria-labelledby="heading-1-1" data-bs-parent="#accordion-1">
                                <div class="accordion-body">
                                    Bạn có thể chọn một trong các khung giờ sau: từ 11h30-13h, 13h-15h, 15h-17h hoặc 18h-20h.
                                </div>
                            </div>
                        </div>

                        <!-- Câu hỏi 2 -->
                        <div class="accordion-wrap">
                            <div class="accordion-header" id="heading-1-2">
                                <button class="collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-1-2" aria-expanded="false" aria-controls="collapse-1-2">
                                    Tôi có thể chọn giờ giao hàng chính xác không?
                                </button>
                            </div>
                            <div id="collapse-1-2" class="collapse" aria-labelledby="heading-1-2" data-bs-parent="#accordion-1">
                                <div class="accordion-body">
                                    Xin lỗi, hiện tại chúng tôi chỉ hỗ trợ giao trong các khung giờ cố định.
                                </div>
                            </div>
                        </div>

                        <!-- Câu hỏi 3 -->
                        <div class="accordion-wrap">
                            <div class="accordion-header" id="heading-1-3">
                                <button class="collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-1-3" aria-expanded="false" aria-controls="collapse-1-3">
                                    Tôi có thể thay đổi khung thời gian/ địa chỉ giao hàng sau khi đã đặt không?
                                </button>
                            </div>
                            <div id="collapse-1-3" class="collapse" aria-labelledby="heading-1-3" data-bs-parent="#accordion-1">
                                <div class="accordion-body">
                                    Để thay đổi thông tin giao hàng, vui lòng liên hệ với chúng tôi trước ít nhất 24h để chúng tôi có thể sắp xếp lại tuyến đường giao hàng cho bạn.
                                    <br>
                            
                                    Nếu bạn liên hệ quá gấp, chúng tôi sẽ không thể thay đổi điều này.
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section 2 -->
<section class="faq-area">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-xl-9 col-lg-8">
                <div class="faq-wrap" style="background-color: #d4d1cb;">
                    <h3>Về sản phẩm</h3>
                    <div class="accordion-wrapper" id="accordion-2">

                        <!-- Câu hỏi 1 -->
                        <div class="accordion-wrap">
                            <div class="accordion-header" id="heading-2-1">
                                <button class="collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-2-1" aria-expanded="false" aria-controls="collapse-2-1">
                                    Tôi có thể đặt bánh theo mẫu riêng mà tôi muốn được không?
                                </button>
                            </div>
                            <div id="collapse-2-1" class="collapse" aria-labelledby="heading-2-1" data-bs-parent="#accordion-2">
                                <div class="accordion-body">
                                    Rất tiếc, chúng tôi chỉ sản xuất các mẫu có sẵn và không nhận đặt theo mẫu riêng.
                                </div>
                            </div>
                        </div>

                        <!-- Câu hỏi 2 -->
                        <div class="accordion-wrap">
                            <div class="accordion-header" id="heading-2-2">
                                <button class="collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-2-2" aria-expanded="false" aria-controls="collapse-2-2">
                                    Cách bảo quản các loại bánh thế nào? Thời hạn sử dụng là bao lâu?
                                </button>
                            </div>
                            <div id="collapse-2-2" class="collapse" aria-labelledby="heading-2-2" data-bs-parent="#accordion-2">
                                <div class="accordion-body">
                                    Tất cả các loại bánh của chúng tôi hoàn toàn sử dụng nguyên liệu tươi và không sử dụng chất bảo quản, 
                                    vì vậy vui lòng giữ bánh trong hộp kín & bảo quản ngăn mát tủ lạnh ngay khi bạn nhận bánh.
                                    <br> <br>
                                    Bánh được bảo quản đúng cách có thể sử dụng trong vòng 3 ngày.
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section 3 -->
<section class="faq-area">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-xl-9 col-lg-8">
                <div class="faq-wrap">
                    <h3>Về đặt hàng</h3>
                    <div class="accordion-wrapper" id="accordion-3">

                        <!-- Câu hỏi 1 -->
                        <div class="accordion-wrap">
                            <div class="accordion-header" id="heading-3-1">
                                <button class="collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-3-1" aria-expanded="false" aria-controls="collapse-3-1">
                                    Tôi có thể huỷ đơn hàng sau khi đã thanh toán tiền bánh không?
                                </button>
                            </div>
                            <div id="collapse-3-1" class="collapse" aria-labelledby="heading-3-1" data-bs-parent="#accordion-3">
                                <div class="accordion-body">
                                    Nếu bạn muốn huỷ đơn hàng, vui lòng liên hệ trước với chúng tôi ít nhất 24h. 
                                    Tiền bánh sẽ được chúng tôi bảo lưu lại và trừ vào lần đặt hàng tiếp theo của bạn.
                                </div>
                            </div>
                        </div>

                        <!-- Câu hỏi 2 -->
                        <div class="accordion-wrap">
                            <div class="accordion-header" id="heading-3-2">
                                <button class="collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-3-2" aria-expanded="false" aria-controls="collapse-3-2">
                                    Tôi có thể yêu cầu hoàn tiền không?
                                </button>
                            </div>
                            <div id="collapse-3-2" class="collapse" aria-labelledby="heading-3-2" data-bs-parent="#accordion-3">
                                <div class="accordion-body">
                                    Chúng tôi sẽ hoàn tiền trong trường hợp sản phẩm bị lỗi hoặc không đúng cam kết.
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="./js/scripts.js"></script>

    
<footer>
    <div class="footer-container">
      <div class="footer-info">
        <img
          src="./images/logo cake 1.png"
          width="150px"
          height="100px"
          alt="logo"
        />
        <h2>VTQ Bakery</h2>
        <p>Trụ sở 1: 12 Chùa Bộc, Đống Đa, Hà Nội</p>
        <p>Trụ sở 2: 232 Lê Lợi, Quận 1, TP.Hồ Chí Minh</p>
        <p>Email: VTQ@gmail.com</p>
        <p>SDT: 0987654321</p>
      </div>
      <div class="footer-gioithieu">
        <h3>Thông tin</h3>
        <ul>
          <li><a href="">>> &nbsp; Giới thiệu</a></li>
          <li><a href="">>> &nbsp; Tin tức</a></li>
          <li><a href="">>> &nbsp; Đội ngũ</a></li>
          <li><a href="">>> &nbsp; Liên hệ</a></li>
        </ul>
      </div>
      <div class="footer-sanpham">
        <h3>Sản Phẩm</h3>
        <ul>
          <li><a href="">>> &nbsp; Bánh sinh nhật</a></li>
          <li><a href="">>> &nbsp; Bánh nửa Entremet</a></li>
          <li><a href="">>> &nbsp; Phụ kiện bánh</a></li>
        </ul>
      </div>
      <div class="footer-phanphoi">
        <h3 style="padding-left : 30px; padding-bottom: 10px;">Cổng giao dịch</h3>
        <ul class="image-container">
          <li class="footer-item">
            <img
              src="./images/pay01.png"
              alt="eon"
              class="footer-img"
              style="width: 100px; height: 30px"
            />
          </li>
          <li class="footer-item">
            <img
              src="./images/pay02.jpg"
              alt=""
              class="footer-img"
              style="width: 100px; height: 50px"
            />
          </li>
         
          </li>
        </ul>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <div class="footer-bottom">
      <p>
        Bản quyền
        <svg
          xmlns="http://www.w3.org/2000/svg"
          height="14"
          width="14"
          viewBox="0 0 512 512"
        >
          <!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
          <path
            fill="#000000"
            d="M256 48a208 208 0 1 1 0 416 208 208 0 1 1 0-416zm0 464A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM199.4 312.6c-31.2-31.2-31.2-81.9 0-113.1s81.9-31.2 113.1 0c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9c-50-50-131-50-181 0s-50 131 0 181s131 50 181 0c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0c-31.2 31.2-81.9 31.2-113.1 0z"/>
        </svg>
        &nbsp;2024 VTQ Bakery - Lập trình và thiết kế bởi Nhóm 2
      </p>
    </div>
  </footer>
    
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./assets/js/brand.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"
        integrity="sha512-HGOnQO9+SP1V92SrtZfjqxxtLmVzqZpjFFekvzZVWoiASSQgSr4cw9Kqd2+l8Llp4Gm0G8GIFJ4ddwZilcdb8A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="js/header.js"></script>
</body>
@endsection
</html>
