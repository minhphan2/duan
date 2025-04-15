<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>VTQ Bakery</title>
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/root.css') }}">
    
    @yield('head')
</head>
<body>
    {{-- HEADER --}}
    @include('viewphu.header')

    {{-- Tìm kiếm --}}

    {{-- Nội dung chính --}}
    <div class="main">
        @yield('content')
    </div>

</body>
</html>
