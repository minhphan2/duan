<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Tiết Sản Phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/product.css') }}">
    <link rel="icon" href="{{ asset('images/logo_cake_1-removebg-preview.png') }}" type="image/x-icon">
</head>
<body>
    <!-- HEADER -->
    @extends('layout.app')
    @section('content')

    <!-- Chi tiết sản phẩm -->
    <div class="container mt-4">
        <div class="row g-4">
            <div class="col-md-6">
                <img src="{{ asset('uploads/' . $result->HinhAnh) }}" class="img-fluid rounded" alt="{{ $result->TenSP }}">
            </div>
            <div class="col-md-6">
                <h2 class="product-title">{{ $result->TenSP }}</h2>
                <p class="product-price text-danger"><b>{{ number_format($result->Gia) }} VNĐ</b></p>
                <p class="product-description">{{ $result->MoTa }}</p>
                <form action="{{ route('cart.add') }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $result->MaSP }}">
                    <input type="hidden" name="Gia" value="{{ $result->Gia }}">
                    <input type="hidden" name="TenSP" value="{{ $result->TenSP }}">
                    <input type="hidden" name="HinhAnh" value="{{ $result->HinhAnh }}">
                    <div class="mb-3">
                        <label for="soluong" class="form-label">Số lượng:</label>
                        <input type="number" name="soluong" id="soluong" class="form-control w-25" value="1" min="1">
                    </div>                
                    <button type="submit" 
    class="btn btn-primary {{ $result->SoLuong <= 0 ? 'opacity-50 cursor-not-allowed' : '' }}" 
    {{ $result->SoLuong <= 0 ? 'disabled' : '' }}>
    {{ $result->SoLuong <= 0 ? 'Hết hàng' : 'Thêm vào giỏ hàng' }}
</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Gợi ý phụ kiện -->
    <div class="container mt-5">
        <h3 class="mb-4">Gợi ý phụ kiện cho bạn</h3>
        <div class="row row-cols-2 row-cols-md-4 g-4">
            <div class="col">
                <div class="card">
                    <img src="{{ asset('images/phuKien/1.avif') }}" class="card-img-top" alt="Phụ kiện 1">
                    <div class="card-body">
                        <p class="card-text">Thiệp Let's Cheer</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <img src="{{ asset('images/phuKien/2.avif') }}" class="card-img-top" alt="Phụ kiện 2">
                    <div class="card-body">
                        <p class="card-text">Thiệp Merry Christmas</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <img src="{{ asset('images/phuKien/3.avif') }}" class="card-img-top" alt="Phụ kiện 3">
                    <div class="card-body">
                        <p class="card-text">Thiệp Greatest Gift</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <img src="{{ asset('images/phuKien/4.avif') }}" class="card-img-top" alt="Phụ kiện 4">
                    <div class="card-body">
                        <p class="card-text">Topper Happy Birthday</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
@endsection
</html>