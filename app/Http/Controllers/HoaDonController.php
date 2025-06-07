<?php
namespace App\Http\Controllers; 

use Illuminate\Http\Request;
use App\Models\HoaDonModel;
use App\Models\ChiTietHoaDonModel;
use Illuminate\Support\Facades\Mail;
use App\Mail\ThongBaoTrangThaiDonHangMail;

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

public function showDonHang($id)
{
    $donhang = HoaDonModel::with(['user', 'chiTietHoaDons.product'])->findOrFail($id);

    return view('admin.chitietdonhang', compact('donhang'));


}

public function capNhatTrangThai(Request $request, $id)
{
    $trangThaiMoi = $request->trang_thai;

    // Load đơn hàng kèm chi tiết và sản phẩm
    $donhang = HoaDonModel::with('chiTietHoaDons.product')->findOrFail($id);

    // Lưu trạng thái cũ để kiểm tra
    $trangThaiCu = $donhang->trang_thai;
    // Thêm kiểm tra tính hợp lệ của việc chuyển đổi trạng thái
    if (!$this->isValidStatusTransition($trangThaiCu, $trangThaiMoi)) {
        return redirect()->back()->with('error', 'Không thể chuyển từ trạng thái "' . $trangThaiCu . '" sang "' . $trangThaiMoi . '"!');
    }

    // Nếu chuyển sang trạng thái Hủy
    if ($trangThaiMoi === 'Hủy' && $trangThaiCu !== 'Hủy') {
        // Cộng lại số lượng sản phẩm
        if ($donhang->chiTietHoaDons && count($donhang->chiTietHoaDons) > 0) {
            foreach ($donhang->chiTietHoaDons as $ct) {
                if ($ct->product) {
                    $ct->product->SoLuong += $ct->so_luong;
                    $ct->product->save();
                }
            }
        }
        $tenKhach = $donhang->user->name ?? 'Quý khách';
        $email = $donhang->user->email ?? null;
        if ($email) {
            Mail::to($email)->send(new ThongBaoTrangThaiDonHangMail($tenKhach, $trangThaiMoi));
        }

        // Xóa chi tiết hóa đơn
        ChiTietHoaDonModel::where('hoa_don_id', $id)->delete();
        
        // Xóa hóa đơn
        $donhang->delete();

        return redirect()->back()->with('success', 'Đã hủy và xóa đơn hàng thành công!');
    }

    // Nếu không phải hủy đơn, cập nhật trạng thái bình thường
    $donhang->trang_thai = $trangThaiMoi;
    $donhang->save();

    // Gửi mail thông báo 
    if (in_array($trangThaiMoi, ['Đã Xác Nhận','Đang giao', 'Hoàn tất'])) {
        $tenKhach = $donhang->user->name ?? 'Quý khách';
        $email = $donhang->user->email ?? null;

        if ($email) {
            Mail::to($email)->send(new ThongBaoTrangThaiDonHangMail($tenKhach, $trangThaiMoi));
        }
    }

    return redirect()->back()->with('success', 'Cập nhật trạng thái thành công!');
}

private function isValidStatusTransition($trangThaiCu, $trangThaiMoi)
{
    $validTransitions = [
        'Chờ xác nhận' => ['Đã xác nhận', 'Hủy'],
        'Đã xác nhận' => ['Đang giao', 'Hủy'],
        'Đang giao' => ['Hoàn tất', 'Hủy'],
        'Hoàn tất' => [], // khong chuyen trang thai khac duoc
        'Hủy' => [], // y nh utren
    ];

    return isset($validTransitions[$trangThaiCu]) && 
           in_array($trangThaiMoi, $validTransitions[$trangThaiCu]);
}


}

?>