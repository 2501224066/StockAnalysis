<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\SharesRevenue
 *
 * @property int $id
 * @property int $shares_id
 * @property string $time_node 时间节点
 * @property float|null $operating_revenue 营业收入
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SharesRevenue newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SharesRevenue newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SharesRevenue query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SharesRevenue whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SharesRevenue whereOperatingRevenue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SharesRevenue whereSharesId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SharesRevenue whereTimeNode($value)
 * @mixin \Eloquent
 */
class SharesRevenue extends Model{

    protected $table = "sa_shares_revenue";

    protected $guarded = [];
 
    public $timestamps = false;
}