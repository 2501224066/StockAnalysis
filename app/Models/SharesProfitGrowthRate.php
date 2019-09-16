<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\SharesProfitGrowthRate
 *
 * @property int $id
 * @property int $shares_id
 * @property string $time_node 时间节点
 * @property float|null $growth_rate 增长率
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SharesProfitGrowthRate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SharesProfitGrowthRate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SharesProfitGrowthRate query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SharesProfitGrowthRate whereGrowthRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SharesProfitGrowthRate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SharesProfitGrowthRate whereSharesId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SharesProfitGrowthRate whereTimeNode($value)
 * @mixin \Eloquent
 */
class SharesProfitGrowthRate extends Model{

    protected $table = "sa_shares_profit_growth_rate";

    protected $guarded = [];

    public $timestamps = false;

}