<?php

use App\Http\Controllers\MailController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
//thu vien ho tro day den dang nhap google
use App\Http\Controllers\SocialController;
use App\Http\Controllers\GioHangController;

use App\Http\Controllers\CookieGioHangController;
use App\Models\HoaDonModel;
use Illuminate\Http\Request;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/hello', function () {
    return view('welcome');
});

use Illuminate\Support\Facades\DB;

Route::get('/db-test', function () {
    try {
        DB::connection()->getPdo();
        return "✅ Kết nối DB thành công!";
    } catch (\Exception $e) {
        return "❌ Lỗi kết nối DB: " . $e->getMessage();
    }
});
//sanpham
Route::get('/sanpham', [ProductsController::class, 'index'])->name('sanpham');
Route::get('/banhsinhnhat', [ProductsController::class, 'banhsinhnhat'])->name('banhsinhnhat');
Route::get('/banhsinhnhat/ajax', [ProductsController::class, 'BanhsinhnhatAjax']);
Route::get('/banhnuae', [ProductsController::class, 'banhnuae'])->name('banhnuae');
Route::get('/banhnuae/ajax', [ProductsController::class, 'BanhnuaeAjax']);
Route::get('/phukienbanh', [ProductsController::class, 'phukienbanh'])->name('phukienbanh');
Route::get('/phukienbanh/ajax', [ProductsController::class, 'PhukienbanhAjax']);
Route::get('/sanpham/chitietsanpham/{id}', [ProductsController::class, 'chitietsanpham'])->name('chitietsanpham');
Route::get('/sap-xep-san-pham', [ProductsController::class, 'sort']);

//timkiem
Route::get('/timkiem', [ProductsController::class, 'timKiem']);



//cac trang tinh~
Route::get('/trangchu', [PageController::class, 'home'])->name('home');

Route::get('/gioithieu', [PageController::class, 'gioithieu'])->name('gioithieu');
Route::get('/lienhe', [PageController::class, 'lienhe'])->name('lienhe');
Route::get('/hoidap', [PageController::class, 'hoidap'])->name('hoidap');
Route::get('/tintuc', [PageController::class, 'tintuc'])->name('tintuc');
Route::get('/doingu', [PageController::class, 'doingu'])->name('doingu');
Route::get('/lienhe', [PageController::class, 'lienhe'])->name('lienhe');

//cai nay tinh sau
//Route::get('/giohang', [PageController::class, 'giohang'])->name('giohang');


//dangnhap va dang ky
Route::get('/dangnhapdangky', [UserController::class, 'hienthiView'])->name('dangnhapdangky');
Route::post('/dangky', [UserController::class, 'register'])->name('dangky');
Route::post('/dangnhap', [UserController::class, 'login'])->name('dangnhap');
Route::get('/dangxuat', [UserController::class, 'logout'])->name('dangxuat');

//dangnhapbang google

Route::get('auth/google', [SocialController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('auth/google/callback', [SocialController::class, 'handleGoogleCallback']);
//dang nhap bang facebook
Route::get('auth/facebook', [SocialController::class, 'redirectToFacebook'])->name('auth.facebook');
Route::get('auth/facebook/callback', [SocialController::class, 'handleFacebookCallback']);


//guimail
Route::post('/send-promo-email', [MailController::class, 'sendPromoEmail'])->name('send.promo.email');


//quen mat khau
Route::get('/quenmatkhau', [UserController::class,'hienthiquenmatkhau'])->name('quenmatkhau');
Route::post('/quenmatkhau',[UserController::class,'maquenmatkhau'])->name('password.email');

//sau khi lay ma
Route::get('/laylaimatkhau', [UserController::class, 'hienthiformlaylai'])->name('formlaylaimk');
Route::post('/laylaimatkhau', [UserController::class, 'laylaimatkhau'])->name('password.update');

//chitietsanpham
Route::get('/chitietsanpham/{id}', [ProductsController::class, 'chitietsanpham'])->name('chitietsanpham');

//them vao gio hang
Route::get('/giohang', [GioHangController::class, 'viewCart'])->name('cart.show');
Route::post('/addtocart', [GioHangController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/remove/{id}', [GioHangController::class, 'remove'])->name('cart.remove');

Route::post('/cart/increase/{id}', [GioHangController::class, 'increase'])->name('cart.increase');
Route::post('/cart/decrease/{id}', [GioHangController::class, 'decrease'])->name('cart.decrease'); 
//dathang
Route::post('/dathang', [GioHangController::class, 'datHang'])->name('cart.dathang');

// cho admin
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HoaDonController;

//dang ky
Route::get('/admin/register', [AdminController::class, 'showRegisterForm'])->name('admin.register');
Route::post('/admin/register', [AdminController::class, 'register'])->name('admin.register.submit');

Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');

//dang nhap
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.submit');

// dangxuat
Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');


//danh gia
use App\Http\Controllers\ReviewController;
Route::get('/reviews/{product_id}', [ReviewController::class, 'getReviews']);
Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');




//cua admin
Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});

Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin/dashboard/quanlysanpham', [ProductsController::class, 'laytatcasanpham'])->name('admin.qlysanpham');
});
Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin/dashboard/quanlysanpham/them', [ProductsController::class, 'formthem'])->name('sanpham.formthem');
    Route::post('/sanpham/store', [ProductsController::class, 'store'])->name('sanpham.store');
});


Route::middleware(['auth:admin'])->group(function () {
    Route::delete('/sanpham/{id}', [ProductsController::class, 'delete'])->name('sanpham.delete');
});

Route::middleware(['auth:admin'])->group(function () {
    Route::get('/sanpham/{id}/edit', [ProductsController::class, 'edit'])->name('sanpham.edit');
    Route::put('/sanpham/{id}', [ProductsController::class, 'update'])->name('sanpham.update');
});


Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin/dashboard/quanlykhachhang', [UserController::class, 'adminkhachhang'])->name('admin.qlykhachhang');
});

Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin/dashboard/quanlydonhang', [HoaDonController::class, 'indexchoquanly'])->name('admin.qlydonhang');
    Route::get('/admin/donhang/{id}', [HoaDonController::class, 'showDonHang'])->name('admin.donhang.chitiet');
    Route::post('/admin/donhang/trangthai/{id}', [HoaDonController::class, 'capNhatTrangThai'])->name('admin.donhang.trangthai');

});

//danh gia
Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin/dashboard/quanlybinhluan', [ReviewController::class, 'laytatcareview'])->name('admin.qlybinhluan');
});

/*
Route::post('/addtocart', function (Request $request) {
    if (auth()->check()) {
        return app(GioHangController::class)->addToCart($request);
    } else {
        return app(CookieGioHangController::class)->add($request);
    }
})->name('cart.add');

Route::get('/cart/remove/{id}', function ($id) {
    if (auth()->check()) {
        return app(GioHangController::class)->remove($id);
    } else {
        return app(CookieGioHangController::class)->remove($id);
    }
})->name('cart.remove');

Route::post('/cart/increase/{id}', function ($id) {
    if (auth()->check()) {
        return app(GioHangController::class)->increase($id);
    } else {
        return app(CookieGioHangController::class)->increase($id);
    }
})->name('cart.increase');

Route::post('/cart/decrease/{id}', function ($id) {
    if (auth()->check()) {
        return app(GioHangController::class)->decrease($id);
    } else {
        return app(CookieGioHangController::class)->decrease($id);
    }
})->name('cart.decrease');*/