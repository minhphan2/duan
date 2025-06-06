<!DOCTYPE html>
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
    <!--<script src="https://kit.fontawesome.com/d69fb28507.js" crossorigin="anonymous"></script>-->
    <link href="{{asset('css/output.css')}}" rel="stylesheet">
    <link href="{{asset('css/input.css')}}" rel="stylesheet">
    <!-- link font logo  </script>-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pattaya&display=swap" rel="stylesheet">

       <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
      function showOrderConfirm() {
    // Lấy giá trị địa chỉ từ input
    const diaChiInput = document.getElementById('dia_chi');
    if (!diaChiInput.value.trim()) {
        Swal.fire({
            title: 'Lỗi',
            text: 'Vui lòng nhập địa chỉ nhận hàng',
            icon: 'error',
            confirmButtonColor: '#3085d6',
        });
        return;
    }

    Swal.fire({
        title: 'Xác nhận đặt hàng',
        text: 'Bạn có chắc muốn đặt hàng không?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Đồng ý',
        cancelButtonText: 'Hủy'
    }).then((result) => {
        if (result.isConfirmed) {
            // Copy giá trị địa chỉ vào form ẩn
            document.getElementById('orderAddress').value = diaChiInput.value;
            // Copy giá trị ghi chú vào form ẩn
            document.getElementById('orderNote').value = document.getElementById('note').value;
            
            const form = document.getElementById('orderForm');
            if (form) {
                form.submit();
                // Xóa tất cả sản phẩm trong giỏ hàng
                const cartItems = document.getElementById('cartItems');
                if (cartItems) {
                    cartItems.innerHTML = `<p>Giỏ hàng rỗng. <a href="/sanpham" class="text-blue-500">Mua hàng</a></p>
                    <hr class="my-4">
                    <div class="flex justify-between items-center">
                        <h3 class="text-lg font-semibold">Tổng tiền</h3>
                        <span class="text-lg font-semibold" id="total-price">0₫</span>
                    </div>`;
                }
            }
        }
    });
}
function showLoginAlert() {
    Swal.fire({
        title: 'Thông báo',
        text: 'Vui lòng đăng nhập để đặt hàng',
        icon: 'info',
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'Đăng nhập'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = "{{ route('dangnhapdangky') }}";
        }
    });
}

function showEmptyCartAlert() {
    Swal.fire({
        title: 'Giỏ hàng trống',
        text: 'Vui lòng thêm sản phẩm vào giỏ hàng',
        icon: 'warning',
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'Tiếp tục mua hàng'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = "{{ route('sanpham') }}";
        }
    });
}

</script>
    <!--<script>
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
    </script>-->
   


    
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
                   <div class="item-clear item-product flex items-center product-row" data-id="{{ $id }}">
                            <!-- Xóa -->
                            <button type="button" class="remove-btn text-red-500 hover:underline mr-4" data-id="{{ $id }}">Xóa</button>

                            <!-- Ảnh -->
                            <img src="{{ asset('uploads/' . $item['image']) }}" width="64" height="64" class="rounded-full object-cover mr-4">

                            <!-- Thông tin -->
                            <!-- Thông tin -->
                            <div class="flex-1 mr-4">
                                <span class="text-lg font-semibold">{{ $item['name'] }}</span>
                                <span class="product-price price ml-72">{{ number_format($item['price']) }}₫</span>
                            </div>

                            <!-- Số lượng và nút -->
                            <div class="flex items-center space-x-2 mr-4">
                                <button type="button" class="decrease-btn px-3 py-1 bg-gray-200 rounded-md" data-id="{{ $id }}">-</button>
                                <span class="quantity">{{ $item['quantity'] }}</span>
                                <button type="button" class="increase-btn px-3 py-1 bg-gray-200 rounded-md" data-id="{{ $id }}">+</button>
                            </div>

                            <!-- Thành tiền -->
                            <div class="font-semibold subtotal">{{ number_format($thanhtien) }}₫</div>
                    </div>
                @empty
                    <p>Giỏ hàng rỗng. <a href="{{ route('sanpham') }}" class="text-blue-500">Mua hàng</a></p>
                @endforelse
                </form>
<hr class="my-4">
<div class="flex justify-between items-center">
    <h3 class="text-lg font-semibold">Tổng tiền</h3>
    <span class="text-lg font-semibold" id="total-price">{{ number_format($tong) }}₫</span>

</div>
                </div>

                <div class="w-full lg:w-1/4 mt-10 lg:mt-0 lg:ml-20">
                    <div class="flex-col justify-center">
                        <div class="mt-3">
                            <label for="note" class="control-label">Lưu ý cho đơn hàng</label> <br> <br>
                            <textarea class="border-2 rounded-md w-full" name="note" id="note" rows="4" class="form-input w-full"></textarea>
                        </div>
                        <div class="mt-4">
                            <label for="dia_chi" class="block mb-2 font-semibold">Địa chỉ nhận hàng</label>
                            <textarea class="border-2 rounded-md w-full" name="dia_chi" id="dia_chi" rows="3" class="form-input w-full"></textarea>
                        </div>

                        <div class="mt-4">
                            @if(Auth::check() || session()->has('customer')) 
                                @if(!empty($cart))
                                    @if(Auth::check() && Auth::user()->email_verified == 0)
                                        <!-- Người chưa xác minh email -->
                                        <button type="button" 
                                                onclick="alert('Bạn cần xác minh email trước khi đặt hàng.')" 
                                                class="bg-orange-500 text-white py-2 px-4 rounded-md w-full text-center"
                                                style="background: #9B592E; opacity: 0.6;">
                                            XÁC MINH EMAIL ĐỂ ĐẶT HÀNG
                                        </button>
                                    @else
                                        <!-- Người đã xác minh -->
                                        <button type="button" 
                                                onclick="showOrderConfirm()" 
                                                class="bg-orange-500 hover:bg-orange-400 text-white py-2 px-4 rounded-md w-full text-center"
                                                style="background: #9B592E">
                                            ĐẶT HÀNG
                                        </button>
                        
                                        <!-- Form submit hidden -->
                                        <form id="orderForm" action="{{ route('cart.dathang') }}" method="POST" style="display: none">
                                            @csrf
                                            @foreach($cart as $id => $item)
                                                <input type="hidden" name="cart_items[{{$id}}][id]" value="{{ $id }}">
                                                <input type="hidden" name="cart_items[{{$id}}][quantity]" value="{{ $item['quantity'] }}">
                                                <input type="hidden" name="cart_items[{{$id}}][price]" value="{{ $item['price'] }}">
                                                <input type="hidden" name="cart_items[{{$id}}][product_id]" value="{{ $item['product_id'] }}">
                                            @endforeach
                        
                                            <input type="hidden" name="total_amount" value="{{ $tong }}">
                                            @if(Auth::check())
                                                <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                                            @endif
                                            <input type="hidden" name="dia_chi" id="orderAddress">
                                            <input type="hidden" name="note" id="orderNote">
                                            <input type="hidden" name="trang_thai" value="Chờ xác nhận">
                                        </form>
                                    @endif
                                @else
                                    <!-- Giỏ hàng trống -->
                                    <button type="button" 
                                            onclick="showEmptyCartAlert()" 
                                            class="bg-gray-400 text-white py-2 px-4 rounded-md w-full text-center"
                                            style="background: #9B592E">
                                        GIỎ HÀNG TRỐNG
                                    </button>
                                @endif
                            @else
                                <!-- Người chưa đăng nhập -->
                                <button type="button" 
                                        onclick="showLoginAlert()" 
                                        class="bg-blue-500 hover:bg-blue-400 text-white py-2 px-4 rounded-md w-full text-center"
                                        style="background: #9B592E">
                                    ĐĂNG NHẬP ĐỂ ĐẶT HÀNG
                                </button>
                            @endif
                        </div>
                        
                        <button type="button" 
                                onclick="window.location.href='{{ route('sanpham') }}'" 
                                class="mt-4 w-full">
                            <span class="flex items-center justify-center">&larr; Tiếp tục mua hàng</span>
                        </button>
                    </div>
                </div>
            </div>
        
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
</div>
</div>
</form>
     
      <script src="{{ asset('js/cart.js') }}"></script>
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


<!-- Add JavaScript for alerts -->

</body>
@endsection

</html>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const cartItems = document.getElementById('cartItems');
    if (!cartItems) return;

    cartItems.addEventListener('click', function (e) {
        const btn = e.target;
        const id = btn.dataset.id;
        const row = btn.closest('.product-row');

        if (btn.classList.contains('increase-btn')) {
            fetch(`/cart/increase/${id}`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                }
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    const item = data.cart[id];
                    row.querySelector('.quantity').textContent = item.quantity;
                    row.querySelector('.subtotal').textContent = (item.price * item.quantity).toLocaleString('vi-VN') + '₫';
                    updateTotal();
                } else {
                    // Hiển thị thông báo lỗi
                    Swal.fire({
                        title: 'Thông báo',
                        text: data.message,
                        icon: 'warning',
                        confirmButtonColor: '#3085d6'
                    });
                    // Disable nút tăng
                    btn.disabled = true;
                    btn.style.opacity = '0.5';
                    btn.style.cursor = 'not-allowed';
                }
            });
        }

        if (btn.classList.contains('decrease-btn')) {
            fetch(`/cart/decrease/${id}`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                }
            })
            .then(res => res.json())
            .then(data => {
                if (!data.cart[id]) {
                    row.remove();
                } else {
                    const item = data.cart[id];
                    row.querySelector('.quantity').textContent = item.quantity;
                    row.querySelector('.subtotal').textContent = (item.price * item.quantity).toLocaleString('vi-VN') + '₫';
                    // Enable lại nút tăng khi giảm số lượng
                    const increaseBtn = row.querySelector('.increase-btn');
                    increaseBtn.disabled = false;
                    increaseBtn.style.opacity = '1';
                    increaseBtn.style.cursor = 'pointer';
                }
                updateTotal();
                checkIfCartEmpty();
            });
        }

        if (btn.classList.contains('remove-btn')) {
            fetch(`/cart/remove/${id}`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                }
            })
            .then(response => {
                if (response.ok) {
                    if (row) row.remove();
                    updateTotal();
                    checkIfCartEmpty();
                } else {
                    console.error('Lỗi từ server:', response.status);
                }
            })
            .catch(error => {
                console.error('Lỗi fetch:', error);
            });
        }

        function updateTotal() {
            let total = 0;
            document.querySelectorAll('.product-row').forEach(r => {
                const quantity = parseInt(r.querySelector('.quantity').textContent);
                const priceText = r.querySelector('.product-price').textContent.replace(/[^\d]/g, '');
                const price = parseInt(priceText);
                total += price * quantity;
            });
            document.getElementById('total-price').textContent = total.toLocaleString('vi-VN') + '₫';
        }

        function checkIfCartEmpty() {
            const items = document.querySelectorAll('.product-row');
            if (items.length === 0) {
                cartItems.innerHTML = `<p>Giỏ hàng rỗng. <a href="/sanpham" class="text-blue-500">Mua hàng</a></p>
                <hr class="my-4">
                <div class="flex justify-between items-center">
                    <h3 class="text-lg font-semibold">Tổng tiền</h3>
                    <span class="text-lg font-semibold" id="total-price">0₫</span>
                </div>`;
                document.getElementById('total-price').textContent = '0₫';
            }
        }
    });
});
</script>


