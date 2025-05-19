<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class ProductsModel extends Model
{
    protected  $table = 'sanpham';
    protected $primaryKey = 'MaSP'; // Khóa chính của bảng
    public $timestamps = false;
    protected $fillable =[
        'TenSP',
        'MoTa',
        'Gia',
        'HinhAnh',
        'LoaiSP',
        'HinhAnh2',
        'HinhAnh3',
        'SoLuong',
    ];

}


?>