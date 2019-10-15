<?php


namespace App\Console\Commands;

use App\Http\Repositories\SharesRepository;
use App\Http\Repositories\SharesTopRepository;
use Illuminate\Console\Command;
use Exception;

// 创建优质股票
class SharesTopCreate extends Command
{
    protected $signature = 'shares_top:create {date}';

    protected $description = '创建优质股票';

    protected $sharesRepository;
    protected $sharesTopRepository;

    public function __construct(
        SharesTopRepository $sharesTopRepository,
        SharesRepository $sharesRepository
    ) {
        parent::__construct();
        $this->sharesTopRepository = $sharesTopRepository;
        $this->sharesRepository = $sharesRepository;
    }

    public function handle()
    {
        $date = $this->argument('date');

        // 检测是否已经创建过
        if ($this->sharesTopRepository->first(['date_grade' => $date . '-1'])) {
            throw new Exception("已经创建过");
        }

        // 5 个档次
        for ($grade = 1; $grade <= 5; $grade++) {
            $date_grade = $date . '-' . $grade;
            $top_content = $this->sharesRepository->topContent(($grade - 1) * 20, 20);

            $this->sharesTopRepository->createSharesTop($date_grade, $top_content);
        }

        echo '生成完毕';
    }
}
