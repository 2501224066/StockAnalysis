<?php

namespace App\Http\Services;

use App\Http\Repositories\UserRepository;
use App\Http\Repositories\UserSelectRepository;
use App\Http\Repositories\SystemSettingRepository;
use App\Http\Repositories\AgentRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;

class UserService
{

    protected $userRepository;
    protected $systemSettingRepository;
    protected $agentRepository;
    protected $userSelectRepository;
    protected $qrCode;

    public function __construct(
        UserRepository $userRepository,
        UserSelectRepository $userSelectRepository,
        SystemSettingRepository $systemSettingRepository,
        AgentRepository $agentRepository
    ) {
        $this->userRepository = $userRepository;
        $this->systemSettingRepository = $systemSettingRepository;
        $this->agentRepository = $agentRepository;
        $this->userSelectRepository = $userSelectRepository;
    }

    // 注册
    public function register(Request $request)
    {
        $this->checkCode($request->phone . '_REGISTER_TOKEN', $request->register_token, '注册TOKEN');
        $user_id = $this->userRepository->create($request->phone, $request->password);

        if ($request->user_invite_code != null) {
            $this->userInvite($user_id, htmlspecialchars($request->user_invite_code));
        }
        if ($request->agent_invite_code != null) {
            $this->agentInvite($user_id, htmlspecialchars($request->agent_invite_code));
        }
        return $user_id;
    }

    // 用户邀请
    public function userInvite($user_id, $user_invite_code)
    {
        $invite_user_info = $this->userRepository->first(['invite_code' => $user_invite_code]);
        if ($invite_user_info) {
            // 邀请人获得邀请奖励
            $this->inviteReward($invite_user_info->user_id);
            // 被邀请人获得邀请奖励
            $this->inviteReward($user_id);

            // 被邀请人绑定邀请人
            if ($invite_user_info->agent_id) {
                $this->userRepository->bindInviteUser($user_id, $invite_user_info->user_id);
            }

            // 被邀请人绑定邀请人上级代理
            if ($invite_user_info->agent_id) {
                $this->userRepository->bindAgent($user_id, $invite_user_info->agent_id);
            }
        }
    }

    // 代理邀请
    public function agentInvite($user_id, $agent_invite_code)
    {
        $agent_info = $this->agentRepository->first(['invite_code' => $agent_invite_code]);
        if ($agent_info) {
            $this->userRepository->bindAgent($user_id, $agent_info->agent_id);
        }
    }

    // 登录
    public function login(Request $request)
    {
        $user_info = $this->userRepository->first(['phone' => $request->phone]);
        if (!$user_info) {
            throw new Exception('账号密码错误');
        }

        if (!Hash::check($request->password, $user_info->password)) {
            throw new Exception('账号密码错误');
        }

        // 登录token
        $login_token = encrypt($user_info->user_id);
        return $login_token;
    }

    // 检查手机号
    public function checkPhone(Request $request)
    {
        $this->checkCode($request->phone . '_SMS_CODE', $request->sms_code, '验证码');

        // 注册token
        $register_token = randStr(10, true);
        Cache::put($request->phone . '_REGISTER_TOKEN', $register_token, 300);
        return $register_token;
    }

    // 鉴权
    public function checkCode($key, $sms_code, $name)
    {
        if (!Cache::has($key)) {
            throw new Exception($name . '失效');
        }

        $cache_code = Cache::get($key);
        if ($cache_code != $sms_code) {
            throw new Exception($name . '错误');
        }
    }

    // 查询次数减少
    public function selectNumDown(Request $request)
    {
        return $this->userRepository->selectNumDown($request->user->user_id);
    }

    // 邀请奖励(增加查询次数)
    public function inviteReward($user_id)
    {
        $invite_select_num = $this->systemSettingRepository->val('invite_select_num');
        $this->userRepository->selectNumUp($user_id, $invite_select_num);
    }

    // 重置密码
    public function resetPass(Request $request)
    {
        $this->checkCode($request->phone . '_SMS_CODE', $request->sms_code, '验证码');
        $user_info = $this->userRepository->first(['phone' => $request->phone]);
        $this->userRepository->editPass($user_info->user_id, $request->password);
    }

    // 用户信息
    public function getUserInfo(Request $request)
    {
        $user_info = $request->user;
        $user_info->selected_num = $this->userSelectRepository->selectedCount($request->user->user_id);
        $user_info->agent_info = $this->agentRepository->first(['agent_id' => $user_info->agent_id]);
        $user_info->card_buy_way = $this->systemSettingRepository->cardBuyWay();
        return $user_info;
    }

    // 所有用户
    public function allUser()
    {
        $all_user = $this->userRepository->allUser();
        foreach ($all_user as &$user) {
            // 添加查询次数
            $user->selected_num = $this->userSelectRepository->selectedCount($user->user_id);
            // 添加邀请人数
            $user->invite_user_num = $this->userRepository->invite_user_num($user->user_id);
        }

        return $all_user;
    }
}
