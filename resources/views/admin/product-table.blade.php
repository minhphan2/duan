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
        @foreach ($products as $index => $sp)
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
            <td>
                <form action="{{ route('sanpham.delete', $sp->MaSP) }}" method="POST" style="display:inline-block" onsubmit="return confirm('Bạn có chắc muốn xóa?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Xoá</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>