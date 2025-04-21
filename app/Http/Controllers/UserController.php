<?php
namespace App\Http\Controllers;

//thu vien ho tro dang nhap bth
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
// thu vien ho tro dang nhap = google
use App\Http\Controllers\SocialController;


class UserController extends Controller
{
    public function hienthiView(){
        return view('dangnhapdangky');
    }

    public function login(Request $request){
       $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->put('customer', Auth::user());
            return redirect()->route('home'); // hoặc redirect()->route('home');
        } else {
            return redirect()->back()->with('error', 'Sai email hoặc mật khẩu');
        }
    }


    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);


        UserModel::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),

        ]);
        return redirect()->back()->with('success', 'Đăng ký thành công, hãy đăng nhập!');
    }


    public function logout(Request $request)  {
        Session::forget('customer');
        return redirect()->route('home')->with('success', 'Đăng xuất thành công!');
    }

    
}

?>