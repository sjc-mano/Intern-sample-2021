<?php

namespace App\Services;

use App\Repositories\CommonRepository;
use App\Repositories\UserRepository;
use App\Repositories\ItemRepository;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\Log;

class CommonService
{
    private $commonRepository;
    private $userRepository;
    private $itemRepository;

    public function __construct(
        CommonRepository $commonRepository,
        UserRepository $userRepository,
        ItemRepository $itemRepository
    ) {
        $this->commonRepository = $commonRepository;
        $this->userRepository = $userRepository;
        $this->itemRepository = $itemRepository;
    }

    /**
     * 
     * 
     * @param array $commonIds
     * @return array
     */
    public function getCommonList(array $commonIds)
    {
        foreach($commonIds as $commonId){
            $commons = $this->commonRepository->getByCommonId($commonId)->get();

            foreach($commons as $common){
                $commonList[$commonId][$common->common_type_id] = $common->common_type_name;
            }
        }

        return $commonList;
    }

    /**
     * 編集中に別のユーザが編集していないかの判定
     * 
     * @param string $type
     * @param string $id
     * @param string displayPageTime
     * @return boolean
     */
    public function updatedCheck($type, $id, $displayPageTime)
    {
        $column = ['updated_at'];

        if($type === "User"){
            $updatedAt = $this->userRepository->get([['user_id', $id]], $column)->first()->updated_at;
        }else if($type === "Item"){
            $updatedAt = $this->itemRepository->get([['item_id', $id]], $column)->first()->updated_at;
        }

        $displayPageTime = new Carbon($displayPageTime);
        $updatedAt = new Carbon($updatedAt);

        if($displayPageTime->gt($updatedAt)){
            return false;
        }else{
            return true;
        }
    }
}
