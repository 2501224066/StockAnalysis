<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\CardService;

class CardController extends Controller
{

    protected $cardService;

    public function __construct(CardService $cardService)
    {
        $this->cardService = $cardService;
    }

    // 使用卡
    public function useCard(Request $request)
    {
        $this->verify($request, [
            'card_code' => ['required', 'exists:sa_card,code'],
        ]);

        $add_select_num = $this->cardService->userCard($request);
        return $this->success(['add_select_num' => $add_select_num]);
    }

    // 用户创建卡
    public function createCard(Request $request)
    {
        $this->verify($request, [
            'create_num' => ['required', 'numeric'],
        ]);

        $card_code = $this->cardService->createCard($request);
        return $this->success(['card_code' => $card_code]);
    }

}