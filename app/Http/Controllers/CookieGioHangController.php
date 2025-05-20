<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CookieGioHangController extends Controller
{
    protected $cookieKey = 'cart_cookie';

    protected function getCartFromCookie()
    {
        return json_decode(request()->cookie($this->cookieKey, '{}'), true);
    }

    protected function saveCartToCookie($cart)
    {
        return response()->json([
            'success' => true,
            'cart' => $cart,
            'totalQuantity' => array_sum(array_column($cart, 'quantity')),
        ])->withCookie(cookie($this->cookieKey, json_encode($cart), 60 * 24 * 7)); // lưu 7 ngày
    }

    public function add(Request $request)
    {
        $productId = $request->input('product_id');
        $name = $request->input('TenSP');
        $price = $request->input('Gia');
        $quantity = $request->input('soluong');
        $image = $request->input('HinhAnh');

        $cart = $this->getCartFromCookie();

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

        return $this->saveCartToCookie($cart);
    }

    public function remove($id)
    {
        $cart = $this->getCartFromCookie();

        if (isset($cart[$id])) {
            unset($cart[$id]);
        }

        return $this->saveCartToCookie($cart);
    }

    public function increase($id)
    {
        $cart = $this->getCartFromCookie();

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += 1;
        }

        return $this->saveCartToCookie($cart);
    }

    public function decrease($id)
    {
        $cart = $this->getCartFromCookie();

        if (isset($cart[$id])) {
            if ($cart[$id]['quantity'] > 1) {
                $cart[$id]['quantity'] -= 1;
            } else {
                unset($cart[$id]);
            }
        }

        return $this->saveCartToCookie($cart);
    }

    public function show()
    {
        $cart = $this->getCartFromCookie();
        return view('cart.index', ['cart' => $cart]);
    }
}
