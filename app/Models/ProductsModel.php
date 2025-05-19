<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class ProductsModel extends Model
{
    protected  $table = 'sanpham';
    protected $primaryKey = 'MaSP'; // Khóa chính của bảng
    protected $fillable =[
        'MaSP',
        'TenSP',
        'MoTa',
        'Gia',
        'HinhAnh',
        'LoaiSP'
    ];

}


?>