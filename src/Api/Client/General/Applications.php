<?php

namespace Northwestern\Sysdev\TeamDynamix\Api\Client\General;

use Northwestern\Sysdev\TeamDynamix\Api\Client\TdxClient;
use Northwestern\Sysdev\TeamDynamix\Api\Entity\General\AllApplicationsResponse;

class Applications extends TdxClient
{
    /**
     * @link https://solutions.teamdynamix.com/SBTDWebApi/Home/section/Applications#GETapi/applications
     */
    public function all(): AllApplicationsResponse
    {
        return AllApplicationsResponse::fromResponse($this->get('/api/applications'));
    }
}
