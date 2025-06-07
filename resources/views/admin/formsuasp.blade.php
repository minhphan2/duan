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
                            <a class="nav-link" href="tintuc.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-newspaper"></i></div>
                                    Quản trị tin tức
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
                            <a class="nav-link" href="khachhang.php">
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
                            <a class="nav-link" href="binhluan.php">
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
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header">
                            <h3 class="text-center font-weight-light my-4">Cập nhật sản phẩm</h3>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('sanpham.update', $sp->MaSP) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="form-floating mb-3">
                                    <input class="form-control" id="ten_san_pham" name="ten_san_pham" type="text"
                                        value="{{ old('ten_san_pham', $sp->TenSP) }}" />
                                    <label for="ten_san_pham">Tên Sản Phẩm</label>
                                </div>

                                <div class="form-floating mb-3">
        <select name="ma_loai" class="form-control" id="ma_loai">
        <option value="PKB" {{ $sp->LoaiSP == 'PKB' ? 'selected' : '' }}>Phụ Kiện Bánh</option>
        <option value="BNE" {{ $sp->LoaiSP == 'BNE' ? 'selected' : '' }}>Bánh Nửa Etremet</option>
        <option value="BSN" {{ $sp->LoaiSP == 'BSN' ? 'selected' : '' }}>Bánh Sinh Nhật</option>
    </select>
    <label for="ma_loai">Loại Sản Phẩm</label>
</div>

                                <div class="form-floating mb-3">
                                    <input class="form-control" name="so_luong" id="so_luong" type="number"
                                        value="{{ old('so_luong', $sp->SoLuong) }}" />
                                    <label for="so_luong">Số Lượng</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input class="form-control" name="don_gia" id="don_gia" type="number"
                                        value="{{ old('don_gia', $sp->Gia) }}" />
                                    <label for="don_gia">Đơn Giá</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input class="form-control" type="file" name="hinh1" id="hinh1" />
                                    <label for="hinh1">Hình ảnh 1</label>
                                    @if($sp->HinhAnh)
                                        <p>Ảnh hiện tại: <img src="{{ asset('uploads/' . $sp->HinhAnh) }}" width="80"></p>
                                    @endif
                                </div>

                                <div class="form-floating mb-3">
                                    <input class="form-control" type="file" name="hinh2" id="hinh2" />
                                    <label for="hinh2">Hình ảnh 2</label>
                                    @if($sp->HinhAnh2)
                                        <p>Ảnh hiện tại: <img src="{{ asset('uploads/' . $sp->HinhAnh2) }}" width="80"></p>
                                    @endif
                                </div>

                                <div class="form-floating mb-3">
                                    <input class="form-control" type="file" name="hinh3" id="hinh3" />
                                    <label for="hinh3">Hình ảnh 3</label>
                                    @if($sp->HinhAnh3)
                                        <p>Ảnh hiện tại: <img src="{{ asset('uploads/' . $sp->HinhAnh3) }}" width="80"></p>
                                    @endif
                                </div>

                                <div class="form-floating mb-3">
                                    <textarea class="form-control" name="mo_ta" id="mo_ta" style="height: 100px">{{ old('mo_ta', $sp->MoTa) }}</textarea>
                                    <label for="mo_ta">Mô Tả</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input class="form-control" name="giam_gia" id="giam_gia" type="number"
                                        value="{{ old('giam_gia', $sp->giam_gia) }}" />
                                    <label for="giam_gia">Giảm giá</label>
                                </div>

                                <div class="mt-4 mb-0">
                                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                                    <a href="{{ route('admin.qlysanpham') }}" class="btn btn-secondary">Hủy</a>
                                </div>
                            </form>
                        </div>
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
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('admin/scripts.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            // Hiển thị thông báo thành công
            @if(session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Thành công!',
                    text: '{{ session('success') }}',
                });
            @endif

            // Hiển thị thông báo lỗi chung
            @if(session('error'))
                Swal.fire({
                    icon: 'error',
                    title: 'Lỗi!',
                    text: '{{ session('error') }}',
                });
            @endif

            // Hiển thị lỗi validation
            @if($errors->any())
                let errorMessages = '';
                @foreach ($errors->all() as $error)
                    errorMessages += '{{ $error }}<br>';
                @endforeach
                Swal.fire({
                    icon: 'error',
                    title: 'Lỗi dữ liệu đầu vào!',
                    html: errorMessages,
                });
            @endif
        });
        </script>

</body>
</html>
