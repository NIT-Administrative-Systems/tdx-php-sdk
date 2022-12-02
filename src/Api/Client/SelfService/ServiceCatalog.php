<?php

namespace Northwestern\Sysdev\TeamDynamix\Api\Client\SelfService;

use GuzzleHttp\Client;
use Lcobucci\JWT\UnencryptedToken;
use Northwestern\Sysdev\TeamDynamix\Api\ApiConfiguration;
use Northwestern\Sysdev\TeamDynamix\Api\Client\TdxClient;
use Northwestern\Sysdev\TeamDynamix\Api\Entity\General\Application;
use Northwestern\Sysdev\TeamDynamix\Api\Entity\Response;

class ServiceCatalog extends TdxClient
{
    public function __construct(
        ApiConfiguration $config,
        Client $httpClient,
        UnencryptedToken $authToken,
        protected Application $tdxApplication,
    ) {
        parent::__construct($config, $httpClient, $authToken);
    }

    public function all(): Response
    {
        return $this->get(sprintf('/api/%s/services', $this->tdxApplication->id));
    }
}
