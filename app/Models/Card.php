<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Card
 *
 * @property int $id
 * @property int $create_user_id 创建者 0为系统
 * @property string $code 卡号
 * @property int $status 状态 1=可用 2=不可用
 * @property int $add_select_num 增加查询次数
 * @property int|null $use_user_id 使用者id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Card newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Card newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Card query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Card whereAddSelectNum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Card whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Card whereCreateUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Card whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Card whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Card whereUseUserId($value)
 * @mixin \Eloquent
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Card whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Card whereUpdatedAt($value)
 */
class Card extends Model{

    protected $table = "sa_card";

    protected $guarded = [];
}