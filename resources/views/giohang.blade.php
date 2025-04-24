<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                    <!-- Dữ liệu sản phẩm sẽ được thêm vào đây bằng JavaScript -->
                </div>

                <div class="w-full lg:w-1/4 mt-10 lg:mt-0 lg:ml-20">
                    <div class="flex-col justify-center">
                        <div class="flex items-center gap-4 lg:gap-14">
                            <h3 class="text-lg font-semibold">Tổng tiền</h3>
                            <span id="totalPrice" class="text-lg font-semibold">0₫</span>
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
    // Mảng chứa thông tin các sản phẩm trong giỏ hàng (dùng cho mô phỏng)
    let cartItems = [
        {
            id: 1,
            name: "Letter to Santa",
            price: 735000,
            quantity: 1
        },

    //    {
    //      id: 2,
    //        name: "Mangopaco",
    //        price: 445000,
    //       quantity: 1
    //    }
    ];

    // Hàm để hiển thị danh sách sản phẩm trong giỏ hàng
    function renderCartItems() {
        const cartItemsDiv = document.getElementById('cartItems');
        cartItemsDiv.innerHTML = ''; // Xóa nội dung cũ đi

        if (cartItems.length === 0) {
            // Nếu không có sản phẩm, hiển thị nút đi đến trang mua hàng
            cartItemsDiv.innerHTML = '<p>Đến trang mua hàng <a href="{{ route('sanpham') }}" class="text-blue-500">tại đây</a></p>';
        } else {
            // Nếu có sản phẩm, hiển thị từng sản phẩm
            cartItems.forEach(item => {
                const itemDiv = document.createElement('div');
                itemDiv.classList.add('item-clear', 'item-product', `productid-${item.id}`, 'flex', 'items-center');

                itemDiv.innerHTML = `
                    <div>
                        <a href="javascript:void(0);" onclick="removeCartItem(${item.id})" class="text-blue-500">Xóa</a>
                    </div>
                    <div class="item-product-cart-mobile ml-10">
                        <a href="./sanPham-letterToSanta.html">
                            <img src="./images/banhsinhnhat1.avif" alt="${item.name}" class="w-16 h-16 object-cover rounded-full">
                        </a>
                    </div>
                    <div class="ml-10">
                        <span class="text-lg font-semibold"><a href="./sanPham-letterToSanta.html">${item.name}</a></span>
                    </div>
                    <div>
                        <span class="product-price price ml-72">${formatCurrency(item.price)}₫</span>
                    </div>
                    <div class="ml-10">
                        <div>
                            <input class="hidden" name="variantId" value="${item.id}">
                            <button type="button" onclick="changeQuantity(${item.id}, -1)" class="bg-gray-200 px-3 py-1 rounded-md">-</button>
                            <input readonly type="text" maxlength="3" min="1" class="form-input number-sidebar qtyMobile${item.id} mx-2 w-12 text-center" id="qtyMobile${item.id}" name="Lines" size="4" value="${item.quantity}">
                            <button type="button" onclick="changeQuantity(${item.id}, 1)" class="bg-gray-200 px-3 py-1 rounded-md">+</button>
                        </div>
                    </div>
                `;
                cartItemsDiv.appendChild(itemDiv);
            });
        }

        // Cập nhật tổng tiền
        updateTotalPrice();
    }

    // Hàm xử lý xóa sản phẩm khỏi giỏ hàng
    function removeCartItem(itemId) {
        cartItems = cartItems.filter(item => item.id !== itemId);
        renderCartItems();
    }

    // Hàm cập nhật số lượng sản phẩm
    function changeQuantity(itemId, amount) {
        const item = cartItems.find(item => item.id === itemId);
        if (item) {
            item.quantity += amount;
            if (item.quantity < 1) {
                item.quantity = 1; // Đảm bảo số lượng không nhỏ hơn 1
            }
        }
        renderCartItems();
    }

    // Hàm cập nhật tổng tiền
    function updateTotalPrice() {
        const totalPriceElement = document.getElementById('totalPrice');
        const totalPrice = cartItems.reduce((acc, item) => acc + (item.price * item.quantity), 0);
        totalPriceElement.textContent = formatCurrency(totalPrice) + '₫';
    }

    // Hàm định dạng số tiền có dấu phẩy
    function formatCurrency(amount) {
        return amount.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

    // Khởi tạo hiển thị ban đầu
    renderCartItems();
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
  <script src="{{ asset('js/cart.js.js') }}"></script>
</body>
@endsection

</html>

