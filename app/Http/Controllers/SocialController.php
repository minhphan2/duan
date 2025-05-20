<?php

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\UserModel;

class SocialController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
{
    $googleUser = Socialite::driver('google')->user();

    $user = UserModel::firstOrCreate(
        ['email' => $googleUser->getEmail()],
        [
            'username' => $googleUser->getName(),
            'password' => bcrypt(Str::random(16)),
        ]
    );

    Auth::login($user);

    // Lưu thông tin người dùng vào session để hiện tên trên header
    session(['customer' => $user]);

    // Tải giỏ hàng từ database nếu có
    $cart = \App\Models\CartModel::firstOrCreate(
        ['user_id' => $user->id],
        ['created_at' => now(), 'updated_at' => now()]
    );

    $items = \App\Models\CartitemsModel::where('cart_id', $cart->id)->get();

    $cartSession = [];

    foreach ($items as $item) {
        $product = \App\Models\ProductsModel::find($item->product_id);
        if ($product) {
            $cartSession[$item->product_id] = [
                'name' => $product->TenSP,
                'price' => $product->Gia,
                'quantity' => $item->quantity,
                'image' => $product->HinhAnh
            ];
        }
    }

    session()->put('cart_user_' . $user->id, $cartSession);

    return redirect('/trangchu');
}

    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }
    public function handleFacebookCallback()
    {
        $facebookUser = Socialite::driver('facebook')->user();

        $user = UserModel::firstOrCreate(
            ['email' => $facebookUser->getEmail()],
            [
                'username' => $facebookUser->getName(),
                'password' => bcrypt(Str::random(16)),
            ]
        );

        Auth::login($user);

        //luu thong tin nguoi dung vao session de hien ten tren thanh header :))
        session(['customer' => $user]);
        return redirect('/trangchu'); // hoặc route nào bạn muốn sau khi login
    }
}
?>