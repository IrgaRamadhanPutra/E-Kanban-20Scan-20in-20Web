<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ekanban_paramblob_tbl extends Model
{
    //
    protected $connection = 'ekanban';
    protected $table = 'ekanban_paramblob_tbl';
    protected $fillable = [
        'id', 'part_no', 'item_code', 'img', 'img_blob', 'last_updated_by', 'last_updated_date', 'created_by', 'creation_date'
    ];
    protected $primaryKey = 'id';
    public $timestamps = false;
}
