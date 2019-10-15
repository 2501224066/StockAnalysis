<?php
/*

namespace App\Console\Commands;


use App\Models\Shares;
use App\Models\SharesSalesGrossMargin;
use App\Models\SharesProfit;
use App\Models\SharesProfitGrowthRate;
use App\Models\SharesRevenue;
use App\Models\SharesRevenueGrowthRate;
use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

// 股票数据导入更新
class SharesDataImport extends Command
{
    protected $signature = 'shares:import';

    protected $description = 'import shares data to database';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // Excel路径
        $path = storage_path('app/public/') . 'SharesData.xlsx';

        // 解析Excel
        $reader = ReaderEntityFactory::createXLSXReader();
        $reader->open($path);
        foreach ($reader->getSheetIterator() as $k => $sheet) {
            // 只解析第一张表
            if ($k != 1) {
                continue;
            }

            foreach ($sheet->getRowIterator() as $kk => $row) {
                $rowArr = $row->toArray();

                // 从第二行开始解析
                if ($kk < 2) {
                    continue;
                }

                echo $kk . "\n";

                DB::transaction(function () use ($rowArr) {

                    try {

                        // 查询股票
                        $has_shares = Shares::where('code', $rowArr[0])->first();

                        // 当前时间
                        $now = date('Y-m-d H:i:s');

                        if ($has_shares) {

                            // 存在就更新    
                            $shares_id = $has_shares->shares_id;
                            Shares::where('code', $rowArr[0])->update([
                                'simple_code'      => $rowArr[1] !== null  ?  $rowArr[1] : null, // B
                                'name'             => $rowArr[2] !== null  ?  $rowArr[2] : null, // C
                                'industry'         => $rowArr[29] !== null  ?  $rowArr[29] : null, // AD
                                'grows_power'      => $rowArr[3] !== null  ? sprintf("%.2f", $rowArr[3])  : null, // D
                                'financial_safety' => $rowArr[4] !== null  ? sprintf("%.2f", $rowArr[4])  : null, // E
                                'profit_power'     => $rowArr[5] !== null  ? sprintf("%.2f", $rowArr[5]) : null, // F
                                'operate_power'    => $rowArr[6] !== null  ? sprintf("%.2f", $rowArr[6])  : null, // G
                                'score'            => $rowArr[7] !== null  ? sprintf("%.2f", $rowArr[7]) : null, // H
                                'before_three_years_total_profit' => $rowArr[8] !== null  ? sprintf("%.2f", $rowArr[8]) : null, // I
                                'last_year_every_shares_profit'   =>  $rowArr[9] !== null  ? sprintf("%.2f", $rowArr[9]) : null, // J
                                'end_second_quarter_every_shares_profit' => $rowArr[10] !== null  ? sprintf("%.2f", $rowArr[10]) : null, // K
                                'updated_at'       => $now
                            ]);
                        } else {

                            // 不存在就创建
                            $shares_id = Shares::insertGetId([
                                'code' => $rowArr[0], // A
                                'simple_code'      => $rowArr[1] !== null  ?  $rowArr[1] : null, // B
                                'name'             => $rowArr[2] !== null  ?  $rowArr[2] : null, // C
                                'industry'         => $rowArr[29] !== null  ?  $rowArr[29] : null, // AD
                                'grows_power'      => $rowArr[3] !== null  ? sprintf("%.2f", $rowArr[3])  : null, // D
                                'financial_safety' => $rowArr[4] !== null  ? sprintf("%.2f", $rowArr[4])  : null, // E
                                'profit_power'     => $rowArr[5] !== null  ? sprintf("%.2f", $rowArr[5]) : null, // F
                                'operate_power'    => $rowArr[6] !== null  ? sprintf("%.2f", $rowArr[6])  : null, // G
                                'score'            => $rowArr[7] !== null  ? sprintf("%.2f", $rowArr[7]) : null, // H
                                'before_three_years_total_profit' => $rowArr[8] !== null  ? sprintf("%.2f", $rowArr[8]) : null, // I
                                'last_year_every_shares_profit'   =>  $rowArr[9] !== null  ? sprintf("%.2f", $rowArr[9]) : null, // J
                                'end_second_quarter_every_shares_profit' => $rowArr[10] !== null  ? sprintf("%.2f", $rowArr[10]) : null, // K
                                'created_at'       => $now,
                                'updated_at'       => $now
                            ]);
                        }

                        // 净利润
                        SharesProfit::updateOrCreate([
                            'shares_id'  => $shares_id,
                            'time_node'  => '2019-06-30'
                        ], [
                            'net_profit' => $rowArr[11] !== null  ? sprintf("%.2f", $rowArr[11]) : null // L
                        ]);
                        SharesProfit::updateOrCreate([
                            'shares_id'  => $shares_id,
                            'time_node'  => '2019-03-31'
                        ], [
                            'net_profit' => $rowArr[12] !== null  ? sprintf("%.2f", $rowArr[12]) : null // M
                        ]);
                        SharesProfit::updateOrCreate([
                            'shares_id'  => $shares_id,
                            'time_node'  => '2018-12-31'
                        ], [
                            'net_profit' =>  $rowArr[13] !== null  ? sprintf("%.2f", $rowArr[13])  : null // N
                        ]);
                        SharesProfit::updateOrCreate([
                            'shares_id'  => $shares_id,
                            'time_node'  => '2018-09-30'
                        ], [
                            'net_profit' => $rowArr[14] !== null  ? sprintf("%.2f", $rowArr[14]) : null // O
                        ]);
                        SharesProfit::updateOrCreate([
                            'shares_id'  => $shares_id,
                            'time_node'  => '2018-06-30'
                        ], [
                            'net_profit' =>  $rowArr[15] !== null  ? sprintf("%.2f", $rowArr[15]) : null // P
                        ]);
                        SharesProfit::updateOrCreate([
                            'shares_id'  => $shares_id,
                            'time_node'  => '2018-03-31'
                        ], [
                            'net_profit' => $rowArr[16] !== null  ? sprintf("%.2f", $rowArr[16]) : null // Q
                        ]);
                        SharesProfit::updateOrCreate([
                            'shares_id'  => $shares_id,
                            'time_node'  => '2017-12-31'
                        ], [
                            'net_profit' => $rowArr[17] !== null  ? sprintf("%.2f", $rowArr[17]) : null //R
                        ]);
                        SharesProfit::updateOrCreate([
                            'shares_id'  => $shares_id,
                            'time_node'  => '2017-09-30'
                        ], [
                            'net_profit' => $rowArr[18] !== null  ? sprintf("%.2f", $rowArr[18]) : null // S
                        ]);
                        SharesProfit::updateOrCreate([
                            'shares_id'  => $shares_id,
                            'time_node'  => '2017-06-30'
                        ], [
                            'net_profit' => $rowArr[19] !== null  ? sprintf("%.2f", $rowArr[19]) : null // T
                        ]);
                        SharesProfit::updateOrCreate([
                            'shares_id'  => $shares_id,
                            'time_node'  => '2017-03-31'
                        ], [
                            'net_profit' => $rowArr[20] !== null  ? sprintf("%.2f", $rowArr[20]) : null // U
                        ]);

                        // 营业收入
                        SharesRevenue::updateOrCreate([
                            'shares_id'  => $shares_id,
                            'time_node'  => '2019-06-30'
                        ], [
                            'operating_revenue' => $rowArr[21] !== null  ? sprintf("%.2f", $rowArr[21]) : null // V
                        ]);

                        // 营业收入同比增长率
                        SharesRevenueGrowthRate::updateOrCreate([
                            'shares_id'  => $shares_id,
                            'time_node'  => '2019-06-30'
                        ], [
                            'growth_rate' => $rowArr[22] !== null  ? sprintf("%.2f", $rowArr[22]) : null // W
                        ]);

                        // 净利润同比增长率
                        SharesProfitGrowthRate::updateOrCreate([
                            'shares_id'  => $shares_id,
                            'time_node'  => '2019-06-30'
                        ], [
                            'growth_rate' => $rowArr[23] !== null  ? sprintf("%.2f", $rowArr[23]) : null // X
                        ]);

                        // 销售毛利率
                        SharesSalesGrossMargin::updateOrCreate([
                            'shares_id'  => $shares_id,
                            'time_node'  => '2019-06-30'
                        ], [
                            'sales_gross_margin' => $rowArr[24] !== null  ? sprintf("%.2f", $rowArr[24]) : null // Y
                        ]);
                        SharesSalesGrossMargin::updateOrCreate([
                            'shares_id'  => $shares_id,
                            'time_node'  => '2018-12-31'
                        ], [
                            'sales_gross_margin' => $rowArr[25] !== null  ? sprintf("%.2f", $rowArr[25]) : null // Z
                        ]);
                        SharesSalesGrossMargin::updateOrCreate([
                            'shares_id'  => $shares_id,
                            'time_node'  => '2017-12-31'
                        ], [
                            'sales_gross_margin' => $rowArr[26] !== null  ? sprintf("%.2f", $rowArr[26]) : null // AA
                        ]);
                        SharesSalesGrossMargin::updateOrCreate([
                            'shares_id'  => $shares_id,
                            'time_node'  => '2016-12-31'
                        ], [
                            'sales_gross_margin' => $rowArr[27] !== null  ? sprintf("%.2f", $rowArr[27]) : null // AB
                        ]);
                        SharesSalesGrossMargin::updateOrCreate([
                            'shares_id'  => $shares_id,
                            'time_node'  => '2015-12-31'
                        ], [
                            'sales_gross_margin' => $rowArr[28] !== null  ? sprintf("%.2f", $rowArr[28]) : null // AC
                        ]);
                    } catch (\Exception $e) {
                        echo $e->getMessage();
                        exit;
                    }
                });
            }
        }

        $reader->close(); // 释放内存
        return true;
    }
}
