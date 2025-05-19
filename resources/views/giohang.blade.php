<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="./images/logo_cake_1-removebg-preview.png" type = "image/x-icon"> <!--FAVICON-->
    <title>Giỏ hàng của bạn</title>
    <link rel="stylesheet" href="{{ asset('css/root.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://kit.fontawesome.com/d69fb28507.js" crossorigin="anonymous"></script>
    <link href="{{asset('css/output.css')}}" rel="stylesheet">
    <link href="{{asset('css/input.css')}}" rel="stylesheet">
    <!-- link font logo -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pattaya&display=swap" rel="stylesheet">
    <script>
      document.addEventListener('DOMContentLoaded', function () {
    // Tăng số lượng
    document.querySelectorAll('.increase-btn').forEach(button => {
        button.addEventListener('click', function () {
            const id = this.getAttribute('data-id');
            fetch(`/cart/increase/${id}`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Content-Type': 'application/json',
                },
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        updateCartUI(data.cart);
                    }
                });
        });
    });

    // Giảm số lượng
    document.querySelectorAll('.decrease-btn').forEach(button => {
        button.addEventListener('click', function () {
            const id = this.getAttribute('data-id');
            fetch(`/cart/decrease/${id}`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Content-Type': 'application/json',
                },
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        updateCartUI(data.cart);
                    }
                });
        });
    });

    // Cập nhật giao diện giỏ hàng
    function updateCartUI(cart) {
        for (const id in cart) {
            const item = cart[id];
            const quantityElement = document.querySelector(`.decrease-btn[data-id="${id}"]`).nextElementSibling;
            quantityElement.textContent = item.quantity;
        }
    }
});
    </script>
   

    
</head>
@extends('layout.app')
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


<!-- tailwindcss -->
<section class="bg-white">
    <div>
        <form id="cartForm">
            <h1 class="text-xl font-bold p-6">Giỏ hàng</h1>
            <hr>
            <div class="flex flex-col lg:flex-row p-7">
                <div class="flex flex-col gap-5 w-full lg:w-3/4" id="cartItems">
                    <!-- Dữ liệu sản phẩm sẽ được thêm vào đây bằng JavaScript   -->
                    @php $tong = 0; @endphp
                    @forelse($cart as $id => $item)
                    @php
                        $thanhtien = $item['price'] * $item['quantity'];
                        $tong += $thanhtien;
                    @endphp
                    <div class="item-clear item-product productid-1 flex items-center">
                        <!-- Xóa -->
                        <a href="{{ route('cart.remove', ['id' => $id]) }}" class="text-red-500 hover:underline mr-4">Xóa</a>
                
                        <!-- Ảnh -->
                        <img src="{{ asset(  'uploads/' .$item['image']) }}" width="64" height="64" class="rounded-full object-cover mr-4">
                
                        <!-- Thông tin -->
                        <div class="flex-1 mr-4">
                            <span class="text-lg font-semibold">{{ $item['name'] }}</span>
                            <span class="product-price price ml-72">{{ number_format($item['price']) }}₫</span>
                        </div>
                
                        <!-- Số lượng và nút -->
                         <div class="flex items-center space-x-2 mr-4">
        <button class="decrease-btn px-3 py-1 bg-gray-200 rounded-md" data-id="{{ $id }}">-</button>
        <span class="quantity">{{ $item['quantity'] }}</span>
        <button class="increase-btn px-3 py-1 bg-gray-200 rounded-md" data-id="{{ $id }}">+</button>
    </div>
                
                        <!-- Thành tiền -->
                        <div class="font-semibold">
                            = {{ number_format($thanhtien) }}₫
                        </div>
                    </div>
                @empty
                    <p>Giỏ hàng rỗng. <a href="{{ route('sanpham') }}" class="text-blue-500">Mua hàng</a></p>
                @endforelse
                

<hr class="my-4">
<div class="flex justify-between items-center">
    <h3 class="text-lg font-semibold">Tổng tiền</h3>
    <span class="text-lg font-semibold">{{ number_format($tong) }}₫</span>
</div>
                </div>

                <div class="w-full lg:w-1/4 mt-10 lg:mt-0 lg:ml-20">
                    <div class="flex-col justify-center">
                        <div class="flex items-center gap-4 lg:gap-14">
                            <h3 class="text-lg font-semibold">Tổng tiền</h3>
                            <span id="totalPrice" class="text-lg font-semibold">{{ number_format($tong) }}₫</span>
                        </div>
                        <div class="mt-3">
                            <label for="note" class="control-label">Lưu ý cho đơn hàng</label> <br> <br>
                            <textarea class="border-2 rounded-md w-full" name="note" id="note" rows="4" class="form-input w-full"></textarea>
                        </div>
                        <div class="mt-4">
                            <a href="thanhtoan.html" class="bg-orange-500 hover:bg-orange-400 text-white py-2 px-4 rounded-md block text-center">Tiến hành thanh toán</a>
                        </div>
                        <button type="button" onclick="window.location.href='sanpham.html'" class="mt-4 w-full">
                            <span class="flex items-center justify-center">&larr; Tiếp tục mua hàng</span>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>

<script>
</script>

<section class="form-section flex items-center justify-center bg-gray-100">
    <div class="bg-gray-100 p-8 rounded-lg max-w-xl w-full text-center shadow-none">
        <h2 class="text-2xl font-bold mb-6">Đăng Ký nhận thông tin khuyến mãi</h2>
        @if(session('success'))
        <p class="text-green-600">{{ session('success') }}</p>

        @elseif(session('error'))
        <p class="text-red-600">{{ session('error') }}</p>
        @endif
        <form action="{{route('send.promo.email')}}" method="POST" class="flex space-x-2">
            @csrf
            <input type="email" id="email" name="email" placeholder="Nhập email của bạn" required class="flex-grow p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400">
            <button type="submit" class="p-3 bg-green-500 text-white rounded-lg hover:bg-green-600">Đăng Ký</button>
        </form>
    </div>
</section>
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
  <script src="{{ asset('js/cart.js') }}"></script>
</body>
@endsection

</html>

