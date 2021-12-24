<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MItem extends Model
{
    protected $table = 'm_items';

    public $primaryKey = 'item_id';

    public $incrementing = false;

    protected $fillable = [
        'item_id',
        'company_code',
        'box_code',
        'box_num',
        'start_date',
        'end_date',
        'company_name',
        'created_at',
        'updated_at',
        'delete_flg'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    // 条件に削除されていないものを追加
    public function scopeNotDeleted($query)
    {
        return $query->where('delete_flg', 0);
    }
}
