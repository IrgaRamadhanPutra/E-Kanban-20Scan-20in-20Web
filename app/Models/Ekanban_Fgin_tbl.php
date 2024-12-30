<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ekanban_Fgin_tbl extends Model
{
    protected $connection = 'ekanban';
    protected $table = 'ekanban_fgin_tbl';
    protected $fillable = [
        'id', 'part_no', 'item_code', 'kanban_no', 'seq', 'qty', 'mpname', 'created_by', 'creation_date', 'last_updated_by', 'last_updated_date', 'fg_trans', 'date_export', 'reset', 'reset_uid',
        'to_no'
    ];
    protected $primaryKey = 'id';
    public $timestamps = false;
}
