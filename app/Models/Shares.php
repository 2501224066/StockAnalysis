<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Shares
 *
 * @property int $shares_id
 * @property string $code 股票代码
 * @property string|null $simple_code 股票简码
 * @property string $name 股票名称
 * @property float $grows_power 成长能力
 * @property float $financial_safety 财务安全
 * @property float $profit_power 盈利能力
 * @property float $operate_power 运营能力
 * @property float $score 总分
 * @property float|null $before_three_years_total_profit 过去三年累计盈利
 * @property float|null $last_year_every_shares_profit 去年每股盈利
 * @property float|null $end_second_quarter_every_shares_profit 截止第二季度每股盈利
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shares newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shares newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shares query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shares whereBeforeThreeYearsTotalProfit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shares whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shares whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shares whereEndSecondQuarterEverySharesProfit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shares whereFinancialSafety($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shares whereGrowsPower($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shares whereLastYearEverySharesProfit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shares whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shares whereOperatePower($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shares whereProfitPower($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shares whereScore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shares whereSharesId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shares whereSimpleCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shares whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\SharesProfit[] $profit
 * @property-read int|null $profit_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\SharesProfitGrowthRate[] $profitGrowthRate
 * @property-read int|null $profit_growth_rate_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\SharesRevenue[] $revenue
 * @property-read int|null $revenue_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\SharesRevenueGrowthRate[] $revenueGrowthRate
 * @property-read int|null $revenue_growth_rate_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\SharesSalesGrossMargin[] $salesGrossMargin
 * @property-read int|null $sales_gross_margin_count
 */
class Shares extends Model
{
    protected $table = 'sa_shares';

    protected $primaryKey = 'shares_id';

    protected $guarded = [];

    public function profit() : HasMany
    {
        return $this->hasMany(SharesProfit::class, 'shares_id', 'shares_id');
    }

    public function profitGrowthRate() : HasMany
    {
        return $this->hasMany(SharesProfitGrowthRate::class, 'shares_id', 'shares_id');
    }

    public function revenue() : HasMany
    {
        return $this->hasMany(SharesRevenue::class, 'shares_id', 'shares_id');
    }

    public function revenueGrowthRate() : HasMany
    {
        return $this->hasMany(SharesRevenueGrowthRate::class, 'shares_id', 'shares_id');
    }

    public function salesGrossMargin() : HasMany
    {
        return $this->hasMany(SharesSalesGrossMargin::class, 'shares_id', 'shares_id');
    }

}