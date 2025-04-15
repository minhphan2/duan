<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./images/logo_cake_1-removebg-preview.png" type = "image/x-icon"> <!--FAVICON-->
    <title>Đội ngũ</title>
    <!-- --------------------------------- CSS --------------------------------- -->
    <link rel="stylesheet" href="{{ asset('css/root.css') }}">
    <link rel="stylesheet" href="{{ asset('css/doingu.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tintuc.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bookmark&brand.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- --------------------------------- CSS --------------------------------- -->
    <!-- -------------------------------- ICON --------------------------------- -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- -------------------------------- ICON --------------------------------- -->
    <!-- link font logo -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pattaya&display=swap" rel="stylesheet">
</head>

@extends('layout.app')




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
    <div id="team">
        <!-- ------------------------------- SECTION ------------------------------- -->
        <div class="bookmark">
            <div class="content-bookmark">
                <div>
                    <h1>Đội ngũ</h1>
                    <h3>Trang chủ || Đội ngũ</h3>
                </div>
            </div>
        </div>
        <!-- ------------------------------- SECTION ------------------------------- -->
        <!-- -------------------------------- MAIN --------------------------------- -->
        <div id="team">
            <!-- -------------------------------- TEAM --------------------------------- -->
            <div class="team">
                <div class="member" data-aos="fade-up">
                    <div class="img-member">
                        <img src="images/nhan su 1.jpg" alt="">
                        <div class="app-contact">
                            <a href=""><i class="fa-brands fa-facebook"></i></a>
                            <a href=""><i class="fa-brands fa-twitter"></i></a>
                            <a href=""><i class="fa-brands fa-pinterest"></i></a>
                            <a href=""><i class="fa-brands fa-instagram"></i></a>
                        </div>
                    </div>
                    <h2>Gordon Ramsay</h2>
                    <span>Bếp trưởng</span>
                </div>
                <div class="member" data-aos="fade-up">
                    <div class="img-member">
                        <img src="images/nhan su 2.png" alt="">
                        <div class="app-contact">
                            <a href=""><i class="fa-brands fa-facebook"></i></a>
                            <a href=""><i class="fa-brands fa-twitter"></i></a>
                            <a href=""><i class="fa-brands fa-pinterest"></i></a>
                            <a href=""><i class="fa-brands fa-instagram"></i></a>
                        </div>
                    </div>
                    <h2>Phạm Tuấn Hải</h2>
                    <span>Bếp phó</span>
                </div>
                <div class="member" data-aos="fade-up">
                    <div class="img-member">
                        <img src="images/nhan su 3.jpg" alt="">
                        <div class="app-contact">
                            <a href=""><i class="fa-brands fa-facebook"></i></a>
                            <a href=""><i class="fa-brands fa-twitter"></i></a>
                            <a href=""><i class="fa-brands fa-pinterest"></i></a>
                            <a href=""><i class="fa-brands fa-instagram"></i></a>
                        </div>
                    </div>
                    <h2>Đỗ Nam Trung</h2>
                    <span>Quản lý kinh doanh</span>
                </div>
                <div class="member" data-aos="fade-up">
                    <div class="img-member">
                        <img src="images/nhan su 4.jpg" alt="">
                        <div class="app-contact">
                            <a href=""><i class="fa-brands fa-facebook"></i></a>
                            <a href=""><i class="fa-brands fa-twitter"></i></a>
                            <a href=""><i class="fa-brands fa-pinterest"></i></a>
                            <a href=""><i class="fa-brands fa-instagram"></i></a>
                        </div>
                    </div>
                    <h2>Lưu Hoàng Sang</h2>
                    <span>Marketing</span>
                </div>
                <div class="member" data-aos="fade-up">
                    <div class="img-member">
                        <img src="images/nhan su 5.jpg" alt="">
                        <div class="app-contact">
                            <a href=""><i class="fa-brands fa-facebook"></i></a>
                            <a href=""><i class="fa-brands fa-twitter"></i></a>
                            <a href=""><i class="fa-brands fa-pinterest"></i></a>
                            <a href=""><i class="fa-brands fa-instagram"></i></a>
                        </div>
                    </div>
                    <h2>Phan Tuấn Minh</h2>
                    <span>Nhân viên làm bánh</span>
                </div>
                <div class="member" data-aos="fade-up">
                    <div class="img-member">
                        <img src="images/nhan su 6.jpg" alt="">
                        <div class="app-contact">
                            <a href=""><i class="fa-brands fa-facebook"></i></a>
                            <a href=""><i class="fa-brands fa-twitter"></i></a>
                            <a href=""><i class="fa-brands fa-pinterest"></i></a>
                            <a href=""><i class="fa-brands fa-instagram"></i></a>
                        </div>
                    </div>
                    <h2>Lương Đức Thành</h2>
                    <span>Nhân viên làm bánh</span>
                </div>
                <div class="member" data-aos="fade-up">
                    <div class="img-member">
                        <img src="images/nhan su 7.jpg" alt="">
                        <div class="app-contact">
                            <a href=""><i class="fa-brands fa-facebook"></i></a>
                            <a href=""><i class="fa-brands fa-twitter"></i></a>
                            <a href=""><i class="fa-brands fa-pinterest"></i></a>
                            <a href=""><i class="fa-brands fa-instagram"></i></a>
                        </div>
                    </div>
                    <h2>Bùi Việt Quốc</h2>
                    <span>Nhân viên làm bánh</span>
                </div>
                <div class="member" data-aos="fade-up">
                    <div class="img-member">
                        <img src="images/nhan su 8.jpg" alt="">
                        <div class="app-contact">
                            <a href=""><i class="fa-brands fa-facebook"></i></a>
                            <a href=""><i class="fa-brands fa-twitter"></i></a>
                            <a href=""><i class="fa-brands fa-pinterest"></i></a>
                            <a href=""><i class="fa-brands fa-instagram"></i></a>
                        </div>
                    </div>
                    <h2>Vũ Hoàng Việt</h2>
                    <span>Nhân viên làm bánh</span>
                </div>
            </div>
            <!-- -------------------------------- TEAM --------------------------------- -->
            <!-- ----------------------------- TUYỂN DỤNG ------------------------------ -->
            <div class="form">
                <h1>Tuyển dụng</h1>
                <br>
                <div class="contact-form" id="contact-form">
                    <div>
                        <span class="contact-form-item">
                            <input class="name" id="input-name" type="text" placeholder="Họ và tên">
                        </span>
                        <span class="contact-form-item">
                            <input type="text" id="input-email" placeholder="Email">
                        </span>
                        <span class="contact-form-item">
                            <input type="text" id="input-phone" placeholder="Số điện thoại">
                        </span>
                        <span class="contact-form-item">
                            <input type="text" id="input-address" placeholder="Địa chỉ">
                        </span>
                    </div>
                    <span class="contact-form-item" data-after="">
                        <textarea name="" id="input-message" placeholder="Nội dung"></textarea>
                    </span>
                    <button id="btn-submit">Gửi ngay</button>
                </div>
            </div>
            <!-- ----------------------------- TUYỂN DỤNG ------------------------------ -->
            <!-- -------------------------------- BRAND -------------------------------- -->
            <div class="brand" id="brandContainer">
                <div class="brand-item">
                    <img src="images/logo_cake_1-removebg-preview.png" alt="">
                </div>
                <div class="brand-item">
                    <img src="images/logo_cake_1-removebg-preview.png" alt="">
                </div>
                <div class="brand-item">
                    <img src="images/logo_cake_1-removebg-preview.png" alt="">
                </div>
                <div class="brand-item">
                    <img src="images/logo_cake_1-removebg-preview.png" alt="">
                </div>
                <div class="brand-item">
                    <img src="images/logo_cake_1-removebg-preview.png" alt="">
                </div>
                <div class="brand-item">
                    <img src="images/logo_cake_1-removebg-preview.png" alt="">
                </div>
                <div class="brand-item">
                    <img src="images/logo_cake_1-removebg-preview.png" alt="">
                </div>
                <div class="brand-item">
                    <img src="images/logo_cake_1-removebg-preview.png" alt="">
                </div>
                <div class="brand-item">
                    <img src="images/logo_cake_1-removebg-preview.png" alt="">
                </div>
                <div class="brand-item">
                    <img src="images/logo_cake_1-removebg-preview.png" alt="">
                </div>
            </div>
            <!-- -------------------------------- BRAND -------------------------------- -->
        </div>
        <!-- -------------------------------- MAIN --------------------------------- -->
        <!-- ------------------------------- SCRIPT -------------------------------- -->
        <script src="js/brand.js"></script>
        <script src="js/team.js"></script>
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
    <div id="overlay"></div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.1/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.1/ScrollTrigger.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/smooth-scroll/16.1.3/smooth-scroll.polyfills.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="js/header.js"></script>
</body>
@endsection
</html>
