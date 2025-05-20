<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use App\Models\Cart;
use App\Models\CartModel;

class CreateCartWhenLogin
{
    public function handle(Login $event): void
    {
        $user = $event->user;

        
        $existingCart = CartModel::where('user_id', $user->id)->first();

        if (!$existingCart) {
            CartModel::create([
                'user_id' => $user->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
