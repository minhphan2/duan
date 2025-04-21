<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;

class UserModel extends Authenticatable
{
    protected  $table = 'users';
    public $timestamps = false;
    protected $fillable =[
        'username',
        'email',
        'password',
        'avatar',
        'phone',
        'address',
    ];

    protected $hidden = [
        'password',
    ];

}


?>