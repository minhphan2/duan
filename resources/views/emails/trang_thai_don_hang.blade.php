<!DOCTYPE html>
<html>
<head>
    <title>Thông báo trạng thái đơn hàng</title>
</head>
<body>
    <h2>Xin chào {{ $tenKhach }}!</h2>

    @if ($trangThai === 'Đang giao')
        <p>Đơn hàng của bạn hiện đang được giao. Vui lòng giữ điện thoại để nhận hàng!</p>
    @elseif ($trangThai === 'Hoàn tất')
        <p>Chúc mừng bạn đã nhận hàng thành công. Cảm ơn bạn đã mua sắm tại cửa hàng chúng tôi!</p>
    @elseif ($trangThai === 'Hủy')
        <p>Đơn hàng của bạn đã bị hủy. Vui lòng liên hệ với chúng tôi để biết thêm chi tiết.</p>
    @elseif ($trangThai === 'Đã xác nhận')
        <p>Đơn hàng của bạn đã được xác nhận. Vui lòng chờ đợi đơn hàng được giao.</p>
    @else
        <p>Trạng thái đơn hàng: {{ $trangThai }}</p>
    @endif
</body>
</html>
