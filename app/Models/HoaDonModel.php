<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class HoaDonModel extends Model
{
    protected $table = 'hoa_dons';
    protected $fillable = ['user_id', 'tong_tien', 'trang_thai' ,'dia_chi', 'note','created_at', 'updated_at'];
    protected $primaryKey = 'id';

    public function chiTietHoaDons()
    {
        return $this->hasMany(ChiTietHoaDonModel::class, 'hoa_don_id');
    }
    public function user()
    {
        return $this->belongsTo(UserModel::class, 'user_id');
    }
}

?>