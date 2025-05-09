<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Chi tiết sản phẩm</title>
</head>
<body>

    <h2>{{ $result->TenSP }}</h2>

    <img src="{{ asset('uploads/' . $result->HinhAnh) }}" width="250" alt="{{ $result->TenSP }}">

    <p>Giá: {{ number_format($result->Gia) }} VNĐ</p>
    <p>Mô tả: {{ $result->MoTa }}</p>

    <form action="{{ route('giohang.them') }}" method="POST">
        @csrf
        <input type="hidden" name="product_id" value="{{ $result->MaSP }}">
        <label for="soluong">Số lượng:</label>
        <input type="number" name="soluong" value="1" min="1">
        <button type="submit">Thêm vào giỏ hàng</button>
    </form>

</body>
</html>
