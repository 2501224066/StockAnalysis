<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\SystemSetting
 *
 * @property int $id
 * @property string $key 键
 * @property string $about 说明
 * @property string|null $val 值
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SystemSetting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SystemSetting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SystemSetting query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SystemSetting whereAbout($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SystemSetting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SystemSetting whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SystemSetting whereVal($value)
 * @mixin \Eloquent
 */
class SystemSetting extends Model{

    protected $table = "sa_system_setting";

    protected $guarded = [];

    public $timestamps = false;

}