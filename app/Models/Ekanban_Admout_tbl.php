<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ekanban_Admout_tbl extends Model
{
    //
    protected $connection = 'ekanban';
    protected $table = 'ekanban_admout_tbl';
    protected $fillable = [
        'id', 'dn_no', 'ekanban_no', 'seq', 'job_no', 'creation_date', 'customer', 'ekanban_qty', 'part_no'
    ];
    protected $primaryKey = 'id';
    public $timestamps = false;
}
