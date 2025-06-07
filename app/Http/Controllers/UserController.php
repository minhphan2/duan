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
        try {
            $request->validate([
                'email' => 'required|email|regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/',
                'password' => 'required|min:6',
                'g-recaptcha-response' => new Captcha(),
            ], [
                'email.required' => 'Vui lòng nhập email',
                'email.email' => 'Email không hợp lệ',
                'email.regex' => 'Email không đúng định dạng',
                'password.required' => 'Vui lòng nhập mật khẩu',
                'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự',
                'g-recaptcha-response.required' => 'Vui lòng xác nhận captcha!',
            ]);
    
            // Kiem tra ton tai email
            $user = \App\Models\User::where('email', $request->email)->first();
            if (!$user) {
                return redirect()->back()->with('swal_error', [
                    'title' => 'Đăng nhập thất bại!',
                    'text' => 'Email không tồn tại trong hệ thống',
                    'icon' => 'error'
                ]);
            }
    
            $credentials = $request->only('email', 'password');
    
            if (Auth::attempt($credentials)) {
                $user = Auth::user();
                $request->session()->put('customer', $user);
    
                // Tai gio hang tu db
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
    
                return redirect()->route('home')->with('swal_success', [
                    'title' => 'Đăng nhập thành công!',
                    'text' => 'Chào mừng bạn quay trở lại',
                    'icon' => 'success'
                ]);
            } else {
                return redirect()->back()->with('swal_error', [
                    'title' => 'Đăng nhập thất bại!',
                    'text' => 'Mật khẩu không chính xác',
                    'icon' => 'error'
                ]);
            }
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->with('swal_error', [
                'title' => 'Lỗi đăng nhập!',
                'text' => $e->validator->errors()->first(),
                'icon' => 'error'
            ]);
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
    try {
        $request->validate([
            'username' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'g-recaptcha-response' => new Captcha(),
        ], [
            'username.required' => 'Vui lòng nhập tên!',
            'email.required' => 'Vui lòng nhập email!',
            'email.email' => 'Email không đúng định dạng!',
            'email.unique' => 'Email này đã được sử dụng!',
            'password.required' => 'Vui lòng nhập mật khẩu!',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự!',
            'password.confirmed' => 'Xác nhận mật khẩu không khớp!',
            'g-recaptcha-response.required' => 'Vui lòng xác nhận captcha!'
        ]);
    } catch (\Illuminate\Validation\ValidationException $e) {
        $errorMessage = collect($e->errors())->first()[0];
        return redirect()->back()
            ->withInput()
            ->with('swal_error', [
                'title' => 'Lỗi!',
                'text' => $errorMessage,
                'icon' => 'error'
            ]);
    }
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
        return back()->with('swal_error', [
            'title' => 'Lỗi!',
            'text' => 'Email không tồn tại',
            'icon' => 'error'
        ]);
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

    return back()->with('swal_success', [
        'title' => 'Thành công!',
        'text' => 'Mã khôi phục đã được gửi qua email',
        'icon' => 'success'
    ]);
    }


    //laylaimk
    public function hienthiformlaylai(){
        return view('laylaimk');
    }

   public function laylaimatkhau(Request $request){
    try {
        $request->validate([
            'email' => 'required|email|regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/',
            'token' => 'required',
            'password' => 'required|min:6|confirmed',
        ], [
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Email không hợp lệ',
            'email.regex' => 'Email không đúng định dạng',
            'token.required' => 'Vui lòng nhập mã xác nhận',
            'password.required' => 'Vui lòng nhập mật khẩu mới',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự',
            'password.confirmed' => 'Mật khẩu xác nhận không khớp'
        ]);
    
        $user = UserModel::where('email', $request->email)
                    ->where('reset_token', $request->token)
                    ->where('reset_token_expires_at', '>=', Carbon::now())
                    ->first();
    
        if (!$user) {
            return redirect()->route('dangnhapdangky')->with('swal_error', [
                'title' => 'Lỗi!',
                'text' => 'Email hoặc mã xác nhận không đúng hoặc đã hết hạn. Vui lòng thử lại!',
                'icon' => 'error'
            ]);
        }
    
        $user->password = Hash::make($request->password);
        $user->reset_token = null;
        $user->reset_token_expires_at = null;
        $user->save();
    
        return redirect()->route('dangnhapdangky')->with('swal_success', [
            'title' => 'Thành công!',
            'text' => 'Đặt lại mật khẩu thành công. Vui lòng đăng nhập lại với mật khẩu mới!',
            'icon' => 'success'
        ]);
    } catch (\Illuminate\Validation\ValidationException $e) {
        return redirect()->back()->with('swal_error', [
            'title' => 'Lỗi!',
            'text' => $e->validator->errors()->first(),
            'icon' => 'error'
        ]);
    }
}


    public function update(Request $request)
{
    try {
        $user = Auth::user();
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:10', 
        ], [
            'name.required' => 'Vui lòng nhập tên!',
            'name.max' => 'Tên không được vượt quá 255 ký tự!',
            'email.required' => 'Vui lòng nhập email!',
            'email.email' => 'Email không đúng định dạng!',
            'email.unique' => 'Email này đã được sử dụng!',
            'email.max' => 'Email không được vượt quá 255 ký tự!',
            'phone.required' => 'Vui lòng nhập số điện thoại!',
            'phone.regex' => 'Số điện thoại không đúng định dạng!',
            'phone.min' => 'Số điện thoại phải có ít nhất 10 số!',
            'phone.max' => 'Số điện thoại không được vượt quá 10 số!'
        ]);

        $user->username = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->save();
        return redirect()->route('profile.edit')->with('success', 'Cập nhật thành công!');

    } catch (\Illuminate\Validation\ValidationException $e) {
        $errorMessage = collect($e->errors())->first()[0];
        return redirect()->back()
            ->withInput()
            ->with('error', $errorMessage);
    }
}

public function changePassword(Request $request)
{
    try {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
        ], [
            'current_password.required' => 'Vui lòng nhập mật khẩu hiện tại!',
            'new_password.required' => 'Vui lòng nhập mật khẩu mới!',
            'new_password.min' => 'Mật khẩu mới phải có ít nhất 6 ký tự!',
            'new_password.confirmed' => 'Xác nhận mật khẩu mới không khớp!'
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->with('error', 'Mật khẩu hiện tại không đúng!');
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return back()->with('success', 'Đổi mật khẩu thành công!');

    } catch (\Illuminate\Validation\ValidationException $e) {
        $errorMessage = collect($e->errors())->first()[0];
        return redirect()->back()
            ->withInput()
            ->with('error', $errorMessage);
    }
}

public function resendVerificationEmail(Request $request)
{
    // Lấy người dùng hiện tại
    $user = Auth::user();

    // Kiểm tra xem người dùng đã xác minh chưa (đề phòng trường hợp người dùng xác minh rồi mà link vẫn hiện)
    if ($user->email_verified) {
         // Chuyển hướng về trang nào đó với thông báo email đã được xác minh
         return redirect()->route('home')->with('swal_success', [
            'title' => 'Thông báo',
            'text' => 'Email của bạn đã được xác minh rồi!',
            'icon' => 'info'
        ]);
    }

    // Tạo token mới (tùy chọn, nếu bạn muốn mỗi lần gửi lại là token mới)
    // Dựa trên code register của bạn, có vẻ bạn lưu verify_token trong DB
    // Nếu logic của bạn là gửi lại email với token cũ, bạn có thể bỏ qua phần này
    // Nhưng tốt nhất nên tạo token mới và cập nhật DB
    $newVerifyToken = Str::random(60);
    $user->verify_token = $newVerifyToken;
    $user->save(); // Lưu token mới vào DB

    // Gửi lại email xác minh
    // Sử dụng Mailable VerifyEmail mà bạn đã có
    Mail::to($user->email)->send(new VerifyEmail($user));

    // Chuyển hướng trở lại trang trước với thông báo thành công
    return back()->with('swal_success', [
        'title' => 'Thành công!',
        'text' => 'Email xác minh mới đã được gửi.',
        'icon' => 'success'
    ]);
}
    
}

?>