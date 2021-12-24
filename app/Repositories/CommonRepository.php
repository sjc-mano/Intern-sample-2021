<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use App\Models\MCommon;

class CommonRepository
{
    /**
     * Repository target model.
     *
     * @var object
     */
    protected $model;

    public function __construct(MCommon $common)
    {
        $this->model = $common;
    }

    /**
     * common_idの共通種別を全て取得する
     *
     * @param string $commonId
     * @return Builder
     */
    public function getByCommonId(string $commonId)
    {
        return $this->model::where('common_id', $commonId)
        ->select(['common_type_id', 'common_type_name']);
    }
}
