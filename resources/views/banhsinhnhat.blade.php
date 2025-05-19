<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bánh sinh nhật</title>
    <link rel="icon" href="{{ asset('images/logo_cake_1-removebg-preview.png') }}" type="image/x-icon"> <!-- FAVICON -->
    <link rel="stylesheet" href="{{ asset('css/banhsinhnhat.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sanpham.css') }}">
    <link rel="stylesheet" href="{{ asset('css/root.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <!-- Link font logo -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pattaya&display=swap" rel="stylesheet">
</head>
@extends('layout.app')




@section('content')
<body>
    <!-- HEADER -->
    <!-- BOOKMARK -->
    <div class="bookmark">
        <div class="content-bookmark">
            <div>
                <h1 style="font-size: 100px;">Bánh sinh nhật</h1>
                <h3 style="font-size: 22px;">Dành cho tiệc sinh nhật, hoặc bất kỳ khoảnh khắc nào <br>quan trọng của bạn.</h3>
            </div>
        </div>
    </div>

    <!-- Bánh sinh nhật -->
       <!-- Bánh sinh nhật -->
 <div class='banhsinhnhat'>
<div id="product-list" class="banh-list"></div>
</div>
<nav class="page" >
    <ul class="page-numbers" id="pagination">
        <li></li>
    </ul>
</nav>
<script>
    function loadProducts(page = 1) {
        fetch(`/banhsinhnhat/ajax?page=${page}`)
            .then(res => res.json())
            .then(data => {
                document.getElementById('product-list').innerHTML = data.html;

                let pagination = '';
                for (let i = 1; i <= data.totalPages; i++) {
                    pagination += `<button onclick="loadProducts(${i})">${i}</button>`;
                }
                document.getElementById('pagination').innerHTML = pagination;
            });
    }

    loadProducts();
</script>



    <!-- FOOTER -->
    <footer>
        <div class="footer-container">
            <div class="footer-info">
                <img src="{{asset('images/logo cake 1.png')}}" width="150px" height="100px" alt="logo" />
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
                        <img src="{{asset('images/pay01.png')}}" alt="eon" class="footer-img" style="width: 100px; height: 30px" />
                    </li>
                    <li class="footer-item">
                        <img src="{{asset('images/pay02.jpg')}}" alt="" class="footer-img" style="width: 100px; height: 50px" />
                    </li>
                </ul>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <div class="footer-bottom">
            <p>
                Bản quyền
                <svg xmlns="http://www.w3.org/2000/svg" height="14" width="14" viewBox="0 0 512 512">
                    <!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                    <path fill="#000000" d="M256 48a208 208 0 1 1 0 416 208 208 0 1 1 0-416zm0 464A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM199.4 312.6c-31.2-31.2-31.2-81.9 0-113.1s81.9-31.2 113.1 0c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9c-50-50-131-50-181 0s-50 131 0 181s131 50 181 0c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0c-31.2 31.2-81.9 31.2-113.1 0z"/>
                </svg>
                &nbsp;2024 VTQ Bakery - Lập trình và thiết kế bởi Nhóm 2
            </p>
        </div>
    </footer>
    <script src="{{ asset('js/brand.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
</body>
</html>
@endsection