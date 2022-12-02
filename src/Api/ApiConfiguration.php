<?php

namespace Northwestern\Sysdev\TeamDynamix\Api;

class ApiConfiguration
{
    public readonly string $baseUrl;

    /**
     * @param  string  $baseUrl The base URL for the TDX API environment, e.g. https://solutions.teamdynamix.com/TDWebApi/
     */
    public function __construct(
        string $baseUrl,
        public readonly string $username,
        public readonly string $password,
    ) {
        $this->baseUrl = rtrim($baseUrl, '/');
    }
}
