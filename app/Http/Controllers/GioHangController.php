<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\ProductsModel; // hoặc Product nếu bạn dùng tên khác

class GioHangController extends Controller
{
    public function themVaoGio(Request $request)
    {
        $productId = $request->input('product_id');
        $soluong = $request->input('soluong', 1);

        $product = ProductsModel::findOrFail($productId);

        $gioHang = session()->get('giohang', []);

        if (isset($gioHang[$productId])) {
            $gioHang[$productId]['soluong'] += $soluong;
        } else {
            $gioHang[$productId] = [
                'ten' => $product->ten,
                'gia' => $product->gia,
                'soluong' => $soluong,
                'hinhanh' => $product->hinhanh,
            ];
        }

        session(['giohang' => $gioHang]);

        return redirect()->back()->with('success', 'Đã thêm vào giỏ hàng!');
    }
}

?>