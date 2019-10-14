<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\SharesTop
 *
 * @property int $id
 * @property string $time_grade 时间与档次 （例子 20190630-1）
 * @property int $deplete_select_num 消耗查询次数
 * @property string $top 优质股票 （每档20个，5档共100个）
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SharesTop newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SharesTop newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SharesTop query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SharesTop whereDepleteSelectNum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SharesTop whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SharesTop whereTimeGrade($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SharesTop whereTop($value)
 * @mixin \Eloquent
 * @property int $shares_top_id
 * @property string $date_grade 时间与档次 （例子 20190630-1）
 * @property string $top_content 优质股票 （每档20个，5档共100个）
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SharesTop whereDateGrade($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SharesTop whereSharesTopId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SharesTop whereTopContent($value)
 */
class SharesTop extends Model
{

    protected $table = "sa_shares_top";

    protected $primaryKey = 'shares_top_id';

    protected $guarded = [];

    public $timestamps = false;
}
