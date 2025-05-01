<body>
<form action="{{ route('password.email') }}" method="POST">
    @csrf
    <h2>Quên mật khẩu</h2>

    <input type="email" name="email" placeholder="Email" required>
    
    @if ($errors->any())
        <div style="color:red">{{ $errors->first() }}</div>
    @endif

    <button type="submit">Gửi mã</button>
</form>
</body>