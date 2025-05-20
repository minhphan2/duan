<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CartitemsModel extends Model
{
    protected $table = 'cart_items';
    protected $fillable = ['cart_id', 'product_id', 'quantity', 'created_at', 'updated_at'];

   
    public function cart()
    {
        return $this->belongsTo(CartModel::class , 'cart_id');
    }

    public function product()
    {
        return $this->belongsTo(ProductsModel::class , 'product_id' ,'MaSP');
    }
}
