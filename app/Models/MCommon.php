<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MCommon extends Model
{
    protected $table = 'm_common';

    public $primaryKey = 'common_id';

    public $incrementing = false;

    protected $fillable = [
        'common_id',
        'common_name',
        'common_type_id',
        'common_type_name',
        'created_at',
        'updated_at'
    ];
}
