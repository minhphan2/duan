<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>VTQ | Quản trị hóa đơn</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="{{ asset('admin/styles.css') }}" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
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
                                    <a class="nav-link" href="lien-he.php"> Liên hệ</a>                                                            
                                    <a class="nav-link" href="tro-giup.php">Trợ giúp</a>             
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
                    <h1 class="mt-4">Quản trị hóa đơn</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Bảng điều khiển</a></li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Danh sách khách hàng
                        </div>
                        <div class="card-body">
    <table id="datatablesSimple" class="table table-bordered table-hover text-center align-middle">
        <thead >
        <tr>
            <th class="border px-4 py-2">Mã HĐ</th>
            <th class="border px-4 py-2">Tên khách</th>
            <th class="border px-4 py-2">Số điện thoại</th>
            <th class="border px-4 py-2">Địa chỉ</th>
            <th class="border px-4 py-2">Tổng tiền</th>
            <th class="border px-4 py-2">Ghi chú</th>
            <th class="border px-4 py-2">Ngày tạo</th>
            <th class="border px-4 py-2">Trạng thái</th>
            <th class="border px-4 py-2">Thao tác</th>
            <th class="border px-4 py-2">Chuyển Trạng Thái</th>
        </tr>
    </thead>
    <tbody>
        @foreach($donhangs as $don)
        <tr>
            <td class="border px-4 py-2">{{ $don->id }}</td>
            <td class="border px-4 py-2">{{ $don->user->username }}</td>
            <td class="border px-4 py-2">{{ $don->user->phone }}</td>
            <td class="border px-4 py-2">{{ $don->dia_chi ?? $don->user->address }}</td>
            <td class="border px-4 py-2">{{ number_format($don->tong_tien) }}₫</td>
            <td class="border px-4 py-2">{{ $don->note }}</td>
            <td class="border px-4 py-2">{{ $don->created_at }}</td>
            <td class="border px-4 py-2">{{ $don->trang_thai }}</td>
             <td class="border px-4 py-2">
        <a href="{{ route('admin.donhang.chitiet', ['id' => $don->id]) }}" class="bg-blue-500 hover:bg-blue-600 text-black font-bold py-1 px-3 rounded">
            Xem chi tiết
        </a>
    </td>
            <td class="border px-4 py-2">
                <form action="{{ route('admin.donhang.trangthai', $don->id) }}" method="POST">
    @csrf
    <select name="trang_thai" class="border p-1 rounded">
        <option value="Chờ xác nhận" {{ $don->trang_thai === 'Chờ xác nhận' ? 'selected' : '' }}>Chờ xác nhận</option>
        <option value="Đã xác nhận" {{ $don->trang_thai === 'Đã xác nhận' ? 'selected' : '' }}>Đã xác nhận</option>
        <option value="Đang giao" {{ $don->trang_thai === 'Đang giao' ? 'selected' : '' }}>Đang giao</option>
        <option value="Hoàn tất" {{ $don->trang_thai === 'Hoàn tất' ? 'selected' : '' }}>Hoàn tất</option>
    </select>
    <button type="submit" class="ml-2 px-2 py-1 bg-blue-500 text-black rounded">Cập nhật</button>
</form>
            </td>
        </tr>
        @endforeach
    </tbody>
    </table>
</div>
                    </div>
                </div>
            </main>
              <footer  class="py-4 bg-light mt-auto" >
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Bản Quyền &copy; Trang Web của bạn 2021</div>
                            <div>
                                <a href="chinhsachbaomat.php">Chính sách bảo mật</a>
                                &middot;
                                <a href="chinhsachbaomat.php">Điều khoản và điều kiện</a>
                            </div>
                        </div>
                    </div>
                </footer>
          
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('admin/scripts.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest"></script>
    <script src="{{ asset('admin/datatables-simple-demo.js') }}"></script>
</body>
</html>