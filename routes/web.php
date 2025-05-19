<?php

use App\Http\Controllers\MailController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
//thu vien ho tro day den dang nhap google
use App\Http\Controllers\SocialController;
use App\Http\Controllers\GioHangController;



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
Route::get('/cart/remove/{id}', [GioHangController::class, 'remove'])->name('cart.remove');
Route::post('/cart/increase/{id}', [GioHangController::class, 'increase'])->name('cart.increase');
Route::post('/cart/decrease/{id}', [GioHangController::class, 'decrease'])->name('cart.decrease');




// cho admin
use App\Http\Controllers\AdminController;
//dang ky
Route::get('/admin/register', [AdminController::class, 'showRegisterForm'])->name('admin.register');
Route::post('/admin/register', [AdminController::class, 'register'])->name('admin.register.submit');

Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');

//dang nhap
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.submit');

// dangxuat
Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

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



