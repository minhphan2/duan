<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tin tức</title>
    <link rel="icon" href="./images/logo_cake_1-removebg-preview.png" type = "image/x-icon"> <!--FAVICON-->
    <!-- --------------------------------- CSS --------------------------------- -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pattaya&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/root.css') }}">
    <link rel="stylesheet" href="{{ asset('css/doingu.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tintuc.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bookmark&brand.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
  
    <!-- -------------------------------- ICON --------------------------------- -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- -------------------------------- ICON --------------------------------- -->
</head>
@extends('layout.app')

@section('title', 'Sản phẩm')


@section('content')
<body>
    <!-- ------------------------------- HEADER -------------------------------- -->
    <header>
        </header>
           <!-- Tìm kiếm -->
           <script>
            document.getElementById('search-button').addEventListener('click', function() {
            var query = document.getElementById('search-input').value.toLowerCase().normalize('NFD').replace(/[\u0300-\u036f]/g, ''); 
            // normalize và loại bỏ dấu
            
            if (query.includes('banh')) {
                window.location.href = 'sanpham.html';
            } else if (query.includes('lien')) {
                window.location.href = 'lienhe.html';
            } else if (query.includes('nhap')) {
                window.location.href = 'dangnhap.html';    
            } else {
                alert('Không có sản phẩm');
            }
        });
    </script>
     <!-- ------------------------------- HEADER -------------------------------- -->
    <div id="tintuc">
        <!-- ------------------------------- SECTION ------------------------------- -->
        <div class="bookmark">
            <div class="content-bookmark">
                <div>
                    <h1 style="text-align: center;">Tin tức</h1>
                    <h3>Cập nhật</h3>
                </div>
            </div>
        </div>
        <!-- ------------------------------- SECTION ------------------------------- -->
        <!-- -------------------------------- MAIN --------------------------------- -->
        <div id="team">
            <!-- -------------------------------- BLOG --------------------------------- -->
            <div class="blog">
                <div class="blog-item">
                    <div class="img-blog">
                        <img src="images/VTQmedia.jpg" alt="">
                    </div>
                    <div class="content-blog">
                        <h3>VTQ How: Hướng nội đặt bánh</h3>
                        <span>Bí kíp mua sắm dành cho người sống khép kín. Người hướng nội ơi, hãy thoải mái mua sắm tại website của chúng tôi mà không cần lo ngại! Mọi sản phẩm  ...</span>
                        <a href="./chitiettintuc-1.html">Xem thêm <i class="fa-solid fa-angle-right"></i></a>
                    </div>
                </div>
                <div class="blog-item">
                    <div class="img-blog">
                        <img src="images/VTQmedia02.jpg" alt="">
                    </div>
                    <!--tin 2-->
                    <div class="content-blog">
                        <h3>VTQ How: Làm Em vui</h3>
                        <span>Không cần đến những cử chỉ cầu kỳ, một lời khen đúng lúc, một hành động nhỏ nhưng tinh tế như pha ly cà phê sáng hay đặt tặng nàng một chiếc bánh bất ngờ...</span>
                        <a href="./chitiettintuc-2.html">Xem thêm <i class="fa-solid fa-angle-right"></i></a>
                    </div>
                </div>
                <div class="blog-item">
                    <div class="img-blog">
                        <img src="images/VTQmedia03.jpg" alt="">
                    </div>

                    <div class="content-blog">
                        <h3>VTQ How: Tiệc bất ngờ</h3>
                        <span>Một không gian ấm cúng, những gương mặt thân quen, và vài khoảnh khắc yêu thương bất ngờ cũng đủ khiến trái tim người nhận tràn ngập niềm hạnh phúc...</span>
                        <a href="./chitiettintuc-3.html">Xem thêm <i class="fa-solid fa-angle-right"></i></a>
                    </div>
                </div>
                <div class="blog-item">
                    <div class="img-blog">
                        <img src="images/anhtin4.avif" alt="">
                    </div>
                    <div class="content-blog">
                        <h3>VTQ How: Làm tôi vui</h3>
                        <span>Đừng ngần ngại bảy tỏ tình cảm của mình dành cho Mẹ theo cách riêng của bạn. Chúng ta không nhất định phải nói "Con Yêu Mẹ" nhưng những </span>
                        <a href="#">Xem thêm <i class="fa-solid fa-angle-right"></i></a>
                    </div>
                </div>

                <div class="blog-item">
                    <div class="img-blog">
                        <img src="images/anhtin5.avif" alt="">
                    </div>
                    <div class="content-blog">
                        <h3>VTQ How: Làm mẹ vui</h3>
                        <span>Trong cuộc sống bận rộn và đầy áp lực, việc làm thế nào để tự mình tìm thấy niềm vui và hạnh phúc trở thành một kỹ năng quan trọng.</span>
                        <a href="#">Xem thêm <i class="fa-solid fa-angle-right"></i></a>
                    </div>
                </div>
                <div class="blog-item">
                    <div class="img-blog">
                        <img src="images/anhtin6.avif" alt="">
                    </div>
                    <div class="content-blog">
                        <h3>VTQ How:Làm anh vui </h3>
                        <span>Tôn trọng đời sống tinh thần và cảm xúc của mọi giới, việc hỏi "anh có ổn không" chính là cách thể hiện sự quan tâm chân thành dành cho các anh.</span>
                        <a href="#">Xem thêm <i class="fa-solid fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- -------------------------------- BLOG --------------------------------- -->
            <!-- -------------------------------- BRAND -------------------------------- -->
         
            <!-- -------------------------------- BRAND -------------------------------- -->
        </div>
        <!-- -------------------------------- MAIN --------------------------------- -->
        <!-- ------------------------------- SCRIPT -------------------------------- -->
        <script src="././js/brand.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/gsap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/ScrollTrigger.min.js"></script>
        <script src="js/header.js"></script>
        <!-- ------------------------------- SCRIPT -------------------------------- -->
    </div>
     <!-- ------------------------------- FOOTER -------------------------------- -->
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
     <!-- ------------------------------- FOOTER -------------------------------- -->
</body>
@endsection
</html>