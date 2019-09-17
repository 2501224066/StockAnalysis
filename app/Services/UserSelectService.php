<?php

namespace App\Http\Services;

use App\Http\Repositories\UserSelectRepository;

class UserSelectService
{

    protected $userSelectRepository;

    public function __construct(
        UserSelectRepository $userSelectRepository
    ) {
        $this->userSelectRepository = $userSelectRepository;
    }
}
