<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Ekanban_Usertbl extends Authenticatable
{
    use Notifiable;

    protected $connection = 'ekanban';
    protected $table = 'ekanban_user_tbl';

    /*
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'id', 'user', 'pass', 'group',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     *
     */
    protected $hidden = [
        'pass',
    ];
    public function username()
    {
        return 'user';
    }

    public $timestamps = false;
}
