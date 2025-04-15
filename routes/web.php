<?php

use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;


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

Route::get('/sanpham', [ProductsController::class, 'index'])->name('sanpham');

Route::get('/trangchu', [PageController::class, 'home'])->name('home');
Route::get('/giohang', [PageController::class, 'giohang'])->name('giohang');
Route::get('/gioithieu', [PageController::class, 'gioithieu'])->name('gioithieu');
Route::get('/lienhe', [PageController::class, 'lienhe'])->name('lienhe');
Route::get('/hoidap', [PageController::class, 'hoidap'])->name('hoidap');
Route::get('/banhsinhnhat', [ProductsController::class, 'index'])->name('banhsinhnhat');
Route::get('/banhnuae', [ProductsController::class, 'index'])->name('banhnuae');
Route::get('/phukienbanh', [ProductsController::class, 'index'])->name('phukienbanh');
Route::get('/tintuc', [PageController::class, 'tintuc'])->name('tintuc');
Route::get('/doingu', [PageController::class, 'doingu'])->name('doingu');
Route::get('/lienhe', [PageController::class, 'lienhe'])->name('lienhe');