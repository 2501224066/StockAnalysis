<?php

namespace App\Http\Repositories;

use App\Models\Card;

class CardRepository{

    protected $card;
 
    public function __construct(Card $card){
        $this->card = $card;
    }

    // 获取一行数据
    public function first($where)
    {
        return $this->card->where($where)->first();
    }

    // 绑定用户
    public function bindUser($user_id, $card_code)
    {
        $card_info = $this->first(['code' => $card_code]);
        $card_info->user_id = $user_id;
        $card_info->status = 2;
        $card_info->save();
    }

}  