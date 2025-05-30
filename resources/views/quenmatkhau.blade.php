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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('js/thongbao.js') }}"></script>
@if(session('swal_success'))
    <meta name="swal-success" content='@json(session('swal_success'))'>
@endif
@if(session('swal_error'))
    <meta name="swal-error" content='@json(session('swal_error'))'>
@endif
</body>