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
    <link rel="stylesheet" href="{{ asset('css/review.css') }}">
    <link rel="stylesheet" href="{{ asset('css/chitiet.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('images/logo_cake_1-removebg-preview.png') }}" type="image/x-icon">
    <style>
@media (max-width: 768px) {
    .product-title {
        font-size: 2rem !important;
        text-align: center;
    }
    .product-price {
        font-size: 1.5rem !important;
        text-align: center;
    }
    .product-description {
        font-size: 1rem !important;
        text-align: center;
    }
    .gallery {
        text-align: center;
    }
    .main-img {
        max-width: 90vw;
        height: auto;
    }
    .col-md-6 {
        width: 100% !important;
        max-width: 100%;
        flex: 0 0 100%;
    }
    .row.g-4 {
        height: auto !important;
        flex-direction: column;
    }
    .mb-3 {
        align-items: center;
        justify-content: center;
        justify-self: center;
    }

}
</style>
</head>
<body>
    <!-- HEADER -->
    @extends('layout.app')
    @section('content')

    <!-- Chi tiết sản phẩm -->
    <div class="container mt-4">
        <div class="row g-4" style="height: auto">
            <div class="col-md-6" style="width:50%;">
                <div class="gallery" style="height: 100%">
                    <img id="mainImage" src="{{ asset('uploads/' . $result->HinhAnh) }}" alt="Ảnh chính" class="main-img">
                    <div class="thumbnails" style="justify-content: center;">
                      <img src="{{ asset('uploads/' . $result->HinhAnh) }}" onclick="changeImage(this)" alt="{{ $result->TenSP }}">
                      <img src="{{ asset('uploads/' . $result->HinhAnh2) }}" onclick="changeImage(this)" alt="{{ $result->TenSP }}">
                      <img src="{{ asset('uploads/' . $result->HinhAnh3) }}" onclick="changeImage(this)" alt="{{ $result->TenSP }}">
                    </div>
                  </div>
            </div>
            <div class="col-md-6" style="width:50%;">
                <h2 class="product-title" style="font-family:Signika;font-size:100px;color: #694922;">{{ $result->TenSP }}</h2>
                @if(isset($result->giam_gia) && $result->giam_gia > 0)
    <p class="product-price" style="font-family:Signika;font-size:60px;color: red;">
        <b>{{ number_format($result->Gia * (1 - $result->giam_gia / 100)) }} VNĐ</b>
        <span style="font-size: 40px; text-decoration: line-through; color: gray;">
            {{ number_format($result->Gia) }} VNĐ
        </span>
        <span style="font-size: 35px; color: green;">
            (-{{ $result->giam_gia}}%)
        </span>
    </p>
@else
    <p class="product-price" style="font-family:Signika;font-size:70px;color: #694922;">
        <b>{{ number_format($result->Gia) }} VNĐ</b>
    </p>
@endif
                <p class="product-description"style="font-family:Signika;font-size:30px;color: #694922;">{{ $result->MoTa }}</p>
                <form action="{{ route('cart.add') }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $result->MaSP }}">
                    <input type="hidden" name="Gia" value="{{ $result->Gia }}">
                    <input type="hidden" name="TenSP" value="{{ $result->TenSP }}">
                    <input type="hidden" name="HinhAnh" value="{{ $result->HinhAnh }}">
                    <input type="hidden" name="giam_gia" value="{{ $result->giam_gia }}"> 
                    <div class="mb-3">
    <label style="font-family:Signika;color: #694922;" for="soluong" class="form-label">Số lượng:</label>
    <input type="number" name="soluong" id="soluong" class="form-control w-25" value="1" min="1">

<button type="submit" id="addToCartBtn" class="btn btn-primary">
    Thêm vào giỏ hàng
</button>
</div>
                </form>
            </div>
        </div>
    </div>

    <div class="review-box" data-product-id="{{ $result->MaSP }}">
        <div class="star-rating">
            <input type="radio" name="rating" value="5" id="5"><label for="5">★</label>
            <input type="radio" name="rating" value="4" id="4"><label for="4">★</label>
            <input type="radio" name="rating" value="3" id="3"><label for="3">★</label>
            <input type="radio" name="rating" value="2" id="2"><label for="2">★</label>
            <input type="radio" name="rating" value="1" id="1"><label for="1">★</label>
        </div>
        <input type="text" id="reviewer_name" placeholder="Nhập tên của bạn">
        <textarea id="comment" placeholder="Viết đánh giá..."></textarea>
        <button id="submit-review">Gửi đánh giá</button>
        <div id="review-message"></div>
    </div>
    
    <hr>
    <h3>Đánh giá:</h3>
    <div id="review-list"></div>
    
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function () {
                const productId = $('.review-box').data('product-id');
                let selectedRating = 0;
        
                $('input[name="rating"]').on('change', function () {
                    selectedRating = $(this).val();
                });
        
                $('#submit-review').on('click', function () {
                    let comment = $('#comment').val();
        
                    if (!selectedRating) {
                        $('#review-message').text('Vui lòng chọn sao đánh giá!').css('color', 'red');
                        return;
                    }
                    if (!$('#reviewer_name').val()) {
                        $('#review-message').text('Vui lòng nhập tên của bạn!').css('color', 'red');
                        return;
                    }
        
                    $.ajax({
                        url: '{{ route("reviews.store") }}',
                        method: 'POST',
                        data: {
                           
                            name: $('#reviewer_name').val(),
                            product_id: productId,
                            rating: selectedRating,
                            comment: comment,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function (res) {
                            $('#review-message').text(res.message).css('color', 'green');
                            $('#comment').val('');
                            $('input[name="rating"]').prop('checked', false);
                            selectedRating = 0;
                            loadReviews();
                        },
                        error: function () {
                            $('#review-message').text('Có lỗi xảy ra!').css('color', 'red');
                        }
                    });
                });
        
                function loadReviews() {
                    $.get('/reviews/' + productId, function (res) {
                        $('#review-list').html('');
                        res.forEach(function (review) {
                            $('#review-list').append(`
                                <div class="single-review">
                                    <h5>${review.name}</h5>
                                    <div class="review-date">${new Date(review.created_at).toLocaleDateString()}</div>
                                    <div>${'★'.repeat(review.rating)}${'☆'.repeat(5 - review.rating)}</div>
                                    <div>${review.comment}</div>
                                    <hr>
                                </div>
                            `);
                        });
                    });
                }
        
                loadReviews();
            });
        </script>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/thongbao.js') }}"></script>
    @if(session('swal_success'))
    <meta name="swal-success" content='@json(session('swal_success'))'>
    @endif
    @if(session('swal_error'))
    <meta name="swal-error" content='@json(session('swal_error'))'>
    @endif
    <script>
    const maxStock =  {{$result->SoLuong }};
    const input = document.getElementById('soluong');
    const btn = document.getElementById('addToCartBtn');

    function checkStock() {
        if (parseInt(input.value) > maxStock) {
            btn.disabled = true;
            btn.textContent = 'Không đủ hàng';
            btn.classList.add('opacity-50', 'cursor-not-allowed');
        } else {
            btn.disabled = false;
            btn.textContent = 'Thêm vào giỏ hàng';
            btn.classList.remove('opacity-50', 'cursor-not-allowed');
        }
    }

    input.addEventListener('input', checkStock);
    // Gọi 1 lần khi load trang
    checkStock();
</script>
<script>
    function changeImage(element) {
      const mainImage = document.getElementById("mainImage");
      mainImage.src = element.src;
    }
  </script>
  
</body>
@endsection
</html>