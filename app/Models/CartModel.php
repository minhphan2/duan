<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CartModel extends Model
{
    protected $table = 'carts';
    protected $fillable = ['user_id', 'created_at', 'updated_at'];

    public function items()
    {
        return $this->hasMany(CartitemsModel::class, 'cart_id');
    }
}
