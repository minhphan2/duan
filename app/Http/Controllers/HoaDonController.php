<?php
namespace App\Http\Controllers; 

use Illuminate\Http\Request;
use App\Models\HoaDonModel;
use App\Models\ChiTietHoaDonModel;

class HoaDonController extends Controller
{
    public function getCartKey()
    {
        return auth()->check() ? 'cart_' . auth()->id() : 'cart_guest_' . session()->getId();
    }

    public function datHang(Request $request)
    {
        // Lấy giỏ hàng từ session
        $cartKey = $this->getCartKey();
        $cart = session()->get($cartKey, []);

        if (empty($cart)) {
            return redirect()->back()->with('error', 'Giỏ hàng trống!');
        }

        // Tạo hóa đơn
        $hoadon = new HoaDonModel();
        $hoadon->user_id = auth()->id();
        $hoadon->tong_tien = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);
        $hoadon->trang_thai = 'Chờ xác nhận';
        $hoadon->save();

        // Lưu chi tiết hóa đơn
        foreach ($cart as $id => $item) {
          
    ChiTietHoaDonModel::create([
        'hoa_don_id' => $hoadon->id,
        'product_id' => $id,
        'so_luong' => $item['quantity'],
        'don_gia' => $item['price'],
            ]);
 
        }
        // Xóa giỏ hàng
        session()->forget($cartKey);

        return redirect()->route('cart.show')->with('success', 'Đặt hàng thành công!');
    }

 public function indexchoquanly()
{
    $donhangs = HoaDonModel::with('user')->orderByDesc('created_at')->get();

    return view('admin.qlydonhang', compact('donhangs'));
}

}

?>