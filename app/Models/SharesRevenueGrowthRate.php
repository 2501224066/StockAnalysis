<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\SharesRevenueGrowthRate
 *
 * @property int $id
 * @property int $shares_id
 * @property string $time_node 时间节点
 * @property float|null $growth_rate 增长率
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SharesRevenueGrowthRate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SharesRevenueGrowthRate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SharesRevenueGrowthRate query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SharesRevenueGrowthRate whereGrowthRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SharesRevenueGrowthRate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SharesRevenueGrowthRate whereSharesId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SharesRevenueGrowthRate whereTimeNode($value)
 * @mixin \Eloquent
 */
class SharesRevenueGrowthRate extends Model{

    protected $table = "sa_shares_revenue_growth_rate";

    protected $guarded = [];

    public $timestamps = false;
}