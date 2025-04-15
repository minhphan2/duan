<!DOCTYPE html>
<html lang="en">
    @extends('layout.app')

    @section('title', 'Giới thiệu')
    
    
    
    @section('content')
<head>
        
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giới Thiệu</title>
    <link rel="icon" href="./images/logo_cake_1-removebg-preview.png" type = "image/x-icon"> <!--FAVICON-->
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
        <link rel="stylesheet" href="{{ asset('css/gioithieu.css') }}">
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

        <body>
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
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>



    </div>
    <section class="hero">
        <div class="container">
            <div class="hero__content">
                <h3 class="hero__content-title">Giới Thiệu</h3>
                <ul class="hero__content-list">
                    <li>
                        Về chúng tôi</li>
                    <li class="active">Sản phẩm</li>

                </ul>
            </div>
        </div>
        </div>
    </section>
    <section class="about-area pt-50 pb-180 pb-lg-130 pb-md-130 pb-xs-130">
        <div class="container">
            <div class="row  align-items-center">
                <div class="col-xl-6 col-lg-6">
                    <div class="about-thumb">
                        <img decoding="async" src="images/lambanhgt.jpg" alt="">

                       
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="about-details mt-md-120 mt-xs-60">
                        <div class="section-title mb-20">
                            <h5>Giới Thiệu</h5>

                            <h3>Chuyên cung cấp bánh ngọt trên toàn quốc</h3>

                         
                        </div>
                        <p>
                            Các sản phẩm chúng tôi 100% không sử dụng chất
                            làm mịn và chất bảo quản </p>

                        <div class="about-feature">
                            <div class="about-feature-icon">
                                <i class="fas fa-cake"></i>
                            </div>

                            <div class="about-feature-content">
                                <h5>Đối tác thực phẩm đáng tin cậy</h5>

                                <p>
                                    Chúng tôi có các đối tác cung cấp nguyên
                                    liệu đáng tin cậy </p>

                            </div>
                        </div>

                        <div class="about-feature">
                            <div class="about-feature-icon">
                                <i class="fas fa-cake"></i>
                            </div>
                            <div class="about-feature-content">
                                <h5>Sự tận tâm của người làm bánh</h5>
                                <p>
                                    Làm bánh là hành trình đầy sáng tạo và đam mê</p>
                            </div>
                        </div>

                        <a href="#" class="a-btn btn-theme mt-45">
                            Xem Thêm <i class="fas fa-plus"></i>
                        </a>

                    </div>
                </div>
            </div>
        </div>

    </section>

 
    <section class="approch-area pt-130 pb-100">

        <div class="container">
            <div class="row justify-content-center">

                <div class="col-xl-6">

                    <div class="section-title text-center section-title-white mb-50">
                        
                        <h3>Tại sao lại chọn chúng tôi?</h3>

                    </div>

                </div>

            </div>
            <div class="row">
                <div class="col-xl-4">

                    <div class="approch-wrap">

                        <div class="approch-thumb">
                            <a href="#">
                                <img decoding="async"
                                    src="images/redvelvet.jpg"
                                    alt="">

                            </a>

                        </div>

                        <div class="approch-details">


                            <h4><a href="#">Cung cấp bánh ngọt </a></h4>
                            <p>Dòng bánh cao cấp và hiện đại nhất của Pháp</p>
                            <a href="#" class="read-more">
                                <i class="fas fa-long-arrow-right"></i>

                            </a>


                        </div>

                    </div>

                </div>
                <div class="col-xl-4">

                    <div class="approch-wrap">

                        <div class="approch-thumb">


                            <a href="#">

                                <img decoding="async"
                                    src="images/nhacungcap.jpg"
                                    alt="">

                            </a>


                        </div>

                        <div class="approch-details">


                            <h4><a href="#"> Nhà cung cấp đáng tin cậy</a></h4>



                            <p>Chúng tôi chọn nhà cung cấp uy tín nhất thị trường
                            </p>



                            <a href="#" class="read-more">

                                <i class="fas fa-long-arrow-right"></i>

                            </a>


                        </div>

                    </div>

                </div>




                <div class="col-xl-4">

                    <div class="approch-wrap">

                        <div class="approch-thumb">
                            <a href="#">

                                <img decoding="async"
                                    src="images/lambanh1.jpg"
                                    alt="">

                            </a>
                        </div>
                        <div class="approch-details">
                            <h4><a href="#">Làm bánh</a></h4>
                            <p>Chúng tôi làm bánh trong ngày và giao hàng nhanh chóng</p>
                            <a href="#" class="read-more">

                                <i class="fas fa-long-arrow-right"></i>

                            </a>


                        </div>

                    </div>

                </div>

            </div>

        </div>
    </section>
   <section class="testimonial-area">
    <div class="container">
        <div class="testimonial-area__content">
            <div class="row justify-content-center mb-50">
                <div class="col-xl-5 col-lg-6 col-md-10">
                    <div class="section-title text-center">
                        <h5>Đánh giá</h5>
                        <h3>Đánh giá của khách hàng</h3>
                       
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="testimonial-slider">
                        <!-- Slide 1 -->
                        <div class="testimonial-slide">
                            <div class="row justify-content-center align-items-center">
                                <div class="col-xl-4 col-lg-4 d-none d-xl-block d-lg-block">
                                    <div class="testimonial-img">
                                        <img decoding="async" src="images/top1server.jpg" alt="author">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-8 col-md-10">
                                    <div class="testimonial-details">
                                        <div class="rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <p>Với chất lượng ổn định, giá cả hợp lý và dịch vụ xuất sắc, VTQ Bakery là điểm đến lý tưởng cho những người yêu bánh. Mỗi lần ghé thăm, tôi luôn hài lòng với sự tươi mới và ngọt ngào của sản phẩm.</p>
                                        <div class="author-wrap">
                                            <div class="author-thumb">
                                                <img decoding="async" src="images/top1server.jpg" alt="author">
                                            </div>
                                            <div class="author-text">
                                                <h5>Dasha Taran</h5>
                                                <p>Model</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Slide 2 -->
                        <div class="testimonial-slide">
                            <div class="row justify-content-center align-items-center">
                                <div class="col-xl-4 col-lg-4 d-none d-xl-block d-lg-block">
                                    <div class="testimonial-img">
                                        <img decoding="async" src="images/top1tronglongtoi.jpg" alt="author">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-8 col-md-10">
                                    <div class="testimonial-details">
                                        <div class="rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <p>VTQ Bakery là địa chỉ tuyệt vời cho bánh tươi ngon, với sự đa dạng và chất lượng không thể chối cãi. Họ luôn mang đến những lựa chọn tốt nhất từ cả loại bánh.</p>
                                        <div class="author-wrap">
                                            <div class="author-thumb">
                                                <img decoding="async" src="images/top1tronglongtoi.jpg">
                                            </div>
                                            <div class="author-text">
                                                <h5>Trần Hà Linh</h5>
                                                <p>Tiktoker-Diễn viên</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Slide 3 -->
                        <div class="testimonial-slide">
                            <div class="row justify-content-center align-items-center">
                                <div class="col-xl-4 col-lg-4 d-none d-xl-block d-lg-block">
                                    <div class="testimonial-img">
                                        <img decoding="async" src="images/danongquatroioi.webp" alt="author">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-8 col-md-10">
                                    <div class="testimonial-details">
                                        <div class="rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <p>VTQ Bakery không chỉ là cửa hàng bánh ngọt, mà còn là trải nghiệm độc đáo với sự đa dạng từ các loại bánh. Dịch vụ chăm sóc khách hàng tận tâm giúp tôi lựa chọn bánh phù hợp nhất.</p>
                                        <div class="author-wrap">
                                            <div class="author-thumb">
                                                <img decoding="async" src="images/danongquatroioi.webp" alt="author">
                                            </div>
                                            <div class="author-text">
                                                <h5>Khá Bánh</h5>
                                                <p>Content Creator-Dancer </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Add more slides as needed -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Initialize Slick Slider -->
<script type="text/javascript">
    $(document).ready(function(){
        $('.testimonial-slider').slick({
            dots: true,
            infinite: true,
            speed: 300,
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            arrows: true,
            adaptiveHeight: true
        });
    });
</script>
<!-- Font Awesome for star icons (optional) -->
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
            
  
 
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
    <script src="/js/brand.js">
        $(document).ready(function () {
            $('.knob').each(function () {
                var $this = $(this);
                var myVal = $this.attr("data-rel");

                $this.knob({
                    'draw': function () {
                        $(this.i).val(this.cv + '%')
                    }
                });

                $({
                    value: 0
                }).animate({
                    value: myVal
                }, {
                    duration: 1000,
                    easing: 'swing',
                    step: function () {
                        $this.val(Math.ceil(this.value)).trigger('change');
                    }
                });
            });
        });
    </script>
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./assets/js/brand.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"
        integrity="sha512-HGOnQO9+SP1V92SrtZfjqxxtLmVzqZpjFFekvzZVWoiASSQgSr4cw9Kqd2+l8Llp4Gm0G8GIFJ4ddwZilcdb8A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="js/header.js"></script>
</body>

</html>
@endsection
