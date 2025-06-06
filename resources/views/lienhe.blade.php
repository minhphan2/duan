<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liên hệ</title>
    <link rel="icon" href="images/logo_cake_1-removebg-preview.png" type = "image/x-icon"> <!--FAVICON-->

   
    <link rel="stylesheet" href="{{ asset('css/root.css') }}">
    <link rel="stylesheet" href="{{ asset('css/lienhe.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tintuc.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bookmark&brand.css') }}">
    <!-- font header -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pattaya&display=swap" rel="stylesheet">
</head>
@extends('layout.app')

@section( 'content')
<body>
    <!-- HEADER -->
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
        <main>			
    <!-- SECTION -->
    <div class="bookmark"></div>
        <div class="content-bookmark">
            <div>
                <h1 style="text-align: center;">Liên Hệ</h1>
                <h3><a href="trangchu.html">Trang chủ</a> || Liên Hệ</h3>
            </div>
        </div>
    </div>
    <!-- CÁC CHI NHÁNH -->
    <div class="contact-address">
        <div class="contact-address-container">
            <div class="contact-address-wrapper" >
                <div class="contact-address-content">
                    <h3 class="fs36">Trụ Sở Hà Nội</h3>
                    
                    <ul>
                        <li>Số 12 Chùa Bộc, Đống Đa, thành phố Hà Nội</li>
                        <li><a href="mailto:QTVBakery@gmail.com">QTVBakery@gmail.com</a></li>
                        <li>0987654321</li>
                    </ul>
                </div>
            </div>
            <div class="contact-address-wrapper ">
                <div class="contact-address-content">
                    <h3 class="fs36">Trụ Sở HCM</h3>
                    
                    <ul>
                        <li>232 Lê Lợi, Quận 1, TP.Hồ Chí Minh</li>
                        <li><a href="mailto:QTVBakery@gmail.com">QTVBakery@gmail.com</a></li>
                        <li>0942382453</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- FORM LIÊN HỆ -->
    <!-- FORM LIÊN HỆ -->
<div class="lienhe">
  <div class="contact-area">
      <div class="contact-bg">
          <div class="contact-content">
              <h3 class="fs36">Thông Tin Liên Hệ</h3>

              <form action="{{ route('gui.ho_tro') }}" method="POST" id="contactForm">
                  @csrf
                  <div class="contact-form" id="contact-form">
                      <div class="form-ten-sdt">
                          <span class="contact-form-item error">
                              <input size="40" class="wpcf7-form-control width" id="input-name"
                                  placeholder="Tên :" type="text" name="name" />
                          </span>
                          <span class="contact-form-item error">
                              <input size="40" class="wpcf7-form-control width" id="input-phone"
                                  placeholder="Số điện thoại :" type="text" name="phone" />
                          </span>
                      </div>

                      <span class="contact-form-item error">
                          <input size="40" class="wpcf7-form-control" id="input-email"
                              placeholder="Email :" type="email" name="email" />
                      </span>

                      <span class="contact-form-item error">
                          <textarea id="input-message" cols="40" rows="10" class="wpcf7-form-control"
                              placeholder="Nhập nội dung của bạn :" name="message"></textarea>
                      </span>
                  </div>

                  <div class="contact-button">
                      <input class="wpcf7-form-control wpcf7-submit" id="btn-submit" type="submit" value="GỬI NGAY" />
                  </div>
              </form>

          </div>
      </div>
  </div>
</div>

        <div class="map">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.5884919834416!2d105.82623827531152!3d21.009126380635294!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ac800f450807%3A0x419a49bcd94b693a!2zSOG7jWMgVmnhu4duIE5nw6JuIEjDoG5n!5e0!3m2!1svi!2s!4v1715367973344!5m2!1svi!2s"
                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
    <div></div>

    
    <script src="js/brand.js"></script>
    <script src="js/contact.js"></script>
    <script src="././js/brand.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <!-- FOOTER -->
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
    <div id="overlay"></div>
    <script src="js/header.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.1/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.1/ScrollTrigger.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/smooth-scroll/16.1.3/smooth-scroll.polyfills.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Kiểm tra nếu có session flash 'success'
            @if(session('success'))
                Swal.fire({
                    title: 'Thành công!',
                    text: '{{ session('success') }}',
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
            @endif

            // Kiểm tra nếu có session flash 'error'
            @if(session('error'))
                Swal.fire({
                    title: 'Lỗi!',
                    text: '{{ session('error') }}',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            @endif

            // Kiểm tra nếu có lỗi validation từ Laravel (được tự động đưa vào $errors)
            // Mặc dù bạn nói không cần hiển thị lỗi dưới input,
            // việc hiển thị thông báo lỗi chung khi validation fail cũng hữu ích
            @if ($errors->any())
                let errorMessages = '';
                @foreach ($errors->all() as $error)
                    errorMessages += '{{ $error }}<br>';
                @endforeach
                Swal.fire({
                    title: 'Lỗi nhập liệu!',
                    html: errorMessages,
                    icon: 'warning',
                    confirmButtonText: 'OK'
                });
            @endif
        });
    </script>
</body>
@endsection
</html>
