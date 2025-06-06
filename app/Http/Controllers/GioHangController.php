<?php

namespace App\Http\Controllers;

use App\Models\CartitemsModel;
use Illuminate\Http\Request;
use App\Models\ProductsModel;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\CartModel;
use App\Models\HoaDonModel;
use App\Models\ChiTietHoaDonModel;

class GioHangController extends Controller
{
   public function getCartKey()
{
    return auth()->check() ? 'cart_' . auth()->id() : 'cart_guest_' . session()->getId();
}


private function tinhtoanGiamGia($price, $giamgia = 0)
{
    if ($giamgia <= 0) return $price;

    return round($price * (1 - $giamgia / 100));
}
public function viewCart()
{
    $cartKey = $this->getCartKey();
    $cart = session()->get($cartKey, []);

    if (auth()->check() && empty($cart)) {
        $userId = auth()->id();

        $cartItems = CartitemsModel::whereHas('cart', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })
        ->with('product')
        ->get();

        foreach ($cartItems as $item) {
            $product = ProductsModel::find($item->product_id);
            
            if ($product) {
                // tinh gia sau giam gia
                $giasaukhigiam = $this->tinhtoanGiamGia($product->Gia, $product->giam_gia);
                
                $cart[$item->product_id] = [
                    'product_id' => $item->product_id,
                    'name'       => $product->TenSP,
                    'price'      => $giasaukhigiam, 
                    'quantity'   => $item->quantity,
                    'image'      => $product->HinhAnh,
                    'giam_gia'   => $product->giam_gia  
                ];
            }
        }

        session()->put($cartKey, $cart);
    }

    return view('giohang', compact('cart'));
}

    // tao hoac lay gio hang trong db
   public function getOrCreateCartId()
{
    if (!auth()->check()) {
        return null; 
    }

    $userId = auth()->id();

    $cart = CartModel::firstOrCreate(
        ['user_id' => $userId],
        ['created_at' => now(), 'updated_at' => now()]
    );

    return $cart->id;
}


    public function addToCart(Request $request)
{
    $productId = $request->input('product_id');
    $name = $request->input('TenSP');
    $price = $request->input('Gia');
    $quantity = $request->input('soluong');
    $image = $request->input('HinhAnh');
    $giamgia = $request->input('giam_gia', 0); 

    // gia giam
    $giasaukhigiam = $this->tinhtoanGiamGia($price, $giamgia);

    $cartKey = $this->getCartKey();
    $cart = session()->get($cartKey, []);

    // cap nha section
    if (isset($cart[$productId])) {
        $cart[$productId]['quantity'] += $quantity;
    } else {
        $cart[$productId] = [
            'product_id' => $productId,
            'name' => $name,
            'price' => $giasaukhigiam,  
            'quantity' => $quantity,
            'image' => $image,
            'giam_gia' => $giamgia  
        ];
    }

    session()->put($cartKey, $cart);

    // luu vao db neu ng dung da dang nhap
    if (auth()->check()) {
        $cartId = $this->getOrCreateCartId(); // tao cart neu chua co

        $existing = CartitemsModel::where('cart_id', $cartId)
            ->where('product_id', $productId)
            ->first();

        if ($existing) {
            $existing->update([
                'quantity' => $existing->quantity + $quantity,
                'updated_at' => now()
            ]);
        } else {
            CartitemsModel::create([
                'cart_id' => $cartId,
                'product_id' => $productId,
                'quantity' => $quantity,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }

    return redirect()->back()->with('swal_success', [
        'title' => 'Thêm giỏ hàng thành công!',
        'text' => '',
        'icon' => 'success']);
}
    public function remove($id)
    {
        $cartKey = $this->getCartKey();
        $cart = session()->get($cartKey, []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put($cartKey, $cart);

            if (auth()->check()) {
            $cartId = $this->getOrCreateCartId();
            CartitemsModel::where('cart_id', $cartId)
                ->where('product_id', $id)
                ->delete();
        }
        }

        return redirect()->back()->with('success', 'Đã xóa sản phẩm khỏi giỏ hàng');
    }

    public function increase($id)
    {
        $cartKey = $this->getCartKey();
        $cart = session()->get($cartKey, []);

        if (isset($cart[$id])) {
            $product = ProductsModel::find($id);
            if ($product) {
                // Kiểm tra số lượng trong kho
                if ($cart[$id]['quantity'] >= $product->SoLuong) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Số lượng sản phẩm trong kho không đủ!',
                        'cart' => $cart,
                        'totalQuantity' => array_sum(array_column($cart, 'quantity')),
                    ]);
                }

                $cart[$id]['quantity'] += 1;
                $cart[$id]['price'] = $this->tinhtoanGiamGia($product->Gia, $product->giam_gia);
                $cart[$id]['giam_gia'] = $product->giam_gia;
            }
            session()->put($cartKey, $cart);

            // Cập nhật vào DB
            if (auth()->check()) {
                $cartId = $this->getOrCreateCartId();

                CartitemsModel::where('cart_id', $cartId)
                    ->where('product_id', $id)
                    ->update([
                        'quantity' => $cart[$id]['quantity'],
                        'updated_at' => now()
                    ]);
            }
        }

        return response()->json([
            'success' => true,
            'cart' => $cart,
            'totalQuantity' => array_sum(array_column($cart, 'quantity')),
        ]);
    }

   public function decrease($id)
{
    $cartKey = $this->getCartKey();
    $cart = session()->get($cartKey, []);

    if (isset($cart[$id])) {
        if ($cart[$id]['quantity'] > 1) {
            $cart[$id]['quantity'] -= 1;
            $product = ProductsModel::find($id);
            if ($product) {
                $cart[$id]['price'] = $this->tinhtoanGiamGia($product->Gia, $product->giam_gia);
                $cart[$id]['giam_gia'] = $product->giam_gia;
            }

            if (auth()->check()) {
                $cartId = $this->getOrCreateCartId();
                CartitemsModel::where('cart_id', $cartId)
                    ->where('product_id', $id)
                    ->update([
                        'quantity' => $cart[$id]['quantity'],
                        'updated_at' => now()
                    ]);
            }
        } else {
            unset($cart[$id]);

            if (auth()->check()) {
                $cartId = $this->getOrCreateCartId();
                CartitemsModel::where('cart_id', $cartId)
                    ->where('product_id', $id)
                    ->delete();
            }
        }

        session()->put($cartKey, $cart);
    }

    return response()->json([
        'success' => true,
        'cart' => $cart,
        'totalQuantity' => array_sum(array_column($cart, 'quantity')),
    ]);
}


public function datHang(Request $request)
{
    $cartKey = $this->getCartKey();
    $cart = session()->get($cartKey, []);

    if (empty($cart)) {
        return redirect()->back()->with('error', 'Giỏ hàng trống!');
    }

    $hoadon = new HoaDonModel();
    $hoadon->user_id = auth()->id();
    $hoadon->dia_chi = $request->input('dia_chi');
    $hoadon->note = $request->input('note');
    $hoadon->tong_tien = collect($cart)->sum(function ($item) {
        return $item['price'] * $item['quantity'];
    });
    $hoadon->trang_thai = 'Chờ xác nhận';
    $hoadon->save();

    foreach ($cart as $productId => $item) {
        ChiTietHoaDonModel::create([
            'hoa_don_id' => $hoadon->id,
            'product_id' => $productId,
            'so_luong' => $item['quantity'],
            'don_gia' => $item['price'],
        ]);
    }

    // Xóa giỏ hàng trong session
    session()->forget($cartKey);

    // Xóa giỏ hàng trong database nếu user đã đăng nhập
    if (auth()->check()) {
        $cartId = $this->getOrCreateCartId();
        CartitemsModel::where('cart_id', $cartId)->delete();
    }

    return redirect()->route('cart.show')->with('success', 'Đặt hàng thành công!');
}
}
