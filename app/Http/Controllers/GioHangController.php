<?php

namespace App\Http\Controllers;

use App\Models\CartitemsModel;
use Illuminate\Http\Request;
use App\Models\ProductsModel;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\CartModel;

class GioHangController extends Controller
{
   public function getCartKey()
{
    return auth()->check() ? 'cart_' . auth()->id() : 'cart_guest_' . session()->getId();
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
                $cart[$item->product_id] = [
                    'product_id' => $item->product_id,
                    'name'       => $product->TenSP,
                    'price'      => $product->Gia,
                    'quantity'   => $item->quantity,
                    'image'      => $product->HinhAnh
                ];
            }
        }

        session()->put($cartKey, $cart);
    }

    return view('giohang', compact('cart'));
}

    // Hàm tạo hoặc lấy giỏ hàng trong DB
   public function getOrCreateCartId()
{
    if (!auth()->check()) {
        return null; // hoặc throw exception
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

    $cartKey = $this->getCartKey(); // thường là 'cart' hoặc 'cart_user_{id}'
    $cart = session()->get($cartKey, []);

    // Cập nhật session
    if (isset($cart[$productId])) {
        $cart[$productId]['quantity'] += $quantity;
    } else {
        $cart[$productId] = [
            'name' => $name,
            'price' => $price,
            'quantity' => $quantity,
            'image' => $image
        ];
    }

    session()->put($cartKey, $cart);

    // Chỉ lưu vào DB nếu người dùng đã đăng nhập
    if (auth()->check()) {
        $cartId = $this->getOrCreateCartId(); // tạo cart nếu chưa có

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

    return redirect()->route('cart.show')->with('success', 'Đã thêm vào giỏ hàng');
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
            $cart[$id]['quantity'] += 1;
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

            if (auth()->check()) {
                $cartId = $this->getOrCreateCartId(); // ✅ gọi trong đây mới đúng
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

}
