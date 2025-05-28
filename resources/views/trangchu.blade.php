<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="./images/logo_cake_1-removebg-preview.png" type = "image/x-icon"> <!--FAVICON-->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
<link rel="stylesheet" href="{{ asset('css/footer.css') }}">
<link rel="stylesheet" href="{{ asset('css/header.css') }}">
<link rel="stylesheet" href="{{ asset('css/root.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- link font logo -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pattaya&display=swap" rel="stylesheet">

    <title>VTQ Bakery - TRANG CHỦ</title>
</head>

@extends('layout.app')

@section('title', 'Trang chủ')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/sanpham.css') }}">
@endsection

@section('content')
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
	<main>							       
<!--SLIDER-->
<section>
    <div class="slider">
        <div class="sliderImg">
            <div class="banner">
                <img src ="./images/tran01.jpg">
                <div class="overlay">
                    <div class="content">
                        <h4>VTQ Bakery</h4><br><br>
                        <h1>Góp phần lưu dữ <br>kỉ niệm đặc biệt của bạn</h1>
                        
                    </div>
                    <div class="btnslider">
                        <a href="lienhe.html" class="btn">LIÊN HỆ <span class="plus">+</span></a>
                        <a href="gioithieu.html" class="btn">GIỚI THIỆU <span class="plus">+</span></a>
                    </div>
                </div>
            </div>

            <div class="banner">
                <img src ="images/tran02.jpg">
                <div class="overlay">
                    <div class="content">
                        <h4>Chọn bánh làm quà</h4><br><br>
                        <h1>Khi mỗi chiếc bánh <br> là 1 lời chúc</h1>
                    </div>
                    <div class="btnslider">
                        <a href="lienhe.html" class="btn">LIÊN HỆ <span class="plus">+</span></a>
                        <a href="gioithieu.html" class="btn">GIỚI THIỆU <span class="plus">+</span></a>
                    </div>
                </div>
            </div>

            <div class="banner">
                <img src ="images/tran03.jpg">
                <div class="overlay">
                    <div class="content">
                        <h4>Thưởng thức trọn vẹn</h4><br><br>
                        <h1>Hương vị sáng tạo <br>đến từ trái cây tươi</h1>
                    </div>
                    <div class="btnslider">
                        <a href="lienhe.html" class="btn">LIÊN HỆ <span class="plus">+</span></a>
                        <a href="gioithieu.html" class="btn">GIỚI THIỆU <span class="plus">+</span></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="nutbam">
            <button id="nuttrai">&#8592;</button>
            <button id="nutphai">&#8594;</button>
        </div>
        <ul class="dots">
            <li class="active"></li>
            <li></li>
            <li></li>
        </ul>
    </div>
</section>

<!--GIỚI THIỆU -->
<section>
    <div class="introduce"> 
        <div class="introduce-container">
            <div class="intro-content"> 
                <h3>Giới Thiệu</h3>
                <h1>Thưởng thức nghệ thuật bánh ngọt Pháp, tại Hà Nội</h1>
                
                <br> 
                <a href="gioithieu.html" class="btn btngt">XEM THÊM <span class="plus">+</span></a>
            </div>
            <div class="intro-container">
                <div class="intro-items" id="left1">
                    <img src="images/gioithieu01.avif" class="center" width="100" height="100">
                    <h3>Chất lượng</h3>
                    <p>Mỗi nguyên liệu được lựa chọn tỉ mỉ cùng những tiêu chuẩn cao cấp nhất.</p> <br> <br> 
                </div>
                <div class="intro-items" id="right1">             
                    <img src="images/gioithieu02.avif" class="center" width="100" height="100">
                    <h3>Trải nghiệm</h3>
                    <p>Chúng tôi mong muốn mang đến cho bạn trải nghiệm thưởng thức bánh ngọt dễ dàng nhất có thể</p>  <br> <br>
                </div>
                <div class="intro-items" id="left2">  
                    <img src="images/gioithieu03.avif" class="center" width="100" height="100">
                    <h3>Cho mọi người</h3>
                    <p>Thanh mát, ngọt dịu hay đậm đà, ai cũng có thể tìm riêng cho mình một vị bánh để yêu thích</p> <br> <br>
                </div>
                <div class="intro-items" id="right2"> 
                    <img src="images/gioithieu04.webp" class="center" width="250" height="300">
                    <!-- <h3>Thiết kế cảnh quan</h3>
                    <p>Tham quan và học tập những cách thiết kế cảnh quan cho gia đình bạn</p> <br> <br> -->
                </div>
            </div>
        </div>
    </div>
</section> 



<!-- HOT SALE -->
<section>
    <div class="hotsale">
        <div class="hotsale-container">
            <h3>HOT SALE</h3>
            <h1>Ưu đãi giới hạn</h1>
            <h2>Chocovani</h2>
            <p>Giá chỉ còn<span style="color: #79381f;"> 250.000</span></p><br>
            <div id="clockdiv">
                <div>
                    <div class="smalltext">DAYS</div>
                    <span class="days"></span> 
                </div>
                <div>
                    <div class="smalltext">HOURS</div>
                    <span class="hours"></span>
                </div>
                <div>
                    <div class="smalltext">MIN</div>
                    <span class="minutes"></span> 
                </div>
                <div>
                    <div class="smalltext">SEC</div>
                    <span class="seconds"></span>
                </div>
            </div> <br><br><br> 
            <a href="lienhe.html" class="btn btnhs">MUA NGAY <span class="plus">+</span></a>
        </div> 
        <div class="spsale">
            <img src="images/hot sale.avif" id="quaman" width="460px" height="500px">
            
        </div> 
    </div>
</section>

<!-- SP -->
<section>
    <div class="service">
        <br><br><br>
        <div class="header-service">
            
            <h1>Sản phẩm</h1>
            <h3>Ngọt ngào & Tinh tế</h3>
            <br><br>
        </div>
        <div class ="box-service">
            <div class="box">
                <a href ="{{route('banhsinhnhat')}}" class = "btn-service">
                <img src="images/box pic 01.avif" width="70" height="70">
                <h4>Bánh sinh nhật</h4>
                <p>Dành cho 2-10 người</p>
                <div class="line" style="width: 20%; height: 3px; background-color: rgb(0, 0, 0); margin: 7% 40%; "></div>
                <p>Sản phẩm đặc trưng của VTQ Bakery là bánh Entremet. Dành cho tiệc sinh nhật, hoặc bất kỳ khoảnh khắc nào quan trọng của bạn.</p>
                &rarr;</a>
            </div>
            <div class="box">
                <a href ="{{route('banhnuae')}}" class = "btn-service">
                <img src="images/box pic 02.avif" width="70" height="70">
                <h4>Bánh nửa Entremet</h4>
                <p>Bánh cho 2-5 người</p>
                <div class="line" style="width: 20%; height: 3px; background-color: rgb(0, 0, 0); margin: 7% 40%; "></div>
                <p>Phiên bản sáng tạo độc đáo chỉ có duy nhất tại VTQ - một nửa chiếc bánh giúp bạn vui vẻ thưởng thức, dù là nhóm nhỏ hay một mình.</p>
                &rarr;</a>
            </div>
            <div class="box">
                <a href ="{{route('phukienbanh')}}" class = "btn-service">
                <img src="images/box pic 03.avif" width="70" height="70">
                <h4>Phụ kiện bánh</h4>
                <p>Nến, thiệp & phụ kiện</p>
                <div class="line" style="width: 20%; height: 3px; background-color: #000000; margin: 7% 40%; "></div>
                <p>Bánh cũng là một món quà. VTQ luôn có phụ kiện trang trí được thiết kế để trải nghiệm của bạn trở nên đặc biệt hơn một chút.</p>
                &rarr;</a>
            </div>        
            
        </div>
    </div>
</section>
<!-- VÒNG TRÒN PHẦN TRĂM -->
 <section>
    <div class="circle-intro">
        <div class="circle-container">
            <div class="chart-container" data-percent="100" data-color="#7e7666">
                <div class="chart" data-percent="100">
                    <span class="percent">100%</span>
                </div> <br>
                <div class="description">
                    <h2>Sản phẩm</h2> 
                    <p>Được làm thủ công</p>
                </div>
            </div>

            <div class="chart-container" data-percent="83" data-color="#baaa87">
                <div class="chart" data-percent="83">
                    <span class="percent">83%</span>
                </div> <br>
                <div class="description">
                    <h2>Trái cây tươi</h2> 
                    <p>Cung cấp 83% trái cây tươi</p>
                </div>
            </div>

            <div class="chart-container" data-percent="95" data-color="#baa89b">
                <div class="chart" data-percent="95">
                    <span class="percent">95%</span>
                </div> <br>
                <div class="description">
                    <h2>Khách hàng yêu thích</h2> 
                    <p>Hơn 95% khách hàng yêu thích</p>
                </div>
            </div>

            <div class="chart-container" data-percent="100" data-color="#c0b2a8">
                <div class="chart" data-percent="100">
                    <span class="percent">100%</span>
                </div> <br>
                <div class="description">
                    <h2>Phản hồi</h2> 
                    <p>Câu hỏi trong vòng 24 giờ</p>
                </div>
            </div>        
        </div>
    </div>
</section>




<!-- TIN TỨC -->
 <section >
    <div class="news"> 
        <h3 >VTQ MEDIA</h3>
        <h2>How to do it</h2><br><br><br>
        <div class="post-container">
            <div class="post">
                <div class="postImg">
                <img src="images/VTQmedia.jpg">
                </div>
                
                    <div class="time-container">
                        <div class="time-items">
                            <img src="images/morrimedia.png" width="25px" height="25px">
                        </div>
                        <div class="time-items">
                            <p>VTQmedia</p>
                        </div>
                        <div class="time-items">
                            <img src="images/time.png" width="25px" height="25px">
                        </div>
                        <div class="time-items"><p>12/11/2024</p></div>      
                    </div>

                    <div class="text-container">
                        <div class="text-items">
                            <a href ="chitiettintuc-1.html" class="text-title">VTQ How: Hướng nội đặt bánh</a>   
                        </div>      <br>
                        <div class="text-items">
                            <p>Bí kíp mua sắm dành cho người sống khép kín. Người hướng nội ơi, hãy thoải mái mua sắm tại website của chúng tôi mà không cần lo ngại! Mọi sản phẩm đều được giới thiệu chi tiết...</p>
                        </div> <br> 
                        <a href="chitiettintuc-1.html" class="btn btnnews">XEM THÊM <span class="plus">+</span></a>           <br>        
                    </div>                    
            </div>
        
            <div class="post">
                <div class="postImg">
                <img src="images/VTQmedia02.jpg">
                </div>
                    <div class="time-container">
                        <div class="time-items">
                            <img src="images/morrimedia.png" width="25px" height="25px">
                        </div>
                        <div class="time-items">
                            <p>VTQmedia</p>
                        </div>
                        <div class="time-items">
                            <img src="images/time.png" width="25px" height="25px">
                        </div>
                        <div class="time-items"><p>15/11/2024</p></div>      
                    </div>
                    <div class="text-container">
                        <div class="text-items">
                            <a href ="#" class="text-title">VTQ How: Làm Em vui</a>   
                        </div>      <br>
                        <div class="text-items">
                            <p>Không cần đến những cử chỉ cầu kỳ, một lời khen đúng lúc, một hành động nhỏ nhưng tinh tế như pha ly cà phê sáng hay đặt tặng nàng một chiếc bánh bất ngờ...</p>
                        </div>  <br>
                        <a href="chitiettintuc-2.html" class="btn btnnews">XEM THÊM <span class="plus">+</span></a>           <br>                    
                    </div>                    
            </div>
            <div class="post">
                <div class="postImg">
                <img src="images/VTQmedia03.jpg">
                </div>
                    <div class="time-container">
                        <div class="time-items">
                            <img src="images/morrimedia.png" width="25px" height="25px">
                        </div>
                        <div class="time-items">
                            <p>VTQmedia</p>
                        </div>
                        <div class="time-items">
                            <img src="images/time.png" width="25px" height="25px">
                        </div>
                        <div class="time-items"><p>15/11/2024</p></div>      
                    </div>

                    <div class="text-container">
                        <div class="text-items">
                            <a href ="#" class="text-title">VTQ How: Tiệc bất ngờ</a>   
                        </div>      <br>
                        <div class="text-items">
                            <p> Một không gian ấm cúng, những gương mặt thân quen, và vài khoảnh khắc yêu thương bất ngờ cũng đủ khiến trái tim người nhận tràn ngập niềm hạnh phúc...</p>
                        </div>  <br>
                        <a href="chitiettintuc-3.html" class="btn btnnews">XEM THÊM <span class="plus">+</span></a>           <br>                   
                    </div>                    
            </div>
        </div>
    </div>
</section>
</main>
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
<!-- js của vòng tròn % -->
<script src="js/header.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="js/jquery.easypiechart.min.js"></script>
<!-- js quotes -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="js/main.js"></script>
<!-- button back to top -->
<button onclick="topFunction()" id="myBtn" title="Back to top"><i class="fas fa-arrow-up"></i></button>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.1/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.1/ScrollTrigger.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/smooth-scroll/16.1.3/smooth-scroll.polyfills.min.js"></script>

<script>
    function loadHTML(elementId, filePath) {
       fetch(filePath)
           .then(response => response.text())
           .then(data => {
               document.getElementById(elementId).innerHTML = data;
           })
           .catch(error => console.error('Error loading the file:', error));
   }

   loadHTML('bodytrang', 'body.html');
   loadHTML('footertrang','footer.html')
   loadHTML('headertrang', 'header.php');
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('js/thongbao.js') }}"></script>
@if(session('swal_success'))
    <meta name="swal-success" content='@json(session('swal_success'))'>
@endif
@if(session('swal_error'))
    <meta name="swal-error" content='@json(session('swal_error'))'>
@endif
</body>
@endsection
</html>
