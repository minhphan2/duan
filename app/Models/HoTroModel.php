<?php
namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class HoTroModel extends Model{
    protected $table = 'ho_tro';

    protected $fillable = [
        'name',
        'phone',
        'email',
        'message',
    ];
}
?>