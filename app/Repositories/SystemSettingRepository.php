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
}
