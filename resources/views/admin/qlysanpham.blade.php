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
                        <h1 class="mt-4">Quản trị sản phẩm</h1>
                        <div id="loadingIndicator" style="display: none; text-align: center; padding: 20px;">
                            <div class="spinner-border text-primary" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Bảng điều khiển</a></li>
</ol>
<div class="row mb-3">
    <div class="col-md-3">
        <select id="sortBy" class="form-select">
            <option value="">Sắp xếp theo</option>
            <option value="price_asc">Giá tăng dần</option>
            <option value="price_desc">Giá giảm dần</option>
            <option value="name_asc">Tên A-Z</option>
            <option value="name_desc">Tên Z-A</option>
            <option value="quantity_asc">Số lượng tăng dần</option>
            <option value="quantity_desc">Số lượng giảm dần</option>
        </select>
    </div>
    <div class="col-md-3">
        <select id="filterCategory" class="form-select">
            <option value="">Tất cả loại</option>
            <option value="BSN">Bánh sinh nhật</option>
            <option value="BNE">Bánh nửa Entremet</option>
            <option value="PKB">Phụ kiện bánh</option>
        </select>
    </div>
    <div class="col-md-6">
        <div class="input-group">
            <input type="text" id="searchInput" class="form-control" placeholder="Tìm kiếm sản phẩm...">
            <button class="btn btn-primary" type="button" id="searchBtn">
                <i class="fas fa-search"></i>
            </button>
        </div>
    </div>
</div>

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Danh sách sản phẩm | 
        <a href="{{route('sanpham.formthem')}}">Thêm mới</a> 
    </div>
    <div class="card-body" id="productTable">
        <table id="datatablesSimple" class="table table-bordered table-hover text-center align-middle">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Hình 1</th>
                    <th>Hình 2</th>
                    <th>Hình 3</th>
                    <th>Tên sản phẩm</th>
                    <th>Mã loại</th>
                    <th>Đơn giá</th>
                    <th>Số lượng</th>
                    <th>Tình trạng</th>
                    <th>Mô tả</th>
                    <th>Giảm giá</th>
                    <th>Sửa</th>
                    <th>Xoá</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($result as $index => $sp)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>
                        <img src="{{ asset('uploads/' . $sp->HinhAnh) }}" width="80" height="80" style="object-fit: cover; border-radius: 6px;" alt="Ảnh SP">
                    </td>
                    <td>
                @if ($sp->HinhAnh2)
                    <img src="{{ asset('uploads/' .$sp->HinhAnh2) }}" width="80" height="80" style="object-fit: cover;" alt="Ảnh 2">
                @else
                    Không có
                @endif
            </td>
            <td>
                @if ($sp->HinhAnh3)
                    <img src="{{ asset('uploads/' .$sp->HinhAnh3) }}" width="80" height="80" style="object-fit: cover;" alt="Ảnh 3">
                @else
                    Không có
                @endif
            </td>
                    <td>{{ $sp->TenSP }}</td>
                    <td>{{ $sp->Loaisp }}</td>
                    <td>{{ number_format($sp->Gia, 0, ',', '.') }}đ</td>
                    <td>{{ $sp->SoLuong }}</td>
                    <td>
                        @if($sp->SoLuong == 0)
                        <span style="color: red; font-weight: bold;">Hết hàng</span>
                    @elseif($sp->SoLuong < 5)
                        <span style="color: orange; font-weight: bold;">Sắp hết</span>
                    @else
                        <span style="color: green;">Còn hàng</span>
                    @endif
                    </td>
                    <td style="max-width: 200px;">{{ Str::limit($sp->MoTa, 100) }}</td>
                    <td>{{ $sp->giam_gia }}%</td>
                    <td><a href="{{ route('sanpham.edit', $sp->MaSP) }}" class="btn btn-warning btn-sm">Sửa</a></td>
                    <td> <form action="{{ route('sanpham.delete', $sp->MaSP) }}" method="POST" style="display:inline-block" onsubmit="return confirm('Bạn có chắc muốn xóa?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm">Xoá</button>
        </form></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div id="noResults" style="display: none; text-align: center; padding: 20px;">
            <p class="text-muted">Không tìm thấy sản phẩm nào phù hợp với điều kiện tìm kiếm.</p>
        </div>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
    <script src="{{ asset('assets/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('assets/demo/chart-bar-demo.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest"></script>
    <script src="{{ asset('admin/datatables-simple-demo.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    function loadProducts() {
        $('#loadingIndicator').show();
        $.ajax({
            url: '{{ route("admin.products.load") }}',
            type: 'GET',
            data: {
                sort: $('#sortBy').val(),
                category: $('#filterCategory').val(),
                search: $('#searchInput').val()
            },
            success: function(response) {
                $('#productTable').html(response);
                $('#loadingIndicator').hide();
                if($('#productTable table tbody tr').length === 0) {
                    $('#noResults').show();
                } else {
                    $('#noResults').hide();
                }
            },
            error: function() {
                alert('Có lỗi xảy ra khi tải dữ liệu!');
                $('#loadingIndicator').hide();
            }
        });
    }

    // Load sản phẩm khi trang được tải
    loadProducts();

    // Xử lý sự kiện thay đổi
    $('#sortBy, #filterCategory').change(function() {
        loadProducts();
    });

    // Xử lý tìm kiếm
    $('#searchBtn').click(function() {
        loadProducts();
    });

    // Tìm kiếm khi nhấn Enter
    $('#searchInput').keypress(function(e) {
        if(e.which == 13) {
            loadProducts();
        }
    });

    // Thêm debounce cho ô tìm kiếm
    let searchTimeout;
    $('#searchInput').on('input', function() {
        clearTimeout(searchTimeout);
        searchTimeout = setTimeout(function() {
            loadProducts();
        }, 500);
    });
});
</script>
    </body>
</html>

