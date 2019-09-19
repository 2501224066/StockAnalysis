<?php

namespace App\Http\Repositories;

use App\Models\SystemSetting;

class SystemSettingRepository
{

    protected $system_setting;

    public function __construct(SystemSetting $system_setting)
    {
        $this->system_setting = $system_setting;
    }

    // 获取参数
    public function val($key)
    {
        return $this->system_setting->where('key', $key)->value('val');
    }

    // 卡购买方式
    public function cardBuyWay()
    {
        $way = [];
        $way['url'] = $this->system_setting->where('key', 'card_buy_url')->value('val');
        $way['qr'] = $this->system_setting->where('key', 'card_buy_qr')->value('val');
        return $way;
    }
}
