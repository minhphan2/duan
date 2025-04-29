<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="./images/logo_cake_1-removebg-preview.png" type = "image/x-icon"> <!--FAVICON-->
        <title>Đăng nhập / Đăng ký</title>
        <link rel="stylesheet" href="{{ asset('css/root.css') }}">
<link rel="stylesheet" href="{{ asset('css/header.css') }}">
<link rel="stylesheet" href="{{ asset('css/dangnhap.css') }}">


    <!-- link font logo -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pattaya&display=swap" rel="stylesheet">
    </head>
    <body>
        <header>        
        </header>
        <!-- Tìm kiếm -->

        </script>
        <div class="body">
        <div class="container" id="container">

            @if(session('success'))
            <p style="color: green;">{{ session('success') }}</p>
            @endif
            @if(session('error'))
            <p style="color: red;">{{ session('error') }}</p>
            @endif

            <div class="form-container register-container">
            <form action="{{ route('dangky') }}" method="POST">
                @csrf
                <h1>Đăng kí </h1>

                <input type="text" name="username" placeholder="Name">
                <input type="email" name="email" placeholder="Email">
                <input type="password" name="password" placeholder="Password">
                
                <div class="g-recaptcha" data-sitekey="{{env('CAPTCHA_KEY')}}"></div>
                <br/>
                @if($errors->has('g-recaptcha-response'))
                    <span class="invalid-feedback" style="display: block;">
                       <strong>{{ $errors->first('g-recaptcha-response') }}</strong> 
                    </span>
                @endif

                <button name="nutdangky">Đăng kí</button>
                <span>Hoặc sử dụng tài khoản của bạn</span>
                <div class="social-container"> 
                    <a href="{{route('auth.facebook')}}" class="social"><svg class="register" xmlns="http://www.w3.org/2000/svg" height="25" width="25" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#005eff" d="M512 256C512 114.6 397.4 0 256 0S0 114.6 0 256C0 376 82.7 476.8 194.2 504.5V334.2H141.4V256h52.8V222.3c0-87.1 39.4-127.5 125-127.5c16.2 0 44.2 3.2 55.7 6.4V172c-6-.6-16.5-1-29.6-1c-42 0-58.2 15.9-58.2 57.2V256h83.6l-14.4 78.2H287V510.1C413.8 494.8 512 386.9 512 256h0z"/></svg></a>       
                    <a href="{{route('auth.google')}}" class="social"><svg class="register" xmlns="http://www.w3.org/2000/svg" height="25" width="24.34375" viewBox="0 0 488 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#e88617" d="M488 261.8C488 403.3 391.1 504 248 504 110.8 504 0 393.2 0 256S110.8 8 248 8c66.8 0 123 24.5 166.3 64.9l-67.5 64.9C258.5 52.6 94.3 116.6 94.3 256c0 86.5 69.1 156.6 153.7 156.6 98.2 0 135-70.4 140.8-106.9H248v-85.3h236.1c2.3 12.7 3.9 24.9 3.9 41.4z"/></svg></a>       
                </div>
            </form>
        </div>







        <div class="form-container login-container">
            <form action="{{ route('dangnhap') }}" method="POST">
                @csrf
                <h1>Đăng nhập </h1>        

                <input type="email" name="email" placeholder="Email">
                <input type="password" name="password" placeholder="Password">
                <div class="content">
                    <div class="checkbox">
                        <input type="checkbox" name="checkbox" id="checkbox">
                        <label >Nhớ tài khoản</label>
                    </div>
                    <div class="pass-link">
                        <a href="">Quên mật khẩu</a>
                    </div>
                </div> 
                
                <div class="g-recaptcha" data-sitekey="{{env('CAPTCHA_KEY')}}"></div>
                <br/>
                @if($errors->has('g-recaptcha-response'))
                    <span class="invalid-feedback" style="display: block;">
                       <strong>{{ $errors->first('g-recaptcha-response') }}</strong> 
                    </span>
                @endif

                <button name="nutdangnhap">Đăng nhập</button>
                <span>Hoặc sử dụng tài khoản của bạn</span>
                <div class="social-container">
                    <a href="{{route('auth.facebook')}}" class="social"><svg class="login" xmlns="http://www.w3.org/2000/svg" height="25" width="25" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#005eff" d="M512 256C512 114.6 397.4 0 256 0S0 114.6 0 256C0 376 82.7 476.8 194.2 504.5V334.2H141.4V256h52.8V222.3c0-87.1 39.4-127.5 125-127.5c16.2 0 44.2 3.2 55.7 6.4V172c-6-.6-16.5-1-29.6-1c-42 0-58.2 15.9-58.2 57.2V256h83.6l-14.4 78.2H287V510.1C413.8 494.8 512 386.9 512 256h0z"/></svg></a>       
                    <a href="{{route('auth.google')}}" class="social"><svg class="login" xmlns="http://www.w3.org/2000/svg" height="25" width="24.34375" viewBox="0 0 488 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#e88617" d="M488 261.8C488 403.3 391.1 504 248 504 110.8 504 0 393.2 0 256S110.8 8 248 8c66.8 0 123 24.5 166.3 64.9l-67.5 64.9C258.5 52.6 94.3 116.6 94.3 256c0 86.5 69.1 156.6 153.7 156.6 98.2 0 135-70.4 140.8-106.9H248v-85.3h236.1c2.3 12.7 3.9 24.9 3.9 41.4z"/></svg></a>       
            
                </div>
            </form>
          
        
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1 class="title">Hello <br>Friends</h1>
                    <p>Nếu bạn đã có tài khoản, đăng nhập tại đây và mua sắm</p>
                    <button class="ghost" id="login">Đăng nhập
                        <svg class="login" xmlns="http://www.w3.org/2000/svg" height="14" width="12.25" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/></svg>
                    </button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1 class="title">Bắt đầu <br> mua sắm ngay</h1>
                    <p>Nếu bạn chưa có tài khoản, hãy đăng kí</p>
                    <button class="ghost"id="register">Đăng kí
                        <svg class="register" xmlns="http://www.w3.org/2000/svg" height="14" width="12.25" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"/></svg>                </button>

                </div>
        </div>
    </div>
    </div>
    </div>
    <script src="{{ asset('js/header.js') }}"></script>
    <script src="{{ asset('js/dangnhap.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    </body>
    </html>