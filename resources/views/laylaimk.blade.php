<form action="{{ route('password.update') }}" method="POST">
    @csrf
    <h2>Nhập mã và mật khẩu mới</h2>

    <input type="email" name="email" value="{{ request('email') }}" readonly>
    <input type="text" name="token" placeholder="Mã xác nhận" required>
    <input type="password" name="password" placeholder="Mật khẩu mới" required>
    <input type="password" name="password_confirmation" placeholder="Xác nhận mật khẩu mới" required>

    @if ($errors->any())
        <div style="color:red">{{ $errors->first() }}</div>
    @endif

    <button type="submit">Đặt lại mật khẩu</button>
</form>
<!-- Thêm vào phần head hoặc cuối body -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Thêm đoạn code này vào cuối file, trước thẻ đóng body -->
@if(session('swal_success'))
<script>
    Swal.fire({
        title: '{{ session('swal_success')['title'] }}',
        text: '{{ session('swal_success')['text'] }}',
        icon: '{{ session('swal_success')['icon'] }}',
        confirmButtonText: 'OK',
        confirmButtonColor: '#3085d6'
    });
</script>
@endif

@if(session('swal_error'))
<script>
    Swal.fire({
        title: '{{ session('swal_error')['title'] }}',
        text: '{{ session('swal_error')['text'] }}',
        icon: '{{ session('swal_error')['icon'] }}',
        confirmButtonText: 'OK',
        confirmButtonColor: '#d33'
    });
</script>
@endif