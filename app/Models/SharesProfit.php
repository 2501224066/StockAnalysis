<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\SharesProfit
 *
 * @property int $id
 * @property int $shares_id
 * @property string $time_node 时间节点
 * @property float|null $net_profit 净利润
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SharesProfit newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SharesProfit newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SharesProfit query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SharesProfit whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SharesProfit whereNetProfit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SharesProfit whereSharesId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SharesProfit whereTimeNode($value)
 * @mixin \Eloquent
 */
class SharesProfit extends Model{

    protected $table = "sa_shares_profit";

    protected $guarded = [];

    public $timestamps = false;
}