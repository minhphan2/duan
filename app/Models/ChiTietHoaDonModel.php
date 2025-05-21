<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\ProductsModel;
use App\Models\HoaDonModel;
use App\Models\UserModel;

class ChiTietHoaDonModel extends Model
{
    protected $table = 'chi_tiet_hoa_dons';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = ['hoa_don_id', 'product_id', 'so_luong', 'don_gia'];

    public function product()
    {
        return $this->belongsTo(ProductsModel::class, 'product_id', 'MaSP');
    }
    public function hoaDon()
    {
        return $this->belongsTo(HoaDonModel::class, 'hoa_don_id');
    }
}
?>
