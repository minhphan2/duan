<table>
    <thead>
        <tr>
            <th>Mã đơn</th>
            <th>Khách hàng</th>
            <th>Ngày</th>
            <th>Tổng tiền</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $don)
            <tr>
                <td>{{ $don->id }}</td>
                <td>{{ $don->ten_khach }}</td>
                <td>{{ $don->created_at }}</td>
                <td>{{ number_format($don->tong_tien) }} ₫</td>
            </tr>
        @endforeach
    </tbody>
</table>
