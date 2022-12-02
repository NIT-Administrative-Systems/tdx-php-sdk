<?php

namespace Northwestern\Sysdev\TeamDynamix\Api\Client\Ticket;

use GuzzleHttp\Client;
use Lcobucci\JWT\UnencryptedToken;
use Northwestern\Sysdev\TeamDynamix\Api\ApiConfiguration;
use Northwestern\Sysdev\TeamDynamix\Api\Client\TdxClient;
use Northwestern\Sysdev\TeamDynamix\Api\Entity\General\Application;
use Northwestern\Sysdev\TeamDynamix\Api\Entity\Response;

class TicketStatus extends TdxClient
{
    public function __construct(
        ApiConfiguration $config,
        Client $httpClient,
        UnencryptedToken $authToken,
        protected Application $tdxApplication,
    ) {
        parent::__construct($config, $httpClient, $authToken);
    }

    /**
     * @link https://solutions.teamdynamix.com/SBTDWebApi/Home/section/TicketStatuses#GETapi/{appId}/tickets/statuses
     */
    public function all(): Response
    {
        return $this->get(sprintf('/api/%s/tickets/statuses', $this->tdxApplication->id));
    }
}
