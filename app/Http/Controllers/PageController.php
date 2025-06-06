<?php
namespace App\Http\Controllers;
use App\Models\HoTro;
use App\Models\HoTroModel;
use App\Models\TuyenDung;
use App\Models\TuyenDungModel;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home() {
        return view('trangchu');
    }

    public function giohang() {
        return view('giohang');
    }

    public function gioithieu() {
        return view('gioithieu');
    }

    public function lienhe() {
        return view('lienhe');
    }

    public function hoidap() {
        return view('hoidap');
    }
    public function tintuc() {
        return view('tintuc');
    }
    public function doingu() {
        return view('doingu');
    }






    // Xử lý form hỗ trợ
    public function guiHoTro(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'phone' => 'required|digits_between:8,15',
            'email' => 'required|email|max:100',
            'message' => 'required|string|max:1000',
        ]);
    
        HoTroModel::create($request->only('name', 'phone', 'email', 'message'));
    
        return redirect()->back()->with('success', 'Gửi hỗ trợ thành công!');
    }
    

    // Xử lý form tuyển dụng
    public function guiTuyenDung(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'address' => 'required|string',
            'content' => 'required|string',
        ]);

        TuyenDungModel::create($request->only('full_name', 'email', 'phone', 'address', 'content'));

        return redirect()->back()->with('success', 'Gửi tuyển dụng thành công!');
    }
}


?>