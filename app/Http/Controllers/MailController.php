<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    
    public function sendPromoEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);
    
        try {
            Mail::raw('Cảm ơn bạn đã đăng ký nhận khuyến mãi!', function ($msg) use ($request) {
                $msg->to($request->email)->subject('Xác nhận khuyến mãi');
            });
    
            return back()->with('success', 'Bạn đã đăng ký thành công!');
        } catch (\Exception $e) {
            return back()->with('error', 'Có lỗi xảy ra khi gửi email!');
        }
    }
    

}

?>