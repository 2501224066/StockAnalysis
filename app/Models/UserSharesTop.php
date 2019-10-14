<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Models\UserSharesTop
 *
 * @property int $id
 * @property int $user_id 用户id
 * @property int $shares_top_id 优质股票数据id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserSharesTop newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserSharesTop newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserSharesTop query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserSharesTop whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserSharesTop whereSharesTopId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserSharesTop whereUserId($value)
 * @mixin \Eloquent
 */
class UserSharesTop extends Model{

    protected $table = "sa_user_shares_top";

    protected $guarded = [];

    public $timestamps = false;
}