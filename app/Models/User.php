<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

/**
 * App\Models\User
 *
 * @property int $user_id
 * @property string $phone 手机号
 * @property string $pasword 密码
 * @property int $select_num 可查询次数
 * @property string|null $invite_code 唯一邀请码
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereInviteCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User wherePasword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereSelectNum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereUserId($value)
 * @mixin \Eloquent
 * @property string $password 密码
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User wherePassword($value)
 * @property string $level 等级
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereLevel($value)
 * @property int|null $agent_id 代理id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereAgentId($value)
 * @property int|null $invite_user_id 邀请人id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereInviteUserId($value)
 */
class User extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable;

    protected $table = "sa_user";

    protected $primaryKey = 'user_id';

    protected $guarded = [];

    protected $hidden = [
        'password',
    ];
}
