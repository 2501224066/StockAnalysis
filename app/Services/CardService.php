<?php

namespace App\Http\Services;

use Illuminate\Http\Request;
use App\Http\Repositories\CardRepository;
use App\Http\Repositories\UserRepository;
use Exception;

class CardService
{

    protected $cardRepository;
    protected $userRepository;

    public function __construct(
        CardRepository $cardRepository,
        UserRepository $userRepository
    ) {
        $this->cardRepository = $cardRepository;
        $this->userRepository = $userRepository;
    }

    // 使用卡
    public function userCard(Request $request)
    {
        $card_info = $this->cardRepository->first(['code' => $request->card_code, 'status'=>1]);
        if(!$card_info){
            throw new Exception('卡已失效');
        }

        $this->userRepository->selectNumUp($request->user->user_id, $card_info->add_select_num);
        $this->cardRepository->bindUser($request->user->user_id, $request->card_code);
        return $card_info->add_select_num;
    }

    // 用户创建卡
    public function createCard(Request $request)
    {
        if($request->create_num <= 0){
            throw new Exception('数量需大于零');
        }
        if($request->create_num > $request->user->select_num){
            throw new Exception('数量超出拥有查询次数');
        }

        $this->userRepository->selectNumDown($request->user->user_id, $request->create_num);
        return $this->cardRepository->createCard($request->user->user_id, $request->create_num);
    }
}
