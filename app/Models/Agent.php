<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\Agent
 *
 * @property int $agent_id
 * @property string $phone 手机号
 * @property string $password 密码
 * @property string $weixin 微信号
 * @property string $invite_code 邀请码
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Agent newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Agent newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Agent query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Agent whereAgentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Agent whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Agent whereInviteCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Agent wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Agent wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Agent whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Agent whereWeixin($value)
 * @mixin \Eloquent
 */
class Agent extends Model{

    protected $table = "sa_agent";

    protected $primaryKey = 'agent_id';

    protected $guarded = [];

    protected $hidden = [
        'password',
    ];
}