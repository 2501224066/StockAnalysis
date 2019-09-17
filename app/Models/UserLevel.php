<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\UserLevel
 *
 * @property int $id
 * @property string $level
 * @property int $trigger_condition 触发条件
 * @property int $reward_select_num 奖励查询次数
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserLevel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserLevel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserLevel query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserLevel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserLevel whereLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserLevel whereRewardSelectNum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserLevel whereTriggerCondition($value)
 * @mixin \Eloquent
 */
class UserLevel extends Model{

    protected $table = "sa_user_level";

    protected $guarded = [];

    public $timestamps = false;

}