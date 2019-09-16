<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\SharesSalesGrossMargin
 *
 * @property int $id
 * @property int $shares_id
 * @property string $time_node
 * @property float|null $sales_gross_margin 销售毛利率
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SharesSalesGrossMargin newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SharesSalesGrossMargin newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SharesSalesGrossMargin query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SharesSalesGrossMargin whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SharesSalesGrossMargin whereSalesGrossMargin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SharesSalesGrossMargin whereSharesId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SharesSalesGrossMargin whereTimeNode($value)
 * @mixin \Eloquent
 */
class SharesSalesGrossMargin extends Model{

    protected $table = "sa_shares_sales_gross_margin";

    protected $guarded = [];

    public $timestamps = false;
}