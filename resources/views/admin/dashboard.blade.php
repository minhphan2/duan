{{-- filepath: resources/views/admin/index.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>VTQ | Quản trị hệ thống</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="{{ asset('admin/styles.css') }}" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('admin/scripts.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
    <script src="{{ asset('assets/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('assets/demo/chart-bar-demo.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest"></script>
    <script src="{{ asset('admin/datatables-simple-demo.js') }}"></script>
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
                    <h1 class="mt-4">Quản Lí Cửa Hàng</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Trang quản trị hệ thống</li>
                    </ol>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Danh Sách Quản Lí</li>
                    </ol>
                    <h3>Phân Mục Khách Hàng</h3>
                    <br>
                    <div class="row">
                        <div class="col-xl-3 col-md-6" >
                            <div class="card bg-danger text-white mb-4" >
                                <div class="card-body">Khách Hàng</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="{{route('admin.qlykhachhang')}}">Chi Tiết</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                    <h3>Phân Mục Bán Hàng</h3>
                    <br><br>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-secondary text-white mb-4">
                                <div class="card-body">Hóa Đơn</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="{{route('admin.qlydonhang')}}">Chi Tiết</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>                            
                    <h3>Phân Mục Sản Phẩm</h3>
                    <br><br>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-primary text-white mb-4">
                                <div class="card-body">Sản Phẩm</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="{{route('admin.qlysanpham')}}">Chi Tiết</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                    <h3>Phân Mục Yêu Cầu</h3>
                    <br><br>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-info text-white mb-4">
                                <div class="card-body">Liên Hệ</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="{{route('admin.qlyhotro')}}">Chi Tiết</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-danger text-white mb-4">
                                <div class="card-body">Tuyển Dụng</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="{{route('admin.qlytuyendung')}}">Chi Tiết</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                    <h3>Phân Mục Khác</h3>
                    <br><br>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-success text-white mb-4">
                                <div class="card-body">Bình luận</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="{{route('admin.qlybinhluan')}}">Chi Tiết</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                </div>
            </main>
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
        </div>
    </div>

</body>
</html>
