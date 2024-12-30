<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GohinEntry extends Model
{

    protected $table = 'gohin_adm';
    protected $fillable = [
        'id_gohin', 'part_no', 'part_name', 'quantity', 'dn_no', 'order_no', 'job_no', 'customer_process', 'delivery_cycle', 'delivery_date', 'delivery_time', 'category', 'created_by', 'creation_date', 'updated_by',
        'updated_date'
    ];
    protected $primaryKey = 'id_gohin';
    public $timestamps = false;
}
