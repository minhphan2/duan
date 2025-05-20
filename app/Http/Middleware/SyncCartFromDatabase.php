<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Models\CartModel;
use App\Models\CartitemsModel;
use App\Models\ProductsModel;

class SyncCartFromDatabase
{
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $cartKey = 'cart'; // hoặc 'cart_user_' . Auth::id() nếu bạn dùng key riêng
            if (!session()->has($cartKey)) {
                $userId = Auth::id();
                $cartId = CartModel::where('user_id', $userId)->value('id');

                if ($cartId) {
                    $items = CartitemsModel::where('cart_id', $cartId)->get();
                    $cart = [];

                    foreach ($items as $item) {
                        $product = ProductsModel::find($item->product_id);
                        if ($product) {
                            $cart[$item->product_id] = [
                                'name' => $product->TenSP,
                                'price' => $product->Gia,
                                'quantity' => $item->quantity,
                                'image' => $product->HinhAnh,
                            ];
                        }
                    }

                    session()->put($cartKey, $cart);
                }
            }
        }

        return $next($request);
    }
}
