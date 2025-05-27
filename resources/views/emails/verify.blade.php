<h3>Chào {{ $user->username }},</h3>
<p>Bạn vừa đăng ký tài khoản. Vui lòng bấm vào liên kết bên dưới để xác nhận:</p>
<a href="{{ route('verify.email', ['token' => $user->verify_token]) }}">Xác nhận Email</a>