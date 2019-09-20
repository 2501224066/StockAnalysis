<?php

namespace App\Http\Repositories;

use App\Models\Card;
use Exception;

class CardRepository
{

    protected $card;

    public function __construct(Card $card)
    {
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
        $card_info->use_user_id = $user_id;
        $card_info->status = 2;
        $card_info->save();
    }

    // 创建卡
    public function createCard($user_id, $create_num)
    {
        $card_code = $this->getCardCode();
        $d = $this->card->create([
            'create_user_id' =>  $user_id,
            'code' => $card_code,
            'add_select_num' => $create_num
        ]);
        if (!$d) {
            throw new Exception('创建失败');
        }

        return $card_code;
    }

    // 获取卡号
    public function getCardCode()
    {
        $card_code = strtoupper(randStr(8, true));

        $has_count =  $this->card->where('code', $card_code)->count();
        if ($has_count) {
            $card_code = $this->getCardCode();
        }

        return $card_code;
    }

    // 用户创建卡记录
    public function createCardRecord($user_id, $len)
    {
        $query = $this->card->where('create_user_id', $user_id)
        ->orderBy('created_at', 'DESC')
        ->select('code', 'status', 'add_select_num', 'created_at');
        
        if($len){
            return $query->limit($len)->get();
        }else{
            return $query->paginate();
        }
    }

    // 用户使用卡充值总查询次数
    public function useCardGetSelectNum($user_id)
    {
        return $this->card->where('use_user_id', $user_id)->sum('add_select_num');
    }
}
