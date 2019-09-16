<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Card
 *
 * @property int $id
 * @property string $code 卡号
 * @property int $status 状态 1=可用 2=不可用
 * @property int $add_select_num 增加查询次数
 * @property int $user_id 使用者id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Card newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Card newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Card query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Card whereAddSelectNum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Card whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Card whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Card whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Card whereUserId($value)
 * @mixin \Eloquent
 */
class Card extends Model{

    protected $table = "sa_card";

    protected $guarded = [];
 
    public $timestamps = false;
}