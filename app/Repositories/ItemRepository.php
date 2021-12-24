<?php

namespace App\Repositories;

use App\Models\MItem;
use Illuminate\Support\Facades\DB;

class ItemRepository extends BaseRepository
{
    public function __construct(MItem $items)
    {
        $this->model = $items;
    }

    /**
     * 条件に一致するデータを取得するためのクエリビルダを生成
     *
     * @param string $searchItemId
     * @return Builder
     */
    public function getSearchResult(string $searchItemId)
    {
        return $this->model::join("d_stock", "m_items.item_id", "=", "d_stock.stock_id")
            ->where([
                ["item_id", "like", (mb_strlen($searchItemId) >= 3 ? "%" : "") . "$searchItemId%"],
                ["m_items.delete_flg", config("const.FLAG.OFF")],
                ["d_stock.delete_flg", config("const.FLAG.OFF")],
            ])
            ->select(["item_id", "stock_num", "alert_flg", "alert_update_at"]);
    }
}
