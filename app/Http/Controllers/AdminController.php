<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\ChiTietHoaDonModel;
use App\Models\HoaDonModel;
use App\Models\ProductsModel;
use App\Models\UserModel;
use Carbon\Carbon;




class AdminController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.dangnhap'); 
    }

    public function showRegisterForm()
    {
        return view('admin.dangky'); 
    }
    
    public function dashboard()
    {
        return view('admin.dashboard'); 
    }


    public function register(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:admins,email',
        'password' => 'required|string|min:6|confirmed', 
    ]);

    // Tạo admin
    Admin::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

     return redirect()->route('admin.login')->with('success', 'Đăng ký thành công! Vui lòng đăng nhập.');
}


    public function login(Request $request)
    {
         $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $admin = Admin::where('email', $request->email)->first();

        if ($admin && Hash::check($request->password, $admin->password)) {
            Auth::guard('admin')->login($admin);
            return redirect()->route('admin.dashboard');
        }

        
        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate(); // Chống session fixation
            return redirect()->intended(route('admin.dashboard')); // Thành công
        }

        return back()->withErrors(['email' => 'Sai thông tin đăng nhập']);
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

public function thongke(Request $request)
{
    $start = $request->input('start_date') ?? Carbon::now()->startOfMonth()->toDateString();
    $end = $request->input('end_date') ?? Carbon::now()->endOfMonth()->toDateString();

    // Doanh thu tổng (chỉ tính đơn hoàn thành)
    $doanhThu = HoaDonModel::whereBetween('created_at', [$start, $end])
        ->where('trang_thai', 'Hoàn tất')
        ->sum('tong_tien');

    // Doanh thu theo ngày
    $doanhThuTheoNgay = HoaDonModel::whereBetween('created_at', [$start, $end])
        ->where('trang_thai', 'Hoàn tất')
        ->get()
        ->groupBy(function ($hd) {
            return Carbon::parse($hd->created_at)->format('Y-m-d');
        })->map(function ($items) {
            return $items->sum('tong_tien');
        });

    // Top sản phẩm bán chạy
    $sanPhamBanChay = ChiTietHoaDonModel::whereHas('hoaDon', function ($query) use ($start, $end) {
        $query->whereBetween('created_at', [$start, $end])
              ->where('trang_thai', 'Hoàn tất');
    })
        ->selectRaw('product_id, SUM(so_luong) as tong_so_luong')
        ->groupBy('product_id')
        ->orderByDesc('tong_so_luong')
        ->with('product')
        ->limit(5)
        ->get();

    // Top khách hàng mua nhiều
    $khachHangMuaNhieu = HoaDonModel::whereBetween('created_at', [$start, $end])
        ->where('trang_thai', 'Hoàn tất')
        ->selectRaw('user_id, SUM(tong_tien) as tong_chi_tieu')
        ->groupBy('user_id')
        ->orderByDesc('tong_chi_tieu')
        ->with('user')
        ->limit(5)
        ->get();

    return view('admin.thongke', compact(
        'doanhThu', 
        'doanhThuTheoNgay', 
        'sanPhamBanChay', 
        'khachHangMuaNhieu',
        'start', 'end'
    ));
}


}
?>