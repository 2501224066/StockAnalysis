<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
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
 */
	class Agent extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Card
 *
 * @property int $id
 * @property string $code 卡号
 * @property int $status 状态 1=可用 2=不可用
 * @property int $add_select_num 增加查询次数
 * @property int $user_id 使用者id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Card newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Card newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Card query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Card whereAddSelectNum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Card whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Card whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Card whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Card whereUserId($value)
 * @mixin \Eloquent
 */
	class Card extends \Eloquent {}
}

namespace App\Models{
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
	class Shares extends \Eloquent {}
}

namespace App\Models{
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
	class SharesProfit extends \Eloquent {}
}

namespace App\Models{
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
	class SharesProfitGrowthRate extends \Eloquent {}
}

namespace App\Models{
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
	class SharesRevenue extends \Eloquent {}
}

namespace App\Models{
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
	class SharesRevenueGrowthRate extends \Eloquent {}
}

namespace App\Models{
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
	class SharesSalesGrossMargin extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\SystemSetting
 *
 * @property int $id
 * @property string $key 键
 * @property string $about 说明
 * @property string|null $val 值
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SystemSetting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SystemSetting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SystemSetting query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SystemSetting whereAbout($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SystemSetting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SystemSetting whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SystemSetting whereVal($value)
 * @mixin \Eloquent
 */
	class SystemSetting extends \Eloquent {}
}

namespace App\Models{
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
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\UserLevel
 *
 * @property int $id
 * @property string $level
 * @property int $trigger_condition 触发条件
 * @property int $reward_select_num 奖励查询次数
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserLevel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserLevel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserLevel query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserLevel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserLevel whereLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserLevel whereRewardSelectNum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserLevel whereTriggerCondition($value)
 * @mixin \Eloquent
 */
	class UserLevel extends \Eloquent {}
}

namespace App\Models{
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
 * @property string $shares_name 股票名称
 * @property string $shares_code 股票编码
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserSelect whereSharesCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserSelect whereSharesName($value)
 */
	class UserSelect extends \Eloquent {}
}

