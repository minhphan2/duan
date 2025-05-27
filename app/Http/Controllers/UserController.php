<?php
namespace App\Http\Controllers;

//thu vien ho tro dang nhap bth
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
// thu vien ho tro dang nhap = google
use App\Http\Controllers\SocialController;
//hotrocaptcha
use App\Rules\Captcha;
//use Str;
//ho tro gui mail lay lai mat khau
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use App\Mail\VerifyEmail;



class UserController extends Controller
{
    public function hienthiView(){
        return view('dangnhapdangky');
    }

    public function adminkhachhang(){
        $khachhang = DB::table('users')->get();
        return view('admin.qlykhachhang', compact('khachhang'));
    }
      

   public function login(Request $request){
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|min:6',
        'g-recaptcha-response' => new Captcha(),
    ]);

    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $user = Auth::user();
        $request->session()->put('customer', $user);

        // TẢI GIỎ HÀNG TỪ DATABASE
        $cart = \App\Models\CartModel::firstOrCreate(
            ['user_id' => $user->id],
            ['created_at' => now(), 'updated_at' => now()]
        );

        $items = \App\Models\CartitemsModel::where('cart_id', $cart->id)->get();

        $cartSession = [];

        foreach ($items as $item) {
            $product = \App\Models\ProductsModel::find($item->product_id);
            if ($product) {
                $cartSession[$item->product_id] = [
                    'name' => $product->TenSP,
                    'price' => $product->Gia,
                    'quantity' => $item->quantity,
                    'image' => $product->HinhAnh
                ];
            }
        }

        session()->put('cart_user_' . $user->id, $cartSession);

        return redirect()->route('home');
    } else {
        return redirect()->back()->with('swal_error', [
            'title' => 'Đăng nhập thất bại!',
            'text' => 'Sai email hoặc mật khẩu',
            'icon' => 'error']);
    }
}



    /*public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'g-recaptcha-response' => new Captcha(), 
        ]);


        UserModel::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),

        ]);
        return redirect()->back()->with('success', 'Đăng ký thành công, hãy đăng nhập!');
    }
*/
public function register(Request $request)
{
    $request->validate([
        'username' => 'required|string',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6|confirmed',
        'g-recaptcha-response' => new Captcha(),
    ]);

    $verifyToken = Str::random(60);

    $user = UserModel::create([
        'username' => $request->username,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'verify_token' => $verifyToken,
        'email_verified' => false,
    ]);

    Mail::to($user->email)->send(new VerifyEmail($user));

    return redirect()->back()->with('swal_success', [
        'title' => 'Đăng ký thành công!',
        'text' => 'Vui lòng kiểm tra email để xác nhận tài khoản',
        'icon' => 'success'
    ]);
}

public function verifyEmail($token)
{
    $user = UserModel::where('verify_token', $token)->first();

    if (!$user) {
        return redirect('/dangnhapdangky')->with('swal_error', [
            'title' => 'Xác minh thất bại!',
            'text' => 'Mã xác minh không hợp lệ',
            'icon' => 'error'
        ]);
    }

    $user->email_verified = true;
    $user->verify_token = null;
    $user->save();

    return redirect('/dangnhapdangky')->with('swal_success', [
        'title' => 'Xác minh thành công!',
        'text' => 'Bạn có thể đăng nhập ngay bây giờ',
        'icon' => 'success'
    ]);
}


    public function logout(Request $request)  {
    Auth::logout(); // <- Đăng xuất Laravel
    $request->session()->invalidate(); // reset toàn bộ session
    $request->session()->regenerateToken(); // bảo mật CSRF mới

    return redirect()->route('home')->with('swal_success', [
        'title' => 'Đăng xuất thành công!',
        'text' => 'Hẹn gặp lại bạn',
        'icon' => 'success'
    ]);
    }

    //quen mat khau -> gui email

    public function hienthiquenmatkhau(){
        return view('quenmatkhau');
    }

    public function maquenmatkhau(Request $request){
        $request->validate(['email' => 'required|email']);

    $user = UserModel::where('email', $request->email)->first();

    if (!$user) {
        return back()->withErrors(['email' => 'Email không tồn tại']);
    }

    $token = Str::random(6);
    $user->reset_token = $token;
    $user->reset_token_expires_at = Carbon::now()->addMinutes(30); // thời hạn 30 phút
    $user->save();

    // Gửi email chứa link reset
    /*MAIL::raw("Ma khoi phuc tai khoan cua ban la: $token",function($message) use ($request){
        $message->to($request->email)->subject('Khoi phuc mat khau');
    });*/
    $link = route('formlaylaimk', ['email' => $request->email, 'token' => $token]);
    Mail::raw("Nhấn vào liên kết sau để đặt lại mật khẩu của bạn:\n$link\n\nLiên kết có hiệu lực trong 30 phút.Ma khoi phuc tai khoan cua ban la: $token", function($message) use ($request){
    $message->to($request->email)->subject('Khôi phục mật khẩu');
    });

    return back()->with('status', 'Mã khôi phục đã được gửi qua email');
    }


    //laylaimk
    public function hienthiformlaylai(){
        return view('laylaimk');
    }

    public function laylaimatkhau(Request $request){
        $request->validate([
            'email' => 'required|email',
            'token' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);
    
        $user = UserModel::where('email', $request->email)
                    ->where('reset_token', $request->token)
                    ->where('reset_token_expires_at', '>=', Carbon::now())
                    ->first();
    
        if (!$user) {
            return back()->withErrors(['token' => 'Mã không đúng hoặc đã hết hạn.']);
        }
    
        $user->password = Hash::make($request->password);
        $user->reset_token = null;
        $user->reset_token_expires_at = null;
        $user->save();
    
        return redirect()->route('dangnhapdangky')->with('success', 'Đặt lại mật khẩu thành công');
    }


    public function update(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
        ]);
        $user->username = $request->name;
        $user->email = $request->email;
        $user->save();
        return redirect()->route('profile.edit')->with('success', 'Cập nhật thành công!');
    }

    public function changePassword(Request $request)
{
    $request->validate([
        'current_password' => 'required',
        'new_password' => 'required|min:6|confirmed',
    ]);

    $user = Auth::user();

    if (!Hash::check($request->current_password, $user->password)) {
        return back()->with('password_error', 'Mật khẩu hiện tại không đúng!');
    }

    $user->password = Hash::make($request->new_password);
    $user->save();

    return back()->with('password_success', 'Đổi mật khẩu thành công!');
}
    
}

?>