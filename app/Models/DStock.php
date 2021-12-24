<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DStock extends Model
{
    protected $table = 'd_stock';

    public $primaryKey = ['stock_id'];

    public $incrementing = false;

    protected $fillable = [
        'stock_id',
        'stock_type',
        'stock_num',
        'safety_stock_num',
        'alert_flg',
        'alert_update_at',
        'created_at',
        'updated_at',
        'delete_flg'
    ];
}
