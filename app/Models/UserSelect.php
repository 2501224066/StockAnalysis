<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\UserSelect
 *
 * @property int $id
 * @property int $user_id
 * @property string $share_name 股票名称
 * @property string $share_code 股票编码
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserSelect newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserSelect newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserSelect query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserSelect whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserSelect whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserSelect whereShareCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserSelect whereShareName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserSelect whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserSelect whereUserId($value)
 * @mixin \Eloquent
 */
class UserSelect extends Model{

    protected $table = "sa_user_select";

    protected $guarded = [];

}