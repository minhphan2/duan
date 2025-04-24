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

        //luu thong tin nguoi dung vao session de hien ten tren thanh header :))
        session(['customer' => $user]);
        return redirect('/trangchu'); // hoặc route nào bạn muốn sau khi login
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