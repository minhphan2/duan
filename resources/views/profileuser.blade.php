<!DOCTYPE html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{asset('/images/logo_cake_1-removebg-preview.png')}}" type = "image/x-icon"> <!--FAVICON-->
    <title>Thông tin cá nhân</title>
<link rel="stylesheet" href="{{ asset('css/profile.css') }}">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link rel="icon" href="./images/logo_cake_1-removebg-preview.png" type = "image/x-icon"> <!--FAVICON-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script src="{{ asset('js/thongbao.js') }}"></script>
@if(session('swal_success'))
    <meta name="swal-success" content='@json(session('swal_success'))'>
@endif
@if(session('swal_error'))
    <meta name="swal-error" content='@json(session('swal_error'))'>
@endif
</head>

@extends('layout.app')

@section('content')
<body>


<div class="container" style="padding-top: 100px;">
    <h2 style="font-size: 30px; font-weight: bold; font-family: 'Signika', serif; color: #694922;">Chỉnh sửa thông tin cá nhân</h2>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))<div class="alert alert-danger">{{ session('error') }}</div>
@endif
    <form action="{{ route('profile.update') }}" method="POST">
        @csrf
        
        <div class="mb-3">
            <label for="name" class="form-label" style="font-size: 20px; font-weight: bold; font-family: 'Signika', serif; color: #694922;">Tên</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', Auth::user()->username) }}">
            @error('name') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
    <label for="phone" class="form-label" style="font-size: 20px; font-weight: bold; font-family: 'Signika', serif; color: #694922;">Số điện thoại</label>
    <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone', Auth::user()->phone) }}">
    @error('phone') <div class="text-danger">{{ $message }}</div> @enderror
</div>
<div class="mb-3">
    <label for="address" class="form-label" style="font-size: 20px; font-weight: bold; font-family: 'Signika', serif; color: #694922;">Địa chỉ</label>
    <input type="text" name="address" id="address" class="form-control" value="{{ old('address', Auth::user()->address) }}">
    @error('address') <div class="text-danger">{{ $message }}</div> @enderror
</div>
        <div class="mb-3">
            <label for="email" class="form-label" style="font-size: 20px; font-weight: bold; font-family: 'Signika', serif; color: #694922;">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', Auth::user()->email) }}">
            @error('email') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <!-- Thêm các trường khác nếu muốn -->
        <button type="submit" class="btn btn-primary" style="font-size: 20px; font-weight: bold; font-family: 'Signika', serif;">Cập nhật</button>
    </form>
<hr style="border: 1px solid #694922; margin: 20px 0;">
 
<h2 style="font-size: 30px; font-weight: bold; font-family: 'Signika', serif; color: #694922;">Đổi mật khẩu</h2>
@if(session('password_success'))
    <div class="alert alert-success">{{ session('password_success') }}</div>
@endif
@if(session('password_error'))
    <div class="alert alert-danger">{{ session('password_error') }}</div>
@endif
<form action="{{ route('profile.password') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="current_password" class="form-label" style="font-size: 20px; font-weight: bold; font-family: 'Signika', serif; color: #694922;">Mật khẩu hiện tại</label>
        <input type="password" name="current_password" id="current_password" class="form-control">
        @error('current_password') <div class="text-danger">{{ $message }}</div> @enderror
    </div>
    <div class="mb-3">
        <label for="new_password" class="form-label" style="font-size: 20px; font-weight: bold; font-family: 'Signika', serif; color: #694922;">Mật khẩu mới</label>
        <input type="password" name="new_password" id="new_password" class="form-control">
        @error('new_password') <div class="text-danger">{{ $message }}</div> @enderror
    </div>
    <div class="mb-3">
        <label for="new_password_confirmation" class="form-label" style="font-size: 20px; font-weight: bold; font-family: 'Signika', serif; color: #694922;">Nhập lại mật khẩu mới</label>
        <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="form-control">
        @error('new_password_confirmation') <div class="text-danger">{{ $message }}</div> @enderror
    </div>
    <button type="submit" class="btn btn-warning" style="font-size: 20px; font-weight: bold; font-family: 'Signika', serif;">Đổi mật khẩu</button>
</form>
   
</div>


</body>
@endsection
</html>
