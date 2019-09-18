<?php


namespace App\Console\Commands;

use App\Models\Card;
use App\Http\Repositories\SystemSettingRepository;
use Illuminate\Console\Command;

class CardCreate extends Command
{
    protected $signature = 'card:create {grade} {count}';

    protected $description = 'create specified quantity card';

    protected $card;
    protected $systemSettingRepository;

    public function __construct(
        Card $card,
        SystemSettingRepository $systemSettingRepository
    ){
        parent::__construct();
        $this->card = $card;
        $this->systemSettingRepository = $systemSettingRepository;
    }

    public function handle()
    {
        $count = $this->argument('count');
        $grade = $this->argument('grade');

        $add_select_num = $this->systemSettingRepository->val('card_grade_'.$grade);

        if(!$add_select_num){
            exit('无此档卡');
        }

        while ($count) {
            $count--;

            $card_code = $this->getCardCode();
            $this->card->create([
                'create_type' => 'system',
                'code' => $card_code,
                'add_select_num' => $add_select_num
            ]);
        }

        echo '生成完毕';
    }

    public function getCardCode()
    {
        $card_code = strtoupper(randStr(8, true));

        $has_count =  $this->card->where('code', $card_code)->count();
        if ($has_count) {
            $card_code = $this->getCardCode();
        }

        return $card_code;
    }
}
