<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewModel extends Model
{
    protected $table = 'reviews';

    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'product_id',
        'rating',
        'comment',
    ];

    public function user()
{
    return $this->belongsTo(UserModel::class );
}

public function product()
{
    return $this->belongsTo(ProductsModel::class , 'product_id', 'MaSP');
}
}
