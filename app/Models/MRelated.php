<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MRelated extends Model
{
    protected $table = 'm_related_items';

    public $primaryKey = ['main_item_id', 'sub_item_id', 'item_type', 'create_month'];

    public $incrementing = false;

    protected $fillable = [
        'main_item_id',
        'sub_item_id',
        'item_type',
        'create_month',
        'pur_get_num',
        'pur_use_category_code',
        'created_at',
        'updated_at'
    ];
}
