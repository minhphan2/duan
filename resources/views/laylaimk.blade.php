<form action="{{ route('password.update') }}" method="POST">
    @csrf
    <h2>Nhập mã và mật khẩu mới</h2>

    <input type="email" name="email" placeholder="Email" required>
    <input type="text" name="token" placeholder="Mã xác nhận" required>
    <input type="password" name="password" placeholder="Mật khẩu mới" required>
    <input type="password" name="password_confirmation" placeholder="Xác nhận mật khẩu mới" required>

    @if ($errors->any())
        <div style="color:red">{{ $errors->first() }}</div>
    @endif

    <button type="submit">Đặt lại mật khẩu</button>
</form>
