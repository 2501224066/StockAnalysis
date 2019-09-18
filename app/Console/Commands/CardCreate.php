<?php


namespace App\Console\Commands;

use App\Http\Repositories\CardRepository;
use App\Http\Repositories\SystemSettingRepository;
use Illuminate\Console\Command;

class CardCreate extends Command
{
    protected $signature = 'card:create {grade} {count}';

    protected $description = 'create specified quantity card';

    protected $cardRepository;
    protected $systemSettingRepository;

    public function __construct(
        SystemSettingRepository $systemSettingRepository,
        CardRepository $cardRepository
    ) {
        parent::__construct();
        $this->cardRepository = $cardRepository;
        $this->systemSettingRepository = $systemSettingRepository;
    }

    public function handle()
    {
        $count = $this->argument('count');
        $grade = $this->argument('grade');

        if (!($count && $grade)) {
            exit('params error');
        }

        $add_select_num = $this->systemSettingRepository->val('card_grade_' . $grade);

        if (!$add_select_num) {
            exit('无此档卡');
        }

        while ($count) {
            $count--;

            $this->cardRepository->createCard(0, $add_select_num);
        }

        echo '生成完毕';
    }
}
