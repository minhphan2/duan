<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\ProductsModel;
use Illuminate\Support\Facades\Session;

class GioHangController extends Controller
{

    public function getCartKey()
{
    return auth()->check() ? 'cart_' . auth()->id() : 'cart_guest_' . session()->getId();
}

public function viewCart()
{
    $cart = session()->get($this->getCartKey(), []);
    return view('giohang', compact('cart'));
}

public function addToCart(Request $request)
{
    $productId = $request->input('product_id');
    $name = $request->input('TenSP');
    $price = $request->input('Gia');
    $quantity = $request->input('soluong');
    $image = $request->input('HinhAnh');

    $cartKey = $this->getCartKey();
    $cart = session()->get($cartKey, []);

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

    return redirect()->route('cart.show')->with('success', 'Đã thêm vào giỏ hàng');
}

public function remove($id)
{
    $cartKey = $this->getCartKey();
    $cart = session()->get($cartKey, []);
    unset($cart[$id]);
    session()->put($cartKey, $cart);
    return redirect()->back();
}

public function increase($id)
    {
        $cartKey = $this->getCartKey();
        $cart = session()->get($cartKey, []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += 1;
            session()->put($cartKey, $cart);
        }

        return  response()->json([
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
        } else {
            unset($cart[$id]);
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



?>