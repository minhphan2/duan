<?php

namespace App\Http\Controllers;
use App\Models\ChiTietHoaDonModel;
use App\Models\HoaDonModel;
use Illuminate\Http\Request;
use App\Models\ProductsModel;
use App\Models\UserModel;
use App\Http\Controllers\GioHangController;

class HoaDon2Controller extends Controller
{
    public function getCartKey()
    {
        return auth()->check() ? 'cart_' . auth()->id() : 'cart_guest_' . session()->getId();
    }
    
    public function datHang(Request $request)
    {
        
        $cartKey = $this->getCartKey();
        $cart = session()->get($cartKey, []);

        if (empty($cart)) {
            return redirect()->back()->with('error', 'Giỏ hàng trống!');
        }

        $userId = auth()->id();

        // Tạo đơn hàng (bảng hoadon)
        $hoadon = new HoaDonModel();
        $hoadon->user_id = $userId;
        $hoadon->tong_tien = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);
        $hoadon->trang_thai = 'Chờ xác nhận'; 
        $hoadon->save();

        // Thêm từng chi tiết đơn hàng (bảng chitiethoadon)
        foreach ($cart as $item) {
              $ct = new ChiTietHoaDonModel();
            $ct->hoa_don_id = $hoadon->id; 
            $ct->product_id = $item['product_id'];
            $ct->so_luong = $item['quantity'];
            $ct->don_gia = $item['price'];
            $ct->save();
        }

        // Xóa giỏ hàng trong session
        session()->forget($cartKey);

        return redirect()->route('cart.view')->with('success', 'Đặt hàng thành công!');
    }
}
?>