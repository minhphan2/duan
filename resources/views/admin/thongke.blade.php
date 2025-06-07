<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>VTQ | Quản trị hệ thống</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="{{ asset('admin/styles.css') }}" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand ps-3" href="{{ route('admin.dashboard') }}">VTQ Bakery</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle"><i class="fas fa-bars"></i></button>

        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="form-control">
                {{ Auth::guard('admin')->user()->name ?? 'Admin' }}
            </div>
        </form>

        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li>
                        <form action="{{ route('admin.logout') }}" method="POST">
                            @csrf
                            <button class="dropdown-item" type="submit">Đăng xuất</button>
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
        <div id="layoutSidenav">
        <div id="layoutSidenav_nav" >
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Hệ thống</div>
                            <a class="nav-link" href="{{ route('admin.dashboard') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Bảng điều khiển
                            </a>                           
                            <a class="nav-link collapsed" href="nguoidung.php" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                                Quản trị người dùng
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseOne" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link" href="nguoidung.php"> Người dùng</a>   
                                    <a class="nav-link" href="dangky.php">  Đăng Ký</a>
                                    <a class="nav-link" href="dangxuat.php">Đăng Xuất</a>                                   
                                </nav>
                            </div>
                           <a class="nav-link" href="{{ route('admin.thongke') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-newspaper"></i></div>
                                    Thống kê doanh thu
                            </a>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                <div class="sb-nav-link-icon"><i class="fas fa-archive"></i></div>
                                Quản trị sản phẩm
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseTwo" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link" href="{{route('admin.qlysanpham')}}"> Sản phẩm</a>                                                            
                                </nav>
                            </div>
                            <a class="nav-link" href="{{route('admin.qlykhachhang')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                Quản trị khách hàng
                            </a>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                <div class="sb-nav-link-icon"><i class="fas fa-shopping-cart"></i></div>
                                Quản trị bán hàng
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseThree" aria-labelledby="headingThree" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link" href="{{route('admin.qlydonhang')}}"> Hoá đơn</a>                                                                                        
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                <div class="sb-nav-link-icon"><i class="fas fa-edit"></i></div>
                                Quản trị yêu cầu
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseFour" aria-labelledby="headingFour" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link" href="{{route('admin.qlyhotro')}}"> Liên hệ</a> 
                                <a class="nav-link" href="{{route('admin.qlytuyendung')}}">Tuyển dụng</a>           
                                </nav>
                            </div>
                            <a class="nav-link" href="{{ route('admin.qlybinhluan') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-comments"></i></div>
                                Quản trị bình luận
                            </a>                                                     
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Đã đăng nhập</div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Thống kê</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Bảng điều khiển</a></li>
</ol>


    <h2 class="text-xl font-bold mb-4">Thống kê doanh thu</h2>
    <form method="GET" action="{{ route('admin.thongke') }}" class="mb-4 flex gap-2">
    <label>
        Từ ngày: <input type="date" name="start_date" value="{{ $start }}" class="border rounded px-2 py-1">
    </label>
    <label>
        Đến ngày: <input type="date" name="end_date" value="{{ $end }}" class="border rounded px-2 py-1">
    </label>
    <button type="submit" class="bg-blue-500 text-black px-4 py-1 rounded">Lọc</button>
</form>

    <!-- Tổng doanh thu -->
    <div class="bg-green-100 text-green-800 p-4 rounded mb-6">
        <strong>Tổng doanh thu:</strong> {{ number_format($doanhThu, 0, ',', '.') }} đ
    </div>

    <!-- Biểu đồ doanh thu theo ngày -->
    <canvas id="doanhThuChart" height="100"></canvas>

    <!-- Top sản phẩm bán chạy -->
    <h3 class="mt-8 text-lg font-semibold">Top sản phẩm bán chạy</h3>
    <table class="table-auto w-full border mt-2">
        <thead>
            <tr>
                <th class="border px-2 py-1">Tên sản phẩm</th>
                <th class="border px-2 py-1">Số lượng đã bán</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sanPhamBanChay as $item)
                <tr>
                    <td class="border px-2 py-1">{{ $item['product']->TenSP?? 'N/A' }}</td>
                    <td class="border px-2 py-1">{{ $item['tong_so_luong'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Top khách hàng mua nhiều -->
    <h3 class="mt-8 text-lg font-semibold">Top khách hàng mua nhiều</h3>
    <table class="table-auto w-full border mt-2">
        <thead>
            <tr>
                <th class="border px-2 py-1">Tên khách hàng</th>
                <th class="border px-2 py-1">Tổng chi tiêu</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($khachHangMuaNhieu as $item)
                <tr>
                    <td class="border px-2 py-1">{{ $item['user']->username ?? 'N/A' }}</td>
                    <td class="border px-2 py-1">{{ number_format($item['tong_chi_tieu'], 0, ',', '.') }} đ</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <br>
    <br>
    <a href="{{ route('xuat.excel') }}" class="btn btn-success" style="color: white;">Xuất Excel</a>

</div>
<footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex justify-content-between small">
                        <div class="text-muted">Bản quyền &copy; Trang Web của bạn 2025</div>
                        <div>
                            <a href="#">Chính sách bảo mật</a>
                            &middot;
                            <a href="#">Điều khoản</a>
                        </div>
                    </div>
                </div>
            </footer>
                </main>
            </div>
<script src="{{ asset('admin/scripts.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('doanhThuChart').getContext('2d');
    const chart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: {!! json_encode($doanhThuTheoNgay->keys()) !!},
            datasets: [{
                label: 'Doanh thu theo ngày',
                data: {!! json_encode($doanhThuTheoNgay->values()) !!},
                borderColor: 'rgba(75, 192, 192, 1)',
                tension: 0.3,
                fill: false
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return value.toLocaleString('vi-VN') + ' đ';
                        }
                    }
                }
            }
        }
    });
</script>