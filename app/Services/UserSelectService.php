<?php

namespace App\Http\Services;

use App\Http\Repositories\UserSelectRepository;

class UserService
{

    protected $userSelectRepository;

    public function __construct(
        UserSelectRepository $userSelectRepository
    ) {
        $this->userSelectRepository = $userSelectRepository;
    }

    public function selectCount($user_id)
    {
        return $this->userSelectRepository->selectCount($user_id);
    }
}
