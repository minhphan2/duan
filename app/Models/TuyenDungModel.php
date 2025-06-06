<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TuyenDungModel extends Model
{
    protected $table = 'tuyen_dung';

    protected $fillable = [
        'full_name',
        'email',
        'phone',
        'address',
        'content',
    ];
}
?>
