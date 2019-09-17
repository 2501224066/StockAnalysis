<?php

namespace App\Http\Services;

use App\Http\Repositories\AgentRepository;

class AgentService
{

    protected $agentRepository;

    public function __construct(AgentRepository $agentRepository)
    {
        $this->agentRepository = $agentRepository;
    }
}
